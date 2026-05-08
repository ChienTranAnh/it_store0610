<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Slug
{
    protected static function booted()
    {
        static::creating(function ($model) {
            $fieldName = $model->slugSource ?? 'name';
            $fieldSlug = $model->slugColumn ?? 'slug';

            if (empty($model->{$fieldSlug}) && !empty($model->{$fieldName})) {
                $model->{$fieldSlug} = static::generateUniqueSlug($model->{$fieldName}, $fieldSlug);
                $model->{$fieldName} = Str::ucfirst($model->{$fieldName});
            }
        });
    }

    /**
     * Generate a unique slug for the given value and column.
     *
     * @param string $slugSource
     * @param string $column
     * @return string
     */
    public static function generateUniqueSlug(string $slugSource, string $column = 'slug'): string
    {
        $slug = Str::slug($slugSource);

        // Fetch all existing slugs that match the pattern in one query
        $allSlugs = static::where($column, 'LIKE', $slug . '%')->pluck($column);

        if (!$allSlugs->contains($slug)) {
            return $slug;
        }

        $count = 1;
        while ($allSlugs->contains($slug . '-' . $count)) {
            $count++;
        }

        return $slug . '-' . $count;
    }
}
