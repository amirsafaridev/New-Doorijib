<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advert extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    protected $guarded = ["id"];
    protected $table = 'adverties';
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function city()
    {
        return $this->belongsTo(Province::class);
    }
    public function userBookmark()
    {
        return $this->belongsToMany(User::class);
    }
    public function resumeUsers()
    {
        return $this->belongsToMany(User::class, "advert_user_resume")->withPivot('status');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Taxonomy::class, 'category_id');
    }
    public function medias(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }
    public function imageAdvert()
    {
        return $this->medias()->where('key', 'image')->first();
    }

    public function getContractTypeValueAttribute()
    {
        switch ($this->contract_type) {
            case 0:
                $result = 'تمام وقت';
                break;
            case 1:
                $result = 'پاره وقت';
                break;
            case 2:
                $result = 'دور کاری';
                break;
            case 3:
                $result = 'پرو‌ژه‌ای';
                break;
            case 4:
                $result = 'کارآموزی';
                break;
        }
        return $result;
    }
    public function getContactTypeValueAttribute()
    {
        switch ($this->contact_type) {

            case 0:
                $result = 'پیامک';
                break;
            case 1:
                $result = 'تماس ';
                break;
        }
        return $result;
    }
    public function getSexValueAttribute()
    {
        switch ($this->sex) {

            case 0:
                $result = 'مرد';
                break;
            case 1:
                $result = 'زن';
                break;
            case 2:
                $result = 'فرقی ندارد';
                break;
        }
        return $result;
    }
    protected $casts = [
        'contact_ways' => 'array',
    ];
}
