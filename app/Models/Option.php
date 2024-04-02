<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ["id"];
    public function medias(): MorphMany{
        return $this->morphMany(Media::class, 'mediable');
    }
    public function imageOption()
    {
    return $this->medias()->where('key', 'economic-symbol')->first();
    }

    protected $casts = [
        'value' => 'array',
    ];
}
