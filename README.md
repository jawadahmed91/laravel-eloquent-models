# Laravel Eloquent Models


Laravel 13 examples for relationships, casts, accessors, local scopes, mass-assignment boundaries, UUIDs, and model events.


```bash
composer install
composer test
```


The `User` and `Post` models demonstrate typed casts, `hasMany` / `belongsTo`, published and search scopes, and safe fillable attributes. Copy the patterns into an application and pair them with migrations matching the documented columns.

## Add this to an existing Laravel project

1. Review `src/Models/User.php` and `src/Models/Post.php`, then copy the patterns you need into the matching models under `app/Models/`.
2. Change namespaces and imports to your application's `App\Models` namespace.
3. Create or update migrations so every attribute, foreign key, timestamp, UUID, and cast used by the models has a matching database column.
4. Add indexes for columns used by the published and search scopes, then run `php artisan migrate` after reviewing the generated SQL.
5. Keep only safe client-editable fields in `$fillable`. Assign server-controlled values such as ownership, publication state, and calculated totals explicitly.
6. Add the `posts()` relationship to `User` and the `user()` relationship to `Post`. Eager-load these relationships with `with()` when returning collections.
7. Adapt the scopes to your search requirements and database driver. Escape or normalize user input before building more advanced search clauses.
8. Update factories and seeders so development and test data satisfy the model casts and required columns.
9. Copy the relevant checks from `tests/ModelTest.php` into your application and run `php artisan test`.
10. Test relationship keys, casts, mass-assignment boundaries, UUID generation, and each query scope against your real schema.
