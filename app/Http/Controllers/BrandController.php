<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::all();

        return response()->json(['brand' => $brand], 200);
    }
    public function store(Request $request)
    {
        

            // Define validation rules
            $rules = [
                'name' => 'required|string|max:50',
            ];

            // Validate the request
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
                ], 409);
            }


            $brand = Brand::create([
                'name' => $request->name,
            ]);
            return response()->json(['status' => 'success'], 200);

      
    }

    public function update(Request $request, $id)
    {
        try {
            // Retrieve the model
            $rules = [
                'name' => 'required|string|max:50',
            ];

            // Validate the request
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
                ], 409);
            }


            $brand = Brand::find($id);
            if (!$brand) {
                return response()->json(['error' => 'Model dost not exists'], 400);
            }

            $brand->update([
                'name' => $request->name,
            ]);

            return response()->json(['status' => 'success'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }



    public function delete($id)
    {
        try {



            $model = Brand::find($id);
            if (!$model) {
                return response()->json(['error' => 'Model dost not exists'], 400);
            }

            $model->delete();

            return response()->json(['status' => 'success'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
