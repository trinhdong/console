<?php

namespace App\Http\Controllers;

use App\Category;
use App\ProductType;

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

    public function getProductTypesByCategoryId($categoryId)
    {
        $productTypes = ProductType::query()->where(['category_id' => $categoryId])->get();
        echo "<option value='Chọn loại sản phẩm'>Chọn loại sản phẩm</option>";
        foreach ($productTypes as $productType) {
            echo "<option value='" . $productType->id . "'>" . $productType->type_name . "</option>";
        }
    }
}
