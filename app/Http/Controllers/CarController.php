<?php

namespace App\Http\Controllers;
use App\Models\Car;
use DataTables;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        return view('car.index');
    }

    public function getAjax(Request $request)
    {
        $results = Car::all();

        if($request->optionCar){
            return response()->json($results);
        }

        return DataTables::of($results)
                            ->addIndexColumn()
                            ->make(true);
    }

    public function create()
    {
        return view('car.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code'          => 'required',
            'no_plate'      => 'required',
        ]);

        Car::create([
            'code'          => $request->code,
            'no_plate'      => $request->no_plate,
            'updated_by'    => auth()->user()->id,
        ]);

        $notification = array(
            'message' => 'Kereta telah berjaya ditambah !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edit(Request $request)
    {
        $car = Car::findOrFail($request->id);

        return response()->json($car);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'code'           => 'required',
            'no_plate'       => 'required',
        ]);

        Car::find($id)->update([
            'code'        => $request->code,
            'no_plate'    => $request->no_plate,
            'updated_by'  => auth()->user()->id,
        ]);

        $notification = array(
            'message' => 'Kereta telah berjaya disunting !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        Car::find($id)->forceDelete();

        $notification = array(
            'message' => 'Kereta telah berjaya dipadam !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


}
