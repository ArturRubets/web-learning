<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'email',
        'home_page',
        'captcha',
        'text',
        'parent_id',
    ];

    /**
     * Get the replies associated with this comment.
     *
     * @return HasMany
     */
    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('replies');
    }

    /**
     * Get the formatted creation date and time of the comment.
     * 
     * @return string
     */
    public function getFormattedCreatedAt(): string
    {
        return $this->created_at->format('d.m.y в H:i');
    }
}
