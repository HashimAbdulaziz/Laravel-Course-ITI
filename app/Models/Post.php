<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{

    use HasFactory;

    use Sluggable;

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image',
    ];

    public function sluggable(): array
    {
        return ['slug' => ['source' => 'title' ] ];
    }
    

    public function createdBy(): BelongsTo {
        return $this->belongTo(User::class, 'user_id');

    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


    protected function title(): Attribute
    {
        return Attribute::make(

            get: fn (string $value) => ucfirst($value),

            set: fn (string $value) => trim($value),
        );
    }
}
