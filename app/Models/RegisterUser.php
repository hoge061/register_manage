<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'furi',
        'birthday',
        'gender',
        'postcode',
        'address',
        'tel',
        'home_tel',
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
        'remarks',
        'admin_remarks',
    ];

    public static $rules = array(
        'name' => 'required',
        'furi' => 'required',
        'email' => 'required',
    );
}
