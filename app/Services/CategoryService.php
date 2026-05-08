<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    /**
     * @return Category[]|Collection
     */
    public function allCategories()
    {
        return Category::all();
    }

    /**
     * create new category
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return Category::create($data->toArray());
    }

    /**
     * category detail by slug
     * @param $slug
     * @return mixed
     */
    public function categoryDetail($slug)
    {
        return Category::where('abb_name', $slug)->first();
    }

    /**
     * category detail by id
     * @param $id
     * @return mixed
     */
    public function getCategory($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * updated categpry
     * @param $category
     * @param $data
     * @return mixed
     */
    public function update($category, $data)
    {
        return $category->update($data->toArray());
    }
}
