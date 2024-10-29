<?php

namespace App\Http\Controllers;

use App\Models\Colour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColourController extends Controller
{
    public function index()
    {
        $colour = Colour::all();

        return response()->json(['colour' => $colour], 200);
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


        $colour = Colour::create([
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


            $colour = Colour::find($id);
            if (!$colour) {
                return response()->json(['error' => 'colour dost not exists'], 400);
            }

            $colour->update([
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



            $colour = Colour::find($id);
            if (!$colour) {
                return response()->json(['error' => 'Colour dost not exists'], 400);
            }

            $colour->delete();

            return response()->json(['status' => 'success'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
