<?php

namespace JawadAhmed\EloquentModels\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class User extends Model
{
    protected $fillable = ['name', 'email'];
    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return ['email_verified_at' => 'immutable_datetime'];
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    protected function name(): Attribute
    {
        return Attribute::make(set: static fn (string $value): string => trim($value));
    }
}
