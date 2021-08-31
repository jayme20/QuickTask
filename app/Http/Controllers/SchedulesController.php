<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use DB;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('home')->with('schedules', $schedules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd("here");
        $this->validate($request, [
            'date' => 'required',
            'start_time' => 'required',
            'finish_time' => 'required',
            'duration' => 'required'
        ]);
        $start_time = Carbon::parse($request->input('start_time'));
        $finish_time = Carbon::parse($request->input('finish_time'));
        $duration = $request->input('duration');
        $time = $start_time;

        DB::beginTransaction();
        $flag = true;

        $schedule = new Schedule();
        $schedule->date = $request->input('date');
        $schedule->start_time = $start_time;
        $schedule->finish_time = $finish_time;
        $schedule->save();

        if (!$schedule){
            $flag = false;
        }

        while ($time != $finish_time) {
            $schedule_id = $schedule->id;
            $time=Carbon::parse($time)->addMinutes(intval($duration));


             $query = DB::table('time_slots')->insert([
                'schedule_id' => $schedule_id,
                'appointment_time' =>$time
            ]);

            if (!$query){
                $flag = false;
            }
        }
        if ($flag){
            DB::commit();
        } else {
            DB::rollback();
        }
        return view('handleDoctor');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('schedules.show')->with('schedule', $schedule);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
    }
}
