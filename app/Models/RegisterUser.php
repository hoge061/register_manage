<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'furi',
        'birthday',
        'gender',
        'postcode',
        'address',
        'tel',
        'email',
        'jobtype',
        'area_hakata',
        'area_chuo',
        'area_oonojo',
        'area_tosu',
        'area_saga',
        'area_kumamoto',
        'registration_job_introduction',
        'registration_worker_dispatch',
        'facepic',
    ];
}
