<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'password',
        'first_name',
        'last_name',
        'role',
        'mobile',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    public function adverties()
    {
        return $this->belongsToMany(Advert::class);
    }
    public function resumeAdverties()
    {
        return $this->belongsToMany(Advert::class, "advert_user_resume")->withPivot('status');
    }
    public function metas(): MorphMany
    {
        return $this->morphMany(Meta::class, 'metaable');
    }
    public function getGradeTypeValueAttribute()
    {
        $user = $this->metas()->where("key", "user")->first();

        switch ($user->value['grade']) {
            case 1:
                $result = 'دیپلم';
                break;
            case 2:
                $result = 'لیسانس';
                break;
            case 3:
                $result = 'فوق لیسانس';
                break;
            case 4:
                $result = 'دکتری';
                break;
        }
        return $result;
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];
}
