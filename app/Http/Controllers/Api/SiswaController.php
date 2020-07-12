<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::with('kelas')->get();
        $name = $siswa->reject(function ($user){
            return $user->kelas_id == 2;
        })
        ->map(function($user){
            return $user->name;
        });
        dd($name);
        return response()->json([
            'status'=>true,
            'data'=>$siswa
        ]);
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
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'kelas'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'data'=> $validator->messages()
            ]);
        }
            
        $siswa = new Siswa();
        $siswa->name = $request->get('name');
        $siswa->kelas_id = $request->get('kelas');
        $siswa->save();
        return response()->json([
            'status'=>true,
            'data'=> $siswa->get()
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
        $siswa = Siswa::with('kelas')->findOrFail($id);

        return response()->json([
            'status'=>true,
            'data'=>$siswa
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
        //
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
            'name'=>'required',
            'kelas'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'data'=> $validator->messages()
            ]);
        }

        $siswa = Siswa::findOrFail($id);

        $siswa->name = $request->get('name');
        $siswa->kelas_id = $request->get('kelas');
        
        $siswa->save();

        return response()->json([
            'status'=>true,
            'data'=>$siswa
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
        $siswa = Siswa::findOrFail($id);
        $name = $siswa->name;
        $siswa->delete();
        return response()->json([
            'status'=>true,
            'data'=>[
                'siswa('.$name.') has been deleted',
                'siswa'=>Siswa::get()
                ]
        ]);
    }
}
