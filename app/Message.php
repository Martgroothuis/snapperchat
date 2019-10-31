<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['body','sender_id','pubkey','reaction'];
    public function scopeIncomplete($query)
    {

        return $query->where('completed', 0);
    }

    public function username()
    {
        return $this->belongsTo(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creator()
    {
        return $this->hasMany('App\Message');
    }
}
