<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistributorController extends Controller
{
    public function index()
    {
        $distributor = Distributor::all();

        return response()->json(['distributor' => $distributor], 200);
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


        $user = Distributor::create([
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


            $distributor = Distributor::find($id);
            if (!$distributor) {
                return response()->json(['error' => 'distributor dost not exists'], 400);
            }

            $distributor->update([
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



            $distributor = Distributor::find($id);
            if (!$distributor) {
                return response()->json(['error' => 'distributor dost not exists'], 400);
            }

            $distributor->delete();

            return response()->json(['status' => 'success'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
