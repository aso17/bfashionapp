<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use phpDocumentor\Reflection\Types\Null_;

class Users extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        $model = new UserModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new UserModel();
        $data = $model->find(['idUsers', $id]);
        if (!$data) return $this->failNotFound('data tidak ada');
        return $this->respond($data[0]);
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //validasi
        helper(['form']);
        $ruls = [
            'username' => 'required',
            'nama' => 'required',
            'pass' => 'required',
            'foto' => 'required'
        ];
        //data inputan
        $data = [
            'username' => $this->request->getVar('username'),
            'namaLengkap' => $this->request->getVar('nama'),
            'password' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
            'foto' => $this->request->getVar('foto')
        ];

        // cek
        if (!$this->validate($ruls)) return $this->fail($this->validator->getError());
        //masukan data

        $model = new UserModel();
        $model->save($data);
        $respond = [
            'status' => 201,
            'error' => null,
            'message' => [
                'succes' => 'berhasil ditambahkan'
            ],
        ];
        return $this->respondCreated($respond);
    }



    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //validasi
        helper(['form']);
        $ruls = [
            'username' => 'required',
            'nama' => 'required',
            'pass' => 'required',
            'foto' => 'required'
        ];
        //data inputan
        $data = [
            'username' => $this->request->getVar('username'),
            'namaLengkap' => $this->request->getVar('nama'),
            'password' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
            'foto' => $this->request->getVar('foto')
        ];

        // cek
        if (!$this->validate($ruls)) return $this->fail($this->validator->getError());
        //Update data
        $model = new UserModel();
        $idfind = $model->find(['idUsers', $id]);
        if (!$idfind) return $this->failNotFound('Data yang mau diupdate tidak ada');
        $model->update($id, $data);
        $respond = [
            'status' => 202,
            'error' => null,
            'message' => [
                'succes' => 'berhasil diupdate'
            ],
        ];
        return $this->respond($respond);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new UserModel();
        $idfind = $model->find(['idUsers', $id]);
        if (!$idfind) return $this->failNotFound('Data yang mau dihapus tidak ada');
        $model->delete($id);
        $respond = [
            'status' => 200,
            'error' => null,
            'message' => [
                'succes' => 'berhasil dihapus'
            ],
        ];
        return $this->respond($respond);
        redirect($_SERVER['REQUEST_URI'], 'refresh');
    }
}