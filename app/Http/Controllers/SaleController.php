<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Support\Str;


class SaleController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::all();
        return view("sales.index", compact("sales"));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("sales.create");
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

				if (!file_exists('uploads/sales'))
				{
					mkdir('uploads/sales',0777,true);
				}
				$image->move('uploads/sales',$imagename);
			}else{
				$imagename = "";
			}
            

            $sale = new Sale();
			
			$sale->sale_date= $request->sale_date;
			$sale->total_sale= $request->total_sale;
			$sale->customer_id= $request->customer_id;
            $sale->status=1;
            $sale->registered_by=$request->user()->id;
			$sale->save();
            return redirect()->route('sales.index');
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
    public function edit(Sale $sale){
        return view ("sales.edit",compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id){
  
			$sale = Sale::find($id);
			$image = $request->file('image');
			$slug = str::slug($request->name);
			if (isset($image))
			{
				$currentDate = Carbon::now()->toDateString();
				$imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

				if (!file_exists('uploads/sales'))
				{
					mkdir('uploads/porducts',0777,true);
				}
				$image->move('uploads/sales',$imagename);
			}else{
				$imagename = $sale->image;
			}
			
            $sale->sale_date= $request->sale_date;
			$sale->total_sale= $request->total_sale;
			$sale->customer_id= $request->customer_id;
            $sale->status=1;
            $sale->registered_by=$request->user()->id;
			$sale->save();
            return redirect()->route('sales.index')->with('successMsg','El registro se actualizó exitosamente');
         
    }
    
		
        
        

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('eliminar','ok');
    }

    public function changestatus_sale(Request $request)
    {
        $sale = Sale::find($request->sale_id);
		$sale->status=$request->status;
		$sale->save();
    }

   

}