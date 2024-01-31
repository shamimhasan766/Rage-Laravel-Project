<?php

namespace App\Rules;

use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;

class CategoryExists implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the category ID exists in the categories table
        return Category::where('id', $value)->exists();
    }

    public function message()
    {
        return 'The selected category does not exist.';
    }
}

