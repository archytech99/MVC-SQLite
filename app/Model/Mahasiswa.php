<?php

namespace archytech99\Model;

use archytech99\Core\SQLiteDatabase;

class Mahasiswa {
    protected $table = 'mahasiswa';
    protected $dbase;

    public function __construct() {
        $this->dbase = new SQLiteDatabase;
    }

    public function get($id = null) {
        if (is_null($id)) {
            $this->dbase->query("SELECT * FROM {$this->table}");
            $result = $this->dbase->get();
        } else {
            $this->dbase->query("SELECT * FROM {$this->table} WHERE id = :id");
            $this->dbase->bind('id', $id);
            $result = $this->dbase->first();
        }
        return $result;
    }

    public function store($data) {
        $this->dbase->query("INSERT INTO mahasiswa(nama,alamat,email,jurusan) VALUES(:nama, :alamat, :email, :jurusan)");
        $this->dbase->bind('nama', $data->nama);
        $this->dbase->bind('alamat', $data->alamat);
        $this->dbase->bind('email', $data->email);
        $this->dbase->bind('jurusan', $data->jurusan);
        $this->dbase->execute();
        
        return 1;
    }

    public function destroy($id) {
        $this->dbase->query("DELETE FROM {$this->table} WHERE id = :id");
        $this->dbase->bind('id', $id);
        $this->dbase->execute();
        
        return 1;
    }
}