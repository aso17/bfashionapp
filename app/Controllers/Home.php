<?php

namespace App\Controllers;


use App\Models\PasienModel;
use phpDocumentor\Reflection\Types\Null_;

class Home extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new PasienModel();
    }
    public function index()
    {

        session();
        $dataPasien = $this->model->findAll();
        $data = [
            'pasien' => $dataPasien,
            'valid' => \config\Services::validation()
        ];
        return view('home/index', $data);
    }
    public function store()
    {
        $valid = \config\Services::validation();
        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'umur' => [
                'rules' => 'required|max_length[2]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'max_length' => '{field} maksimal 2 huruf'
                ]
            ],
            'jenisKelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'alamat_ktp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'tgl_daftar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ]

        ])) {
            return redirect()->to('/')->withInput()->with('valid', $valid);
        }
        $this->model->save([
            'nama_lengkap' => $this->request->getpost('nama_lengkap'),
            'umur' => $this->request->getpost('umur'),
            'jenisKelamin' => $this->request->getpost('jenisKelamin'),
            'alamat_ktp' => $this->request->getpost('alamat_ktp'),
            'tgl_daftar' => $this->request->getpost('tgl_daftar'),
            'keterangan' => $this->request->getpost('keterangan'),
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/');
    }
    public function delete()
    {
        $idPasien = $this->request->getpost('id_pasien');
        $this->model->delete($idPasien);
        session()->setFlashdata('pesan', 'data telah dihapus');
        return redirect()->to('/');
    }
    public function update()
    {

        $jk = $this->model->find($this->request->getPost('idpasien'));
        if (!$this->request->getPost('jenis_kelamin')) {
            $jenisKelamin = $jk['jenisKelamin'];
        } else {
            $jenisKelamin = $this->request->getPost('jenis_kelamin');
        }

        $idPasien = $this->request->getPost('idpasien');
        $nama_lengkap = $this->request->getPost('namalengkap');
        $umur = $this->request->getPost('old');
        $alamat_ktp = $this->request->getPost('alamat');
        $tgl_daftar = $this->request->getPost('tgldaftar');
        $keterangan = $this->request->getPost('ket_');
        $this->model->save([
            'idPasien' => $idPasien,
            'nama_lengkap' => $nama_lengkap,
            'umur' => $umur,
            'jenisKelamin' => $jenisKelamin,
            'alamat_ktp' => $alamat_ktp,
            'tgl_daftar' => $tgl_daftar,
            'keterangan' => $keterangan
        ]);
        session()->setFlashdata('pesan', 'data berhasil diubah');
        return redirect()->to('/');
    }
}