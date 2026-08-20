<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    use Sluggable;
    use SluggableScopeHelpers;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate'=> true,
            ]
        ];
    }
    public function user()
    {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot('level','user_id');
    }
    protected $fillable = ['name','slug'];
}
