<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $fillable = ['eventName', 'bandNames', 'thumbnail','startDate', 'endDate', 'portfolio_id', 'ticketPrice','status'];
    use HasFactory;

    public function getFirstThumbnailAttribute()
    {
        if ($this->thumbnail != null && strlen($this->thumbnail)>0){
            $array_thubmail = explode(',',$this->thumbnail);
            if (sizeof($array_thubmail)>0){
                return $array_thubmail[0];
            }
        }
    }

    public function getArrayThumbnailAttribute()
    {
        if ($this->thumbnail != null && strlen($this->thumbnail)>0){
            $this->thumbnail = substr($this->thumbnail,0,-1);
            $array_thubmail = explode(',',$this->thumbnail);
            if (sizeof($array_thubmail)>0){
                return $array_thubmail;
            }
        }
    }

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class,'portfolio_id','id');
    }
}
