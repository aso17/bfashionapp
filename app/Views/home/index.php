<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Pacifico&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css" />
    <title>Home</title>
</head>

<body>
    <nav class="navbar navbar-light" style="background-color:#5ba3a1;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-family:  Pacifico, cursive;letter-spacing: 3px;color:yellow">
                <h4>BFashion</h4>
            </a>

        </div>
    </nav>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="border:2px solid #5ba3a1 ;">
                    <div class="card-body">
                        <div class="card-header" style="border:1px solid #5ba3a1 ;">
                            <h5>Form Create Data Pasien</h5>

                        </div>
                        <form method="post" action="<?= base_url('/home') ?>">
                            <?= csrf_field() ?>
                            <div class=" row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text"
                                            class="form-control  <?= ($valid->hasError('nama_lengkap')) ? 'is-invalid' : '' ?>"
                                            id="nama_lengkap" name="nama_lengkap" value="<?= old('nama_lengkap') ?>">
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            <?= $valid->getError('nama_lengkap') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="jn_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select
                                            class="form-select <?= ($valid->hasError('jenisKelamin')) ? 'is-invalid' : '' ?>"
                                            aria-label="Default select example" name="jenisKelamin">
                                            <option value="<?= old('jenisKelamin') ?>" hidden>---Pilih---
                                            </option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div id="validationServer04Feedback" class="invalid-feedback">
                                        <?= $valid->getError('jenisKelamin') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat KTP</label>
                                        <input type="text"
                                            class="form-control <?= ($valid->hasError('alamat_ktp')) ? 'is-invalid' : '' ?>"
                                            id="alamat" name="alamat_ktp" value="<?= old('alamat_ktp') ?>">
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            <?= $valid->getError('alamat_ktp') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tgl_daftar" class="form-label">Tanggal Daftar</label>
                                        <input type="date"
                                            class="form-control <?= ($valid->hasError('tgl_daftar')) ? 'is-invalid' : '' ?>"
                                            id="tgl_daftar" name="tgl_daftar" value="<?= old('tgl_daftar') ?>">
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            <?= $valid->getError('tgl_daftar') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="mb-3">
                                        <label for="umur" class="form-label">Umur</label>
                                        <input type="number"
                                            class="form-control <?= ($valid->hasError('umur')) ? 'is-invalid' : '' ?>"
                                            id="umur" name="umur" value="<?= old('umur') ?>">
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            <?= $valid->getError('umur') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text"
                                            class="form-control <?= ($valid->hasError('keterangan')) ? 'is-invalid' : '' ?>"
                                            id="keterangan" name="keterangan" value="<?= old('keterangan') ?>">
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            <?= $valid->getError('keterangan') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-secondary btn-sm float-end"
                                style="border:2px solid ;border-radius:5px;"><i class="fas fa-save text-dark"></i>
                                save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h5> Daftar Pasien</h5>
                <?php if (session('pesan')) { ?>
                <div class="alert alert-success d-flex align-items-center" role="alert">

                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        <?= session('pesan') ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="card-body">
                <table class="table" id="pasien">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Alamat Lengkap</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Tanggal Daftar</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pasien as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?>.</th>
                            <td><?= $p['nama_lengkap'] ?></td>
                            <td><?= $p['alamat_ktp'] ?></td>
                            <td><?= $p['jenisKelamin'] ?></td>
                            <td><?= $p['umur'] ?></td>
                            <td><?= date('d-m-Y', strtotime($p['tgl_daftar']))  ?></td>
                            <td><?= $p['keterangan'] ?></td>
                            <td>
                                <button class="btn btn-sm btn-success" id="edit" data-bs-toggle="modal"
                                    data-bs-target="#editmodal" data-id-pasien="<?= $p['idPasien'] ?>"
                                    data-nama="<?= $p['nama_lengkap'] ?>" data-umr="<?= $p['umur'] ?>""
                                     data-jenis_k=" <?= $p['jenisKelamin'] ?>"" data-tgl="<?= $p['tgl_daftar'] ?>""
                                     data-ket=" <?= $p['keterangan'] ?>" data-alamat="<?= $p['alamat_ktp'] ?>""
                                    ><i class=" fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" id="delete" data-bs-toggle="modal"
                                    data-bs-target="#deletemodal" data-id-pasien="<?= $p['idPasien'] ?>"><i
                                        class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">yakin akan dihapus?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <form action="<?= base_url('/home') ?>" method="post">
                        <?= @csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" id="id_pasien" name="id_pasien">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">cancel</button>
                    <button type="sumit" class="btn btn-success btn-sm">OK</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal edit -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Ubah Data Pasien</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/home') ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" id="idpasien" name="idpasien">

                        <div class="mb-3">

                            <label for="namalengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control " id="namalengkap" name="namalengkap" value="">

                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin"
                                id="jk">
                                <option value="L">Laki-laki
                                </option>
                                <option value="P">Perempuan
                                </option>
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat KTP</label>
                            <input type="text" class="form-control " id="alama_t" name="alamat">

                        </div>
                        <div class="mb-3">

                            <label for="tgldaftar" class="form-label">Tanggal Daftar</label>
                            <input type="date" class="form-control" id="tgldaftar" name="tgldaftar">

                        </div>
                        <div class="mb-3">
                            <label for="old" class="form-label">Umur</label>
                            <input type="number" class="form-control " id="old" name="old">

                        </div>
                        <div class="mb-3">
                            <label for="ket_" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="ket_" name="ket_">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                </div>
            </div>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
        <script>
        $(document).ready(function() {
            $('#pasien').DataTable({
                "info": false,
                "paging": true,
            });
        });

        //hapus
        $(document).ready(function() {
            $(document).on('click', '#delete', function() {
                const id = $(this).data('id-pasien');
                $('#id_pasien').val(id);


            })
        })
        //ubah
        $(document).ready(function() {
            $(document).on('click', '#edit', function() {
                const id = $(this).data('id-pasien');
                const nama = $(this).data('nama');
                const umr = $(this).data('umr');
                const tgl = $(this).data('tgl');
                const jenis_kelamin = $(this).data('jenis_k');
                const alamat = $(this).data('alamat');
                const ket = $(this).data('ket');
                $('#idpasien').val(id);
                $('#namalengkap').val(nama);
                $('#tgldaftar').val(tgl);
                $('#old').val(umr);
                $('#jk').val(jenis_kelamin);
                $('#alama_t').val(alamat);
                $('#ket_').val(ket);

            })
        })
        </script>

</body>

</html>