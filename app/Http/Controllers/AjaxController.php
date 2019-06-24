<?php

namespace App\Http\Controllers;

use App\Category;

class AjaxController extends Controller
{
    public function getCategoriesByPetId($petId)
    {
        $categories = Category::query()->where(['pet_id' => $petId])->get();
        echo "<option value='Chọn danh mục'>Chọn danh mục</option>";
        foreach ($categories as $category) {
            echo "<option value='" . $category->id . "'>" . $category->category_name . "</option>";
        }
    }
}
