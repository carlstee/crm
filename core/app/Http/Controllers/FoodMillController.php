<?php

namespace App\Http\Controllers;

use App\FoodItem;
use App\FoodMill;
use App\FoodShift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FoodMillController extends Controller
{
    public function indexMill()
    {
        $shift = FoodShift::all();
        $meal = FoodMill::all();
        return view('backend.food_mill.mill', compact('shift', 'meal'));
    }

    public function storeShift(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request, [
            'shift_name' => 'required',
            'time' => 'required',
        ]);
        FoodShift::create($request->all());
        return redirect()->back()->withmsg('Successfully Created');
    }

    public function storeMeal(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request, [
            'shift_id' => 'required',
            'package_name' => 'required',
            'package_price' => 'required',
        ]);

        $food = FoodMill::create([
            'shift_id' => $request->shift_id,
            'package_name' => $request->package_name,
            'package_price' => $request->package_price,
        ]);

        foreach ($request->item as $data)
        {
            FoodItem::create([
               'package_id' => $food->id,
                'item' => $data
            ]);
        }
        return redirect()->back()->withmsg('Successfully Created');
    }

    public function destroyMeal($id)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        FoodItem::where('package_id', $id)->delete();
        FoodMill::whereId($id)->delete();
        return redirect()->back()->withmsg('Deleted');
    }

    public function editMeal($id)
    {
        $meal = FoodMill::find($id);
        $item = FoodItem::where('package_id', $id)->get();
        $shift = FoodShift::all();
        return view('backend.food_mill.mill_edit', compact('shift','meal', 'item'));
    }

    public function deleteItemMeal(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $id = $request->id;
        FoodItem::whereId($id)->delete();
        return $id;
    }

    public function updateMeal(Request $request, $id)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request, [
            'shift_id' => 'required',
            'package_name' => 'required',
            'package_price' => 'required',
        ]);

        $dep = FoodMill::find($id);
        $inputs = Input::except(['_token', 'shift_id', '_method', 'package_name', 'package_price']);
        FoodItem::where('package_id', $id)->delete();

        $dep->shift_id = $request->input('shift_id');
        $dep->package_name = $request->input('package_name');
        $dep->package_price = $request->input('package_price');
        $dep->save();

        $i=0;
        foreach ($inputs['item'] as $input => $val) {
            $deg = new FoodItem();
            $deg->item = $val;
            $deg->package_id = $id;
            $deg->save();
            $i++;
        }
        return redirect('admin/food/mill')->withMsg('Updated');
    }

    public function deleteShift($id)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        FoodShift::whereId($id)->delete();
        FoodMill::where('shift_id', $id)->delete();
        return redirect('admin/food/mill')->withMsg('Deleted');

    }

}
