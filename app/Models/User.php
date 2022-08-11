<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $username
 * @property string $password
 */
class User extends Model
{
    use HasFactory;

    /**
     * @inheritdoc
     */
    protected $table = 'users';

    /**
     * @inheritdoc
     */
    protected $fillable = [
        'username',
        'password',
    ];

    /**
     * @inheritdoc
     */
    protected $hidden = [
        'password',
    ];

    /**
     * @inheritdoc
     */
    public $timestamps = false;

    /**
     * Get validation rules
     *
     * @return array
     */
    public static function rules(): array
    {
        return [
            'username' => ['required', 'unique:users', 'max:100'],
            'password' => ['required'],
        ];
    }
}
