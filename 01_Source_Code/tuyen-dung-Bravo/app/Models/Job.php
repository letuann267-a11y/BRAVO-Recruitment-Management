<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Print_;

class Job extends Model
{
    use HasFactory;
    use Sluggable;
    use SluggableScopeHelpers;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate'=> true,
            ]
        ];
    }
    protected $fillable = [
        'title', 'body','user_id', 'slug','address','remote','experience','job_type', 'category_id', 'duties', 'startingDate', 'endingDate', 'price_type', 'price',
        'province_id', 'gender', 'startingAge', 'endingAge', 'language_id', 'language_level', 'certificate'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function photo(){
        return $this->belongsTo(Photo::class);
    }
    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function jobRequests()
    {
        return $this->hasMany(JobRequest::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }
}
