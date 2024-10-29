<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function store(Request $request){
        // Define validation rules
        $rules = [
            'Item_name' => 'required|string|max:50',
            'brand'=>'required|integer',
            'model'=>'required|integer',
            'colour'=>'required|integer',
            'tax'=>'required|integer',
            'mrp_price'=>'required|integer',
            'price'=>'required|integer',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif',
          
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first()
            ], );
        }
        // if ($request->distributorid == null&& $request->distributorid == null && $request->distributorid == null) {
        //     return response()->json([
        //         'error' => 'Please Select Distributor or Agent or Dealer'
        //     ], );
        // }

        // return response()->json(['data' => $request->all()], 200);


        Item::create([
            'item_name'  => $request->Item_name,
            'description'  => $request->description,
            'tax'  => $request->tax,
            'mrp_price'  => $request->mrp_price,
            'purchuce_price'  => $request->price,
            'agents_id'  => $request->agents_id,
            'dealers_id'  => $request->dealers_id,
            'distributors_id'  => $request->distributors_id,
            'brands_id'  => $request->brand,
            'product_models_id'  => $request->model,
            'colours_id'  => $request->colour,
            
        ]);

        return response()->json(['status' => 'success'], 200);
       


    }
}
