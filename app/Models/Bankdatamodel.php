<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bankdatamodel extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 'bank_name',
    ];


    public function fdrmodel(){
        return $this->hasOne(Fdr_model::class, 'aply_bank_id');        
    }

}

