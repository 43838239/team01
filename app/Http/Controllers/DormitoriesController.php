<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use App\Models\Dormitory;
class DormitoriesController extends Controller
{
    //
    public function index(){
        $dormitories = Dormitory::all();
        return view("dormitories.index",["dormitory"=>$dormitories]);
    }

    public function show($id){
        $dormitories = Dormitory::findOrFail($id);
        $beds = $dormitories->bed;
        return view("dormitories.show",["dormitory"=>$dormitories,"bed"=>$beds]);
    }

    public function destroy($id){
        $dormitories = Dormitory::findOrFail($id);
        $dormitories->delete();
        return redirect("dormitories");
    }
    public function create(){
        return view("dormitories.create");
    }
    public function store(){
        $input = Request::all();
        Dormitory::create($input);
        return redirect("dormitories");
    }
}
