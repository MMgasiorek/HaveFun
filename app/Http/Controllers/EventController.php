<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PlaceRepository;
use App\Repositories\EventRepository;
use App\Models\Event;
use App\Notifications\CancelEventNotification;


class EventController extends Controller
{
    public function index(EventRepository $eventRepo)
    {
        $events_others = $eventRepo->other_events();
        $events_my = $eventRepo->my_events();

        return view('events.index', compact('events_others', 'events_my'));
    }

    public function show(EventRepository $eventRepo, int $id, string $type)
    {
        $event = $eventRepo->switch_views($type, $id);

        return view('events.'.$event[0], ['event' => $event[1]]);
    }

    public function create(PlaceRepository $placeRepo)
    {
        $places = $placeRepo->getAll();

        return view('events.create', ['places' => $places]);
    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->name = $request->input('name');
        $event->user_id = Auth::id();
        $event->place_id = $request->input('place_id');
        $event->date = $request->input('date');
        $event->start_time = $request->input('start_time');
        $event->end_time = $request->input('end_time');
        $event->description = $request->input('description');
        $event->save();

        $event = Event::where('user_id', Auth::id())->latest()->first();

        $path = public_path().'/img/events/'.$event->id;
        File::makeDirectory($path, $mode = 0777, true, true);

        return redirect()->action([EventController::class, 'index'])->with('success','Event Added');
    }

    public function update(Request $request, EventRepository $eventRepo)
    {

        $event = $eventRepo->find($request->input('event_id'));
        $event->name = $request->input('name');
        $event->place_id = $request->input('place_id');
        $event->date = $request->input('date');
        $event->start_time = $request->input('start_time');
        $event->end_time = $request->input('end_time');
        $event->description = $request->input('description');
        $event->save();

        return back()->with('success','updated');
        
    }

    public function delete(EventRepository $eventRepo, int $id) 
    {
        $event = $eventRepo->find($id);

        foreach ($event->members as $member)
        {
            $member->notify(new CancelEventNotification($event->user->name, $event->name));
        }
        $event = $eventRepo->delete($id);
        

        return back()->with('success','removed correctly');
    }



}
