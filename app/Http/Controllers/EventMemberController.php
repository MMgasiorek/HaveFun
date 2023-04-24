<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EventRepository;
use Illuminate\Support\Facades\Auth;

class EventMemberController extends Controller
{
    public function join(EventRepository $eventRepo, int $id)
    {
        $event = $eventRepo->find($id);
        $user = Auth::id();
        $event->members()->attach($user);

        return back()->with('success','joined');
        
    }

    public function leave(EventRepository $eventRepo, int $id)
    {
        $event = $eventRepo->find($id);
        $user = Auth::id();
        $event->members()->detach($user);

        return back()->with('success','leaved');
        
    }
}
