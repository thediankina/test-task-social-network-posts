<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property int $likes
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property int $user_id
 */
class Post extends Model
{
    use HasFactory;

    /**
     * @inheritdoc
     */
    protected $table = 'posts';

    /**
     * @inheritdoc
     */
    protected $fillable = [
        'title',
        'likes',
        'content',
        'user_id',
    ];
}
