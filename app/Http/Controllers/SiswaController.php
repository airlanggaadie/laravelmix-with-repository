<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\SiswaRepository;
use App\Repository\KelasRepository;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    private $repo;

    public function __construct(SiswaRepository $siswa)
    {
        $this->repo = $siswa;
    }

    public function index()
    {
        $siswa = $this->repo->getAll();
        return view('siswa.index', compact('siswa'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'data' => $validator->messages()
            ]);
        }

        // $repo = new KelasRepository();
        $this->repo->insert([
            'name' => $request->get('name'),
            'kelas' => $request->get('kelas')
        ]);

        return redirect('siswa')->with('message', 'Operation Successful!');
    }

    public function create()
    {
        $repo = new KelasRepository();
        $room = $repo->getAllWithoutPage();
        $siswa = null;
        return view('siswa.form', compact('siswa','room'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'data' => $validator->messages()
            ]);
        }

        $this->repo->update([
            'name' => $request->get('name'),
            'kelas' => $request->get('kelas')
        ], $id);

        return redirect('siswa');
    }

    public function edit($id)
    {
        $repo = new KelasRepository();
        $room = $repo->getAllWithoutPage();
        $siswa = $this->repo->show($id);
        return view('siswa.form', compact('siswa','room'));
    }

    public function delete($id)
    {
        $this->repo->destroy($id);

        return redirect('siswa');
    }
}
