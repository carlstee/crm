<?php

namespace App\Http\Controllers;

use App\SuppliedProduct;
use App\Supplier;
use App\SupplierItem;
use App\SupplyManagment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SupplyManagmentController extends Controller
{
    public function indexSupplier()
    {
        $supply = Supplier::all();
        return view('backend.supplier.supplier', compact('supply'));
    }

    public function supplierStore(Request $request)
    {
        $this->validate($request, array(
            'supplier_name' => 'required',
            'supplier_mobile' => 'required',
            'supplier_email' => 'required',
            'supplier_address' => 'required',
            'item' => 'required',
        ));

        $sup = Supplier::create([
            'supplier_name' => $request->supplier_name,
            'supplier_mobile' => $request->supplier_mobile,
            'supplier_email' => $request->supplier_email,
            'supplier_address' => $request->supplier_address,
        ]);

        foreach ($request->item as $data) {
            SupplierItem::create([
                'supplier_id' => $sup->id,
                'item' => $data
            ]);
        }
        return redirect()->back()->withMsg('Successfully Created');
    }

    public function supplierDelete($id)
    {
        Supplier::whereId($id)->delete();
        SupplierItem::where('supplier_id', $id)->delete();
        return redirect()->back()->withMsg('Successfully Deleted');
    }

    public function supplierEdit($id)
    {
        $supply = Supplier::find($id);
        return view('backend.supplier.supplier_edit', compact('supply'));
    }

    public function supplierEditItemDelete(Request $request)
    {
        $id = $request->id;
        SupplierItem::destroy($id);
        return $id;
    }

    public function supplierUpdate(Request $request)
    {

        $this->validate($request, array(
            'supplier_name' => 'required',
            'supplier_mobile' => 'required',
            'supplier_email' => 'required',
            'supplier_address' => 'required',
            'item' => 'required',
        ));

        $sup = Supplier::where('id', $request->id)
            ->update([
                'supplier_name' => $request->supplier_name,
                'supplier_mobile' => $request->supplier_mobile,
                'supplier_email' => $request->supplier_email,
                'supplier_address' => $request->supplier_address,
            ]);

        for ($i = 0; $i < count($request->item); $i++) {
            SupplierItem::updateOrCreate(['id' => $request->item_id[$i],], [
                'supplier_id' => $request->id,
                'item' => $request->item[$i]
            ]);
        }

        return redirect('admin/supplier')->withMsg('Successfully Updated');
    }

    public function suplyManIndex()
    {
        $supply = Supplier::all();
        return view('backend.supply_management.index',compact('supply'));
    }

    public function product_pass(Request $request)
    {
        $id = $request->id;
        $product = SupplierItem::where('supplier_id',$id)->get();

        $output ="";

        foreach($product as $value){
            $output.= '<option value="'.$value->id.'">'.$value->item.'</option>';

        }
        $data['output'] = $output;
        return response()->json($data);

    }
    public function supplyStore(Request $request)
    {
        $this->validate($request,[
            'supplier_id' => 'required',
            'item_id' => 'required',
            'service_price' => 'required',
            'service_quantity' => 'required',
        ]);

        $supply = SupplyManagment::create([
           'supplier_id' => $request->supplier_id,
           'status' => $request->status,
           'form_date' => $request->form_date,
           'to_date' => $request->to_date,
           'total_amount' => $request->total_amount,
        ]);

        for ($i = 0; $i < count($request->item_id); $i++ )
        {
            SuppliedProduct::create([
               'item_id' => $request->item_id[$i],
               'supply_table_id' => $supply->id,
               'supplier_id' => $request->supplier_id[0],
               'service_price' => $request->service_price[$i],
               'service_quantity' => $request->service_quantity[$i],
                'form_date' => $supply->form_date,
                'to_date' => $supply->to_date,
               'service_amount' => $request->service_amount[$i],
               'invoice_id' => time().rand(),
            ]);
        }
        return redirect()->back()->withMsg('Successfully Complete');
    }

    public function supplyReports()
    {
        $supplier = SupplyManagment::distinct()->get(['supplier_id']);
        return view('backend.supply_management.supply_reports', compact('supplier'));
    }

    public function supplyReportsWithSupplier($id)
    {
        $supplier = SuppliedProduct::where('supplier_id', $id)->distinct()
            ->get(['created_at']);
        return view('backend.supply_management.supply_reports_supplier', compact('supplier', 'id'));
    }

    public function supplyReportsWithDate($id, $date)
    {
        $supplier = SuppliedProduct::where('supplier_id', $id)->where('created_at', $date)->get();
        return view('backend.supply_management.supply_reports_date', compact('supplier', 'item_detail','date'));
    }


}
