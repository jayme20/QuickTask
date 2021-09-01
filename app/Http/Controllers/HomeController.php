<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dates = Schedule::all();
        $slots = DB::table('time_slots')->get();
        return view('home', [
            'dates' => $dates,
            'slots' => $slots
        ]);
    }

    public function handleDoctor()
    {
        $appointments = Appointment::all();
        return view('handleDoctor', $appointments);
    }
}
