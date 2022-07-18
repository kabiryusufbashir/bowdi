<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'request_date',
        'no_of_days',
        'date_of_leave',
        'nature_of_leave',
        'approved_by',
        'final_authorization',
        'status',
        'user_id'
    ];
}
