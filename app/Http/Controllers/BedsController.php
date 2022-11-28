<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Bed;
use Illuminate\Support\Facades\DB;
use Request;

class BedsController extends Controller
{
    //
    public function index(){
        $beds = Bed::all();
        return view("beds.index",["bed"=>$beds]);
    }

    public function show($id){
        $beds = Bed::findOrFail($id);
        return view("beds.show",["bed"=>$beds]);
    }

    public function destroy($id){
        $beds = Bed::findOrFail($id);
        $beds->delete();
        return redirect("beds");
    }
    
    public function create(){
        $dorimtories = DB::table('dormitories')
            ->select('dormitories.id', 'dormitories.name')
            ->orderBy('dormitories.id', 'asc')
            ->get();

        $data = [];
        foreach ($dorimtories as $dorimtory)
        {
            $data[$dorimtory->id] = $dorimtory->name;
        }
        return view('beds.create', ['dormitories' =>$data]);
    }

    public function store(){
        $input = Request::all();
        Bed::create($input);
        return redirect("beds");
    }
}
