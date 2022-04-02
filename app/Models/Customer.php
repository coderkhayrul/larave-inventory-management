<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function cgroup()
    {
        return $this->belongsTo(CustomerGroup::class ,'cg_id', 'cg_id');
    }

}
