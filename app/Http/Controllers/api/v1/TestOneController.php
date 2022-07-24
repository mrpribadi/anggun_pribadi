<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class TestOneController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipe' => 'required|numeric',
            'nilai' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
                'data'    => null
            ], 401);
        } else {
            $star = '';
            if ($request->tipe == '1') {
                for ($i = 1; $i <= $request->nilai; $i++) {
                    for ($j = 1; $j <= $i; $j++) {
                        $star .= "*";
                    }
                    $star .= "<br>";
                }
            } else if ($request->tipe == '2') {
                for ($i = $request->nilai; $i >= 1; $i--) {
                    for ($j = 1; $j <= $i; $j++) {
                        $star .= "*";
                    }
                    $star .= "<br>";
                }
            } else if ($request->tipe == '3') {
                for ($i = $request->nilai; $i >= 1; $i--) {
                    for ($j = 1; $j <= $i; $j++) {
                        $star .= " &nbsp";
                    }

                    for ($k = $request->nilai; $k >= $i; $k--) {
                        $star .= "*";
                    }
                    $star .= "<br>";
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Tipe Tidak Ditemukan',
                    'data'    => null
                ], 401);
            }


            // return response()->json([
            //     'success' => true,
            //     'message' => 'Berhasil',
            //     'data'    => $star
            // ], 200);

            // $contents = View::make('star')->with('star', $star);
            // $response = Response::make($contents, 200);
            // $response->header('Content-Type', 'text/plain');
            // return $response;

            return response()->view('star', compact('star'));
        }
    }
}
