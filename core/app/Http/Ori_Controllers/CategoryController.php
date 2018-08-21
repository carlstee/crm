<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function indexCaregory()
    {
        $category = Category::all();
        return view('backend.category.index', compact('category'));
    }

    public function storeCaregory(Request $request)
    {
        Category::create($request->all());
        return redirect()->back()->withMsg("Successfully Created");
    }

    public function updateCaregory(Request $request, $id)
    {
        Category::whereId($id)
        ->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->withMsg("Successfully Updated");
    }
    public function deleteCaregory($id)
    {
        Category::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }

}
