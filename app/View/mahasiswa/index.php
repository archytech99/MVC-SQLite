<?php view('layouts/header'); ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>
                    Daftar Mahasiswa
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                        Tambah Mahasiswa Baru
                    </button>
                </h3>
                <div class="mt-3">
                    <?php flash(); ?>
                </div>
                <?php if($data['status']) :?>
                    <?php foreach($data['results'] as $mhs) : ?>
                    <ul class="list-group m">
                        <li class="list-group-item">
                            <?= $mhs->nama; ?>
                            <a href="<?= base_url("/mahasiswa/detail/{$mhs->id}"); ?>" class="badge badge-primary float-right ml-2">&gt;&gt;</a>
                            <a href="<?= base_url("/mahasiswa/hapus/{$mhs->id}"); ?>" data-id="<?= $mhs->id; ?>" class="badge badge-danger float-right ml-2" onclick="return confirm('Yakin ?');">&times;</a>
                            <a href="#" data-id="<?= $mhs->id; ?>" class="badge badge-primary float-right ml-2 btn-editUser" data-toggle="modal" data-target="#exampleModal">edit</a>
                        </li>
                    </ul>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?= $data['results'] ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php view('layouts/footer'); ?>
