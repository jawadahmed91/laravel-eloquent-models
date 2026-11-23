<?php

namespace Tests;

use JawadAhmed\EloquentModels\Models\Post;
use JawadAhmed\EloquentModels\Models\User;
use PHPUnit\Framework\TestCase;

final class ModelTest extends TestCase
{
    public function test_models_expose_only_safe_fillable_fields(): void
    {
        self::assertSame(['name', 'email'], (new User())->getFillable());
        self::assertContains('published_at', (new Post())->getFillable());
        self::assertContains('password', (new User())->getHidden());
    }
}
