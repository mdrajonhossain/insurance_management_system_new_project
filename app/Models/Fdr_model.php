<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fdr_model extends Model{
    use HasFactory;

    protected $fillable = [
        'name',        
        'search_id',
        'phone',
        'email',
        'etin',
        'nid',
        'nomonee_name',
        'nomonee_phone',
        'nomonee_relation',
        'nomonee_nid',
        'nomonee_etin',
        'service_name',
        'post_code',
        'district',
        'state',
        'aply_bank_id',
        'genarate_id',
        'aply_branch_id',
    ];

    public function bankdatamodel(){
        return $this->belongsTo(Bankdatamodel::class, 'aply_bank_id');
    }

    public function branchdatamodel(){
        return $this->belongsTo(Branchdatamodel::class, 'aply_branch_id');        
    }


}
