<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestTwoController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nilai' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
                'data'    => null
            ], 401);
        } else {
            $response = array('nominal' => format_uang($request->nilai), 'terbilang' => str_replace("  ", " ", ucwords(terbilang($request->nilai) . 'rupiah')));
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'data'    => $response
            ], 200);
        }
    }
}
