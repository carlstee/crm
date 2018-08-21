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
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        Category::create($request->all());
        return redirect()->back()->withMsg("Successfully Created");
    }

    public function updateCaregory(Request $request, $id)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        Category::whereId($id)
        ->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->withMsg("Successfully Updated");
    }
    public function deleteCaregory($id)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        Category::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }

}
