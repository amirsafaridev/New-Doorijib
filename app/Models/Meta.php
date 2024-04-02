<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meta extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ["id"];
    protected $casts = [
        'value' => 'array',
    ];
    public function metaable(): MorphTo{
        return $this->morphTo();
    }
}
