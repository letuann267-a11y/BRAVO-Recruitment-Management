<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Category extends Model
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
    protected $fillable = ['name','slug'];
}
