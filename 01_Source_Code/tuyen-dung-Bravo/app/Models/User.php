<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory, Notifiable;
    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'username',
                'onUpdate'=> true,
            ]
        ];
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'surname', 'gender', 'username', 'slug', 'about', 'email', 'password', 'cv', 'photo_id', 'role_id','category_id', 'investigation_id', 'username_changed','is_deleted', 'is_approved',
        'birthday', 'province_id', 'phone_number', 'certificate'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function jobRequests(){
        return $this->hasMany(JobRequest::class, 'user_id', 'id');
    }

    public function photo(){
        return $this->belongsTo(Photo::class);
    }
    public function company(){
        return $this->hasOne(Company::class);
    }
    public function jobs(){
        return $this->hasMany(Job::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function job(){
        return $this->hasMany(Job::class);
    }
    public function language()
    {
        return $this->belongsToMany(Language::class, )->withTimestamps()->withPivot('level');
    }
    public function isAdmin(){
        if ($this->role->name == "administrator"){
            return true;
        }
        return false;
    }
    public function isUser(){
        if ($this->role->name == "user" || $this->role->name == 'administrator'){
            return true;
        }
        return false;
    }
    public function isCompany(){
        if ($this->role->name == "company" || $this->role->name == 'administrator'){
            return true;
        }
        return false;
    }
    public function setNameAttribute($value){
        $name = $value;
        $name = strtolower($name);
        $name = ucfirst($name);
        $this->attributes['name'] = $name;
    }
    public function setSurnameAttribute($value){
        $surname = $value;
        $surname = strtolower($surname);
        $surname = ucfirst($surname);
        $this->attributes['surname'] = $surname;
    }
    public function setUsernameAttribute($value){
        $username = strtolower($value);
        $this->attributes['username'] = $username;
    }
    public function setSlugAttribute($value){
        $slug = strtolower($value);
        $this->attributes['slug'] = $slug;
    }
    public function setEmailAttribute($value){
        $email = strtolower($value);
        $this->attributes['email'] = $email;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_approved' => 'boolean',
    ];
}
