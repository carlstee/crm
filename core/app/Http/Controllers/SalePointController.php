<?php

namespace App\Http\Controllers;

use App\Category;
use App\Cutomer;
use App\Product;
use App\SalePoint;
use App\StockProduct;
use App\Warehouse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalePointController extends Controller
{
    public function indexSale()
    {
        $category = Category::all();
        $customer = Cutomer::all();
        $warehouse = Warehouse::all();
        return view('backend.generate_invoice.sale', compact('category','customer', 'warehouse'));
    }

    public function product_pass(Request $request)
    {
        $id = $request->id;
        $product = Product::where('category_id',$id)->get();

        $output ="";

        foreach($product as $value){
            $output.= '<option value="'.$value->id.'">'.$value->product_name.'('.$value->product_id.')</option>';

        }
        $data['output'] = $output;
        return response()->json($data);

    }

    public function productGet(Request $request)
    {
        $id = $request->id;
        $product = Product::where('id',$id)->first();
        return response()->json($product) ;
    }

    public function saleProduct(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request,[
            'product_id' => 'required',
            'warehouse_id' => 'required',
            'customer_id' => 'required',
            'quantity' => 'required',
        ]);

        $stock = StockProduct::where('warehouse_id', $request->warehouse_id)
            ->where('product_id',$request->product_id)->sum('quantity');

        if ($request->quantity < $stock)
        {
            $total = $request->quantity * $request->selling_price;

            $cate = SalePoint::create([
                'product_id' => $request->product_id,
                'warehouse_id' => $request->warehouse_id,
                'customer_id' => $request->customer_id,
                'quantity' => $request->quantity,
                'invoice_id' => $request->invoice_id,
                'total_amount' => $total,
                'date' => Carbon::today()
            ]);

            StockProduct::create([
                'warehouse_id' => $request->warehouse_id,
                'product_id' => $request->product_id,
                'quantity' => '-'.$request->quantity,
            ]);

            return view('backend.sold_invoice.invoice', compact('cate'));
        }

        return redirect()->back()->withdelmsg('Insufficient Stock');
    }

    public function soldProductHistory()
    {
        $product = SalePoint::orderBy('id', 'desc')->get();
        return view('backend.sold_product_history.history', compact('product'));
    }
    public function printHistory($invoice_id)
    {
        $cate = SalePoint::where('invoice_id', $invoice_id)->first();
        return view('backend.sold_invoice.invoice', compact('cate'));
    }

    public function customerSaleHistory()
    {
        $product = SalePoint::where('customer_id', Auth::guard('customer')->user()->id)
            ->orderBy('id', 'desc')->paginate(20);
        return view('customer.invoice_history.history', compact('product'));
    }
}
