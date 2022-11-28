<?php

namespace App\Http\Controllers;

use App\Models\Late;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LatesController extends Controller
{
    //
    public function index(){
        $lates = Late::all();
        return view("lates.index",["late"=>$lates]);
    }
    public function show($id){
        $lates = Late::findOrFail($id);

        return view('lates.show', ['late' => $lates]);
    }
    public function examine($id){
        $lates = Late::findOrFail($id);

        return view('lates.examine', ['late' => $lates]);
    }
    public function destroy($id){
        $lates = Late::findOrFail($id);
        $lates->delete();
        return redirect('lates');
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
        return view("lates.create",['sbrecords'=>$data]);
    }
}
