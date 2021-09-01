<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = ['provider_id', 'location'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function translate($location_no, $location)
    {
        return json_decode($this->location_no)->$location;
    }
}
