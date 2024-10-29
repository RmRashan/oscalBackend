<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DealerController extends Controller
{
    public function index()
    {
        $dealer = Dealer::all();

        return response()->json(['dealer' => $dealer], 200);
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


        $user = Dealer::create([
            'name' => $request->name,
        ]);
        return response()->json(['status' => 'success'], 200);
    }


    public function update(Request $request, $id)
    {
        try {
            // Retrieve the distributor
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


            $agent = Dealer::find($id);
            if (!$agent) {
                return response()->json(['error' => 'dealer dost not exists'], 400);
            }

            $agent->update([
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



            $agent = Dealer::find($id);
            if (!$agent) {
                return response()->json(['error' => 'dealer dost not exists'], 400);
            }

            $agent->delete();

            return response()->json(['status' => 'success'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}