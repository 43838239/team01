<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;

    protected $fillable=[
        "bedcode",
        "did",
        "floor",
        "roomtype",
        "created_at",
        "updataed_at",
    ];

    public function dormitory(){
        return $this->belongsTo("App\Models\Dormitory","did","id");
    }

    public function sbrecord(){
        return $this->hasMany("App\Models\sbrecord","bid");
    }

    public function delete(){
        $this->sbrecord()->delete();
        return parent::delete();
    }
}
