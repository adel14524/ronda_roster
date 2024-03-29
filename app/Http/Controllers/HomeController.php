<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Officer;
use App\Models\Roster;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $countCar = Car::count();
        $Car = Car::latest()->first();
        $latestCar = !empty($Car->created_at) ? $Car->created_at : "today";
        $countOfficer = Officer::count();
        $Officer = Officer::latest()->first();
        $latestOfficer = !empty($Officer->created_at) ? $Officer->created_at : "today";
        $countRoster = Roster::count();
        $Roster = Roster::latest()->first();
        $latestRoster = !empty($Roster->created_at) ? $Roster->created_at : "today";

        return view('admin.index', compact('countCar', 'countOfficer', 'countRoster', 'latestCar', 'latestOfficer', 'latestRoster'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
