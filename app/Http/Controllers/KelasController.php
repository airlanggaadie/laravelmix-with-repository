<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\KelasRepository;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    private $repo;

    public function __construct(KelasRepository $kelas)
    {
        $this->repo = $kelas;
    }

    public function index()
    {
    //    $repo = new KelasRepository();
    //    $room = $repo->getAll();
        $room = $this->repo->getAll();
        return view('kelas.index',compact('room'));
    }

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
            
        // $repo = new KelasRepository();
        $this->repo->insert([
            'name'=> $request->get('name')
        ]);

        return redirect('kelas')->with('message','Operation Successful!');
    }

    public function create()
    {
        $kelas = null;
        return view('kelas.form',compact('kelas'));
    }

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

        // $repo = new KelasRepository();
        $this->repo->update([
            'name'=>$request->get('name')
        ],$id);

        return redirect('kelas');
    }

    public function edit($id)
    {
        // $repo = new KelasRepository();
        $kelas = $this->repo->show($id);
        // dd($kelas);
        return view('kelas.form',compact('kelas'));
    }

    public function delete($id)
    {
        // $repo = new KelasRepository();
        $this->repo->destroy($id);
        
        return redirect('kelas');
    }

}
