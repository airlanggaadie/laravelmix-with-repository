<?php
namespace App\Repository;

use App\Siswa;

class SiswaRepository{

    public function getAll()
    {
        return Siswa::paginate(3);
    }

    public function insert($data)
    {
        $siswa = new Siswa();
        $siswa->name = $data['name'];
        $siswa->kelas_id = $data['kelas'];
        $siswa->save();
        return $siswa;
    }
    
    public function show($id)
    {
        $siswa = Siswa::with('kelas')->findOrFail($id);

        return $siswa;
    }

    public function update($data,$id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->name = $data['name'];
        $siswa->kelas_id = $data['kelas'];
        $siswa->save();
        return $siswa;
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return $siswa;
    }
}