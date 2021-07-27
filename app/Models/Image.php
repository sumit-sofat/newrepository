<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'imageable_id',
        'imageable_type',
    ];

    /**
     * Get the parent imageable model (user or contact).
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
