<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Department::orderBy('id_dept', 'asc')->get();
        return response([
            'success' => true,
            'message' => 'List Department',
            'data' => $department
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
            'nama_dept' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 401);
        } else {
            Department::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
        if ($department) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'data' => $department
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Department Tidak Ditemukan!'
            ], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_dept'   => 'required|numeric',
            'nama_dept' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 401);
        } else {
            $department = Department::find($request->id_dept);
            if (empty($department)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Department Tidak Ditemukan!'
                ], 401);
            } else {
                $department->update($request->all());
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
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        if (empty($department)) {
            return response()->json([
                'success' => false,
                'message' => 'Department Tidak Ditemukan!'
            ], 401);
        } else {
            $department->delete();
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
            ], 200);
        }
    }
}
