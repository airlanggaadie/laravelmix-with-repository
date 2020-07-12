<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kelas;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    /** public function __construct()
     * {
     *  $this->middleware('jwt.auth');
     * }
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::with('siswa')->get();

        return response()->json([
            'status'=>true,
            'data'=>$kelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'data'=> $validator->messages()
            ]);
        }
            
        $kelas = new Kelas();
        $kelas->name = $request->get('name');
        $kelas->save();
        return response()->json([
            'status'=>true,
            'data'=> $kelas
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::with('siswa')->findOrFail($id);

        return response()->json([
            'status'=>true,
            'data'=>$kelas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'data'=> $validator->messages()
            ]);
        }

        $kelas = Kelas::findOrFail($id);

        $kelas->name = $request->get('name');
        
        $kelas->save();

        return response()->json([
            'status'=>true,
            'data'=>$kelas
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $kelas = Kelas::findOrFail($id);
        $kelas->siswa()->delete();
        $kelas->delete();
        return response()->json([
            'status'=>true,
            'data'=>'kelas has been deleted'
        ]);
    }
}
