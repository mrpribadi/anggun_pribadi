<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::with('level')->orderBy('id_jabatan', 'asc')->get();
        return response([
            'success' => true,
            'message' => 'List Jabatan',
            'data' => $jabatan
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
            'nama_jabatan' => 'required',
            'id_level'     => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 401);
        } else {
            Jabatan::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jabatan = Jabatan::with('level')->find($id);
        if ($jabatan) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'data' => $jabatan
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Jabatan Tidak Ditemukan!'
            ], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_jabatan'   => 'required|numeric',
            'nama_jabatan' => 'required',
            'id_level'   => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 401);
        } else {
            $jabatan = Jabatan::find($request->id_jabatan);
            if (empty($jabatan)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jabatan Tidak Ditemukan!'
                ], 401);
            } else {
                $jabatan->update($request->all());
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
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        if (empty($jabatan)) {
            return response()->json([
                'success' => false,
                'message' => 'Jabatan Tidak Ditemukan!'
            ], 401);
        } else {
            $jabatan->delete();
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
            ], 200);
        }
    }
}
