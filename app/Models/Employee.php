<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{   
    use Notifiable;
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name', 'full_name', 'email', 'birthdate', 'address',
    ];
}

