<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;

class FunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $places = ['Bar', 'Basket', 'Beach', 'Pool', 'Garden', 'Scene', 'Soccer', 'Table', 'Tennis', 'Volley'];

        for ($i=0; $i < 10; $i++)
        {
            DB::table('places')->insert([
                'name' => $places[$i],
            ]);
        }    
        // Tworzenie 30 użytkowników
        $users = [];
        for ($i = 1; $i <= 30; $i++) {
            $users[] = User::create([
                'name' => 'User ' . $i,
                'email' => 'User' . $i . '@example.com',
                'password' => bcrypt('User' . $i . '@example.com'),
            ]);
        }


// Tworzenie 60 eventów (po 2 dla każdego użytkownika)
        $events = [];
        foreach ($users as $user) {
            for ($j = 1; $j <= 2; $j++) {
                do {
                    $start_time = rand(0, 23) . ':' . str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT) . ':00';
                    $end_time = rand(0, 23) . ':' . str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT) . ':00';
                    $place_id = rand(1, 10);
                    $date = Carbon::now()->addDays(rand(-7, 7))->toDateString();
                } while (Event::where('place_id', $place_id)
                                ->where('date', '=', $date)
                                ->where(function ($query) use ($start_time, $end_time) {
                                    $query->where(function ($q) use ($start_time, $end_time) {
                                        $q->where('start_time', '>=', $start_time)
                                            ->where('start_time', '<', $end_time);
                                    })->orWhere(function ($q) use ($start_time, $end_time) {
                                        $q->where('end_time', '>', $start_time)
                                            ->where('end_time', '<=', $end_time);
                                    })->orWhere(function ($q) use ($start_time, $end_time) {
                                        $q->where('start_time', '<=', $start_time)
                                            ->where('end_time', '>=', $end_time);
                                    });
                                })
                        ->whereDoesntHave('members', function ($query) use ($date, $start_time, $end_time, $place_id) {
                            $query->where('date', '=', $date)
                                ->where(function ($query) use ($start_time, $end_time, $place_id) {
                                    $query->where(function ($q) use ($start_time, $end_time, $place_id) {
                                        $q->where('start_time', '>=', $start_time)
                                            ->where('start_time', '<', $end_time)
                                            ->where('place_id', $place_id);
                                    })->orWhere(function ($q) use ($start_time, $end_time, $place_id) {
                                        $q->where('end_time', '>', $start_time)
                                            ->where('end_time', '<=', $end_time)
                                            ->where('place_id', $place_id);
                                        })->orWhere(function ($q) use ($start_time, $end_time, $place_id) {
                                            $q->where('start_time', '<=', $start_time)
                                                ->where('end_time', '>=', $end_time)
                                                ->where('place_id', $place_id);
                                        });
                                    });
                                    })
                                    ->exists()
                                    );

                                    $event = $user->events()->create([
                                        'name' => 'Event ' . $j,
                                        'description' => 'Description for Event ' . $j,
                                        'date' => $date,
                                        'start_time' => $start_time,
                                        'end_time' => $end_time,
                                        'place_id' => $place_id,
                                    ]);
                        
                                    $events[] = $event;
                        
                                    // Ustawianie losowych uczestników dla danego wydarzenia
                                    $participants = User::where('id', '<>', $user->id)->inRandomOrder()->take(rand(1, 10))->get();
                                    $event->members()->attach($participants);
                                }
                            }
                        }
    }

