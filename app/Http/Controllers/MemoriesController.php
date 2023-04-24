<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EventRepository;
use Illuminate\Support\Facades\File;

class MemoriesController extends Controller
{
    public function index(EventRepository $eventRepo)
    {
        $events_rand = $eventRepo->get_few();
        $most_members = $eventRepo->get_ended_most_members();
        $most_comments = $eventRepo->get_ended_most_comments();

        return view('memories.index', compact('events_rand', 'most_members', 'most_comments'));
    }

    public function show(EventRepository $eventRepo, int $id)
    {
        $event = $eventRepo->find($id);

        $folderPath = 'img\events/'. $event->id;
        $filecount = count(File::files($folderPath));

        return view('memories.show', compact('event', 'filecount'));
    }
}
