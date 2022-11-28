<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeavesController extends Controller
{
    //
    public function index(){
        $leaves = Leave::all();
        return view("leaves.index",["leave"=>$leaves]);
    }

    public function show($id){
        $leaves = Leave::findOrFail($id);

        return view('leaves.show', ['leave' => $leaves]);
    }

    public function examine($id){
        $leaves = Leave::findOrFail($id);

        return view('leaves.examine', ['leave' => $leaves]);
    }

    public function destroy($id){
        $leaves = Leave::findOrFail($id);
        $leaves->delete();
        return redirect('leaves');
    }
    public function create(){
        $sbrecords = DB::table('sbrecords')
            ->select('sbrecords.id')
            ->orderBy('sbrecords.id', 'asc')
            ->get();
    
        $data = [];
        foreach ($sbrecords as $sbrecord)
        {
            $data[$sbrecord->id] = $sbrecord->id;
        }
        return view("leaves.create",["sbrecords"=>$data]);
    }
}
