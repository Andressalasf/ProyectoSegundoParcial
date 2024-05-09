<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sale_detail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Requests\Sale_detailRequest;

class Sale_detailController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sale_details = Sale_detail::all();
        return view("sale_details.index", compact("sale_details"));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("sale_details.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
      
		

        $image = $request->file('image');
			$slug = Str::slug($request->name);
			if (isset($image))
			{
				$currentDate = Carbon::now()->toDateString();
				$imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

				if (!file_exists('uploads/sale_details'))
				{
					mkdir('uploads/sale_details',0777,true);
				}
				$image->move('uploads/sale_details',$imagename);
			}else{
				$imagename = "";
			}
            

            $sale_detail = new Sale_detail();
			
			$sale_detail->quantity= $request->quantity;
			$sale_detail->unit_price= $request->unit_price;
			$sale_detail->subtotal= $request->subtotal;
            $sale_detail->sale_id= $request->sale_id;
            $sale_detail->product_id= $request->product_id;
            $sale_detail->status=1;
            $sale_detail->registered_by=$request->user()->id;
			$sale_detail->save();

            return redirect()->route('sale_details.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale_detail $sale_detail){
        return view ("sale_details.edit",compact('sale_detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id){
  
			$sale_detail = Sale_detail::find($id);
			$image = $request->file('image');
			$slug = str::slug($request->name);
			if (isset($image))
			{
				$currentDate = Carbon::now()->toDateString();
				$imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

				if (!file_exists('uploads/sale_details'))
				{
					mkdir('uploads/porducts',0777,true);
				}
				$image->move('uploads/sale_details',$imagename);
			}else{
				$imagename = $sale_detail->image;
			}
			
            $sale_detail->quantity= $request->quantity;
			$sale_detail->unit_price= $request->unit_price;
			$sale_detail->subtotal= $request->subtotal;
            $sale_detail->sale_id= $request->sale_id;
            $sale_detail->product_id= $request->product_id;
            $sale_detail->status=1;
            $sale_detail->registered_by=$request->user()->id;
			$sale_detail->save();
            return redirect()->route('sale_details.index')->with('successMsg','El registro se actualizó exitosamente');
         
    }
    
		
        
        

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale_detail $sale_detail)
    {
        $sale_detail->delete();
        return redirect()->route('sale_details.index')->with('eliminar','ok');
    }

    public function changestatus_sale_detail(Request $request)
    {
        $sale_detail = Sale_detail::find($request->sale_detail_id);
		$sale_detail->status=$request->status;
		$sale_detail->save();
    }

   

}