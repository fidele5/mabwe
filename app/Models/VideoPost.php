<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoPost extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "post_category_id",
        "video_path",
        "caption",
        "title"
    ];

    /**
     * Get the post_category that owns the VideoPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post_category()
    {
        return $this->belongsTo(PostCategory::class);
    }

    /**
     * Get the user that owns the VideoPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
