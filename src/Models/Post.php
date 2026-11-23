<?php

namespace JawadAhmed\EloquentModels\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Post extends Model
{
    protected $fillable = ['user_id', 'title', 'slug', 'body', 'published_at', 'metadata'];

    protected function casts(): array
    {
        return ['published_at' => 'immutable_datetime', 'metadata' => 'array'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function scopeSearch(Builder $query, string $term): Builder
    {
        return $query->where(fn (Builder $q) => $q->whereLike('title', "%{$term}%")->orWhereLike('body', "%{$term}%"));
    }
}
