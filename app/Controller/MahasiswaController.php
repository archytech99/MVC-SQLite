<?php

namespace archytech99\Controller;

class MahasiswaController
{
    public function index() {
        $data = model('Mahasiswa')->get();
        view('mahasiswa/index', $data);
    }

    public function detail($id) {
        $data = model('Mahasiswa')->get($id);
        view('mahasiswa/details', $data);
    }

    public function hapus($id) {
        $data = model('Mahasiswa')->destroy($id);
        setFlash([
            'tipe'=> 'success',
            'aksi'=> 'Berhasil',
            'pesan'=> 'Data Mahasiswa berhasil ditambahkan',
        ]);
        header("Location: " . base_url('/mahasiswa'));
        unset($_POST);
    }

    public function tambah() {
        $data = model('Mahasiswa')->store(stdClass($_POST));
        setFlash([
            'tipe'=> 'success',
            'aksi'=> 'Berhasil',
            'pesan'=> 'Data Mahasiswa berhasil ditambahkan',
        ]);
        header("Location: " . base_url('/mahasiswa'));
        unset($_POST);
    }
}