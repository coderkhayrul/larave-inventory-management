<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded =[];

    // Get Customer Group Data
    // public function customerGroup(){
    //     return $this->belongsTo(CustomerGroup::class,'customer_id', 'cg_id');
    // }
    public function cgroup()
    {
        return $this->belongsTo(CustomerGroup::class ,'cg_id', 'cg_id');
    }

}
