<?php
namespace App\Repository;

use App\Kelas;

class KelasRepository{

    public function getAll()
    {
        return Kelas::paginate(3);
    }

    public function getAllWithoutPage()
    {
        return Kelas::get();
    }

    public function insert($data)
    {
        $kelas = new Kelas();
        $kelas->name = $data['name'];
        $kelas->save();
        return $kelas;
    }
    
    public function show($id)
    {
        $kelas = Kelas::with('siswa')->findOrFail($id);

        return $kelas;
    }

    public function update($data,$id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->name = $data['name'];
        $kelas->save();
        return $kelas;
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->siswa()->delete();
        $kelas->delete();
        return $kelas;
    }
}