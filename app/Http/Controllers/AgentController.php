<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    public function index()
    {
        $agent = Agent::all();

        return response()->json(['agent' => $agent], 200);
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


        $user = Agent::create([
            'name' => $request->name,
        ]);
        return response()->json(['status' => ' success'], 200);
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


            $agent = Agent::find($id);
            if (!$agent) {
                return response()->json(['error' => 'distributor dost not exists'], 400);
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



            $agent = Agent::find($id);
            if (!$agent) {
                return response()->json(['error' => 'agent dost not exists'], 400);
            }

            $agent->delete();

            return response()->json(['status' => 'success'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
