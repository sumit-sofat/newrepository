<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'contacts';
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'mobile_number',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst($value);
    }

    /**
     * Get the contact's image.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

}
