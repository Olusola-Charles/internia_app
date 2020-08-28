<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{

    use Notifiable;
    
    protected $guarded = [];
}
