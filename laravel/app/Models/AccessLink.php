<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AccessLink extends Model
{
    use HasFactory;

    const TABLE_NAME = 'access_links';

    /**
     * @inheritdoc
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;

    public $fillable = [
        'url',
        'is_active',
        'uuid',
        'user_id',
        'end_time',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'end_time',
    ];

    /**
     * @return HasOne
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
