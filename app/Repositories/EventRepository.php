<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class EventRepository extends BaseRepository{

    public function __construct(Event $model){

        $this->model= $model;
    }

    public function switch_views(string $type, int $id)
    {
        switch($type) {
            case 'show':
                $viewName = 'show';
                break;
            case 'update':
                $viewName = 'update';
                break;
            default:
        }
        
        $ticket = Event::find($id);

        return [$viewName, $ticket];
    }

    public function get_ended(int $id)
    {
        return $this->model->where('date', '<', Carbon::now())
                           ->where('place_id', $id)->get();
    }

    public function get_coming(int $id)
    {
        return $this->model->where('date', '>', Carbon::now())
                           ->where('place_id', $id)->get();
    }

    public function get_ended_most_members()
    {
        return Event::withCount('members')
        ->where('date', '<', Carbon::now())
        ->orderBy('members_count', 'desc')->get();
    }

    public function get_ended_most_comments()
    {
        return Event::withCount('comments')
        ->where('date', '<', Carbon::now())
        ->orderBy('comments_count', 'desc')->get();
    }

    
    public function get_few()
    {
        return $this->model->inRandomOrder()->take(3)->get();
    }

    public function my_events()
    {
        return $this->model->where('user_id', Auth::id())->get();
    }

    public function other_events()
    {
        return $this->model->where('user_id', '!=', Auth::id())->get();
    }

}