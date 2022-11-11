<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Officer;

class OfficerController extends Controller
{
    public function index()
    {
        return view('officer.index');
    }

    public function getAjax(Request $request)
    {
        $results = Officer::all();

        foreach ($results as $key => $result) {

            $result->pangkat = Officer::getRoleBatch($result->role_batch);
        }

        if($request->optionOfficer){
            return response()->json($results);
        }

        return DataTables::of($results)
                            ->addIndexColumn()
                            ->make(true);
    }

    public function create()
    {
        return view('officer.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'officer_name'   => 'required',
            'batch_role'     => 'required',
            'no_batch'       => 'required',
        ]);

        Officer::create([
            'name'        => $request->officer_name,
            'role_batch'  => $request->batch_role,
            'batch_num'   => $request->no_batch,
            'updated_by'  => auth()->user()->id,
        ]);

        $notification = array(
            'message' => 'Anggota telah berjaya ditambah !', 
            'alert-type' => 'success'
        );

        return redirect()->route('officers.home')->with($notification);
    }

    public function edit(Request $request)
    {
        $officer = Officer::findOrFail($request->id);

        return response()->json($officer);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'officer_name'   => 'required',
            'batch_role'     => 'required',
            'no_batch'      => 'required',
        ]);

        Officer::find($id)->update([
            'name'        => $request->officer_name,
            'role_batch'  => $request->batch_role,
            'batch_num'   => $request->no_batch,
            'updated_by'  => auth()->user()->id, 
        ]);

        $notification = array(
            'message' => 'Anggota telah berjaya disunting !', 
            'alert-type' => 'success'
        );

        return redirect()->route('officers.home')->with($notification);
    }

    public function destroy($id)
    {
        Officer::find($id)->forceDelete();

        $notification = array(
            'message' => 'Anggota telah berjaya dipadam', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
