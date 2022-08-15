<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        'content',
        'user_id',
    ];

    /**
     * Return count of likes
     *
     * @return Attribute
     */
    protected function likes(): Attribute
    {
        return Attribute::make(
            get: function () {
                return DB::table('likes')->where([
                    'post_id' => $this->id,
                ])->count();
            },
        );
    }

    /**
     * Get validation rules
     *
     * @return array
     */
    public static function rules(): array
    {
        return [
            'title' => ['required', 'max:100'],
            'content' => ['required'],
        ];
    }

    /**
     * Get author
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Return if watcher is an author
     *
     * @return bool
     */
    public function allow(): bool
    {
        return $this->user_id == Auth::id();
    }
}
