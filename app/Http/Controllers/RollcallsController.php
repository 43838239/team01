<?php

namespace App\Http\Controllers;

use App\Models\Rollcall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RollcallsController extends Controller
{
    //
    public function index(){
        $rollcalls = Rollcall::all();
        return view("rollcalls.index",["rollcall"=>$rollcalls]);
    }

    public function show($id){
        $rollcalls = Rollcall::findOrFail($id);
        return view("rollcalls.show",["rollcall"=>$rollcalls]);
    }

    public function destroy($id){
        $rollcalls = Rollcall::findOrFail($id);
        $rollcalls->delete();
        return redirect("rollcalls");
    }
    public function create(){
        $sbrecords = DB::table('sbrecords')
            ->select('sbrecords.id', 'sbrecords.sid','sbrecords.bid')
            ->orderBy('sbrecords.id', 'asc')
            ->get();
    
        $data = [];
        foreach ($sbrecords as $sbrecord)
        {
            $data[$sbrecord->id] = $sbrecord->id;
        }
        return view("rollcalls.create",['sbrecords'=>$data]);
    }
}
