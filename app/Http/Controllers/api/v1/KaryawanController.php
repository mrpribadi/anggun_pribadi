<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::with('jabatan.level', 'department')->orderBy('id_karyawan', 'asc')->get();
        return response([
            'success' => true,
            'message' => 'List Karyawan',
            'data' => $karyawan
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
            'nik'           => 'required|numeric',
            'nama'          => 'required',
            'id_jabatan'    => 'required|numeric',
            'id_dept'       => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 401);
        } else {
            Karyawan::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karyawan = Karyawan::with('jabatan.level', 'department')->find($id);
        if ($karyawan) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'data' => $karyawan
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Karyawan Tidak Ditemukan!'
            ], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_karyawan'    => 'required|numeric',
            'nik'           => 'required|numeric',
            'nama'          => 'required',
            'id_jabatan'    => 'required|numeric',
            'id_dept'       => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 401);
        } else {
            $karyawan = Karyawan::find($request->id_karyawan);
            if (empty($karyawan)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Karyawan Tidak Ditemukan!'
                ], 401);
            } else {
                $karyawan->update($request->all());
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
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        if (empty($karyawan)) {
            return response()->json([
                'success' => false,
                'message' => 'Karyawan Tidak Ditemukan!'
            ], 401);
        } else {
            $karyawan->delete();
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
            ], 200);
        }
    }
}
