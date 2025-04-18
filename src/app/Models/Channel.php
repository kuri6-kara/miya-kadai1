<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    public function contact()
    {
        return $this->belongsToMany(Contact::class, 'channel_contact');
        // return $this->belongsToMany(Contact::class)->withTimestamps();
    }
}
