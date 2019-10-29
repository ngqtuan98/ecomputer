<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Visitor;

class Tracker extends Visitor
{
    public $attributes = ['hits' => 0];

    protected $fillable = ['ip', 'date'];

    public $timestamps = false;

    protected $table = 'visitor';

    public static function boot() {
        // When a new instance of this model is created...
        static::creating(function ($tracker) {
            $tracker->hits = 0;
        } );

        // Any time the instance is saved (create OR update)
        static::saving(function ($tracker) {
          
            $tracker->hits++;
        } );
    }

    // Fill in the IP and today's date
    public function scopeCurrent($query) {
        return $query->where('ip', $_SERVER['REMOTE_ADDR'])
                     ->where('date', date('Y-m-d'));
    }

    public static function hit() {
        static::firstOrCreate([
                  'ip'   => $_SERVER['REMOTE_ADDR'],
                  'date' => date('Y-m-d'),
              ])->save();
    }
}
