<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{

    use HasFactory;

    use Sluggable;

    protected $fillable = [
        'user_id',
        'title',
        'description',
    ];

    public function sluggable(): array
    {
        return ['slug' => ['source' => 'title' ] ];
    }
    

    public function createdBy(): BelongsTo {
        return $this->belongTo(User::class, 'user_id');

    }
}
