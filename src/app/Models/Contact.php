<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'item_id',
        'last_name',
        'first_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
        'channel_ids',
        'image_file'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function channels()
    {
        return $this->belongsToMany(Channel::class, 'channel_contact');
        // return $this->belongsToMany(Channel::class)->withTimestamps();
    }
}
