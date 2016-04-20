<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unlock_code', 'description', 'device_phone_number', 'status_id', 'price',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function status()
    {
    	return $this->belongsTo('App\Status');
    }
}
