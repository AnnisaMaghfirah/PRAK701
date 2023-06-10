<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuModel;

class CRUDController extends BaseController
{
    public function index()
    {
        $model = new BukuModel();
        $data = $model->findAll();
        return view('index', [
            'data' => $data
        ]);
    }

    public function tambah()
    {
        return view('create');
    }

    public function simpan()
    {
        $rules = [
            'judul  ' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|numeric|greater_than_equal_to[1800]|less_than_equal_to[2023]'
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            return view('create', $data);
        }

        $judul = request()->getPost('judul');
        $penulis = request()->getPost('penulis');
        $penerbit = request()->getPost('penerbit');
        $tahun_terbit = request()->getPost('tahun_terbit');

        $model = new BukuModel();

        $model->insert([
            'judul' => $judul,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'tahun_terbit' => $tahun_terbit
        ]);

        return redirect()->to(base_url('/'));
    }

    public function edit($id)
    {
        $model = new BukuModel();
        $data = $model->find($id);
        return view('edit', [
            'data' => $data
        ]);
    }

    public function update($id)
    {
        $model = new BukuModel();

        $judul = request()->getPost('judul');
        $penulis = request()->getPost('penulis');
        $penerbit = request()->getPost('penerbit');
        $tahun_terbit = request()->getPost('tahun_terbit');

        $model->update($id, [
            'judul' => $judul,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'tahun_terbit' => $tahun_terbit
        ]);

        return redirect()->to(base_url('/'));
    }

    public function hapus($id)
    {
        $model = new BukuModel();
        $model->delete($id);
        return redirect()->to(base_url('/'));
    }
}