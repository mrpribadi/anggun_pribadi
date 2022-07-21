<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = Level::orderBy('id_level', 'asc')->get();
        return response([
            'success' => true,
            'message' => 'List Level',
            'data' => $level
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_level' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 401);
        } else {
            Level::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $level = Level::find($id);
        if ($level) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'data' => $level
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Level Tidak Ditemukan!'
            ], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_level'   => 'required|numeric',
            'nama_level' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 401);
        } else {
            $level = Level::find($request->id_level);
            if (empty($level)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Level Tidak Ditemukan!'
                ], 401);
            } else {
                $level->update($request->all());
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil',
                ], 200);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = Level::find($id);
        if (empty($level)) {
            return response()->json([
                'success' => false,
                'message' => 'Level Tidak Ditemukan!'
            ], 401);
        } else {
            $level->delete();
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
            ], 200);
        }
    }
}
