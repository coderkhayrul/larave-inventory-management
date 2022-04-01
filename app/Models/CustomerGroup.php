<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerGroup extends Model
{
    use HasFactory;

    protected $fillabel =[
        'cg_name',
        'cg_remarks',
        'cg_slug',
        'cg_status'
    ];
}
