<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ["id"];
    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }
    public function plan(): BelongsTo{
        return $this->belongsTo(SalePlan::class, 'plan_id');
    }
    public function orderable(): MorphTo{
        return $this->morphTo();
    }
    public function getModelNameAttribute()
    {
        switch($this->orderable_type)
        {
            case "APP\Models\Advert":
                $result = 'آگهی';
                break;


        }
        return $result;
    }
}
