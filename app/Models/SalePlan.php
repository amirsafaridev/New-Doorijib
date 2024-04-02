<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalePlan extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ["id"];
    protected $table = "sales_plan";

    public function orders(): HasMany{
        return $this->hasMany(User::class, 'user_id');
    }
}
