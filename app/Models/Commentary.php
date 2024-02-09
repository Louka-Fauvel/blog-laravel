<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commentary extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'message',
        'date_created',
        'date_updated',
        'article_id',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function article(): BelongsTo {
        return $this->belongsTo(Article::class);
    }
}
