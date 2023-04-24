<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PlaceRepository;
use App\Repositories\EventRepository;

class PlaceController extends Controller
{
    public function index(PlaceRepository $placeRepo)
    {
        $places = $placeRepo->getAll();
        return view('places.index', compact('places'));
    }

    public function show(PlaceRepository $placeRepo, EventRepository $eventRepo, int $id)
    {
        $place = $placeRepo->find($id);
        $end_events = $eventRepo->get_ended($id);
        $coming_events = $eventRepo->get_coming($id);

        return view('places.show', compact('place', 'end_events', 'coming_events'));
    }
}
