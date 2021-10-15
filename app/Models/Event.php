<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $fillable = ['eventName', 'bandNames', 'startDate', 'endDate', 'portfolio_id', 'ticketPrice','status'];
    use HasFactory;
}
