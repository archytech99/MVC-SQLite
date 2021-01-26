<?php view('layouts/header'); ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Details Mahasiswa</h3>
                <?php if($data['status']) :?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['results']->nama; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $data['results']->jurusan; ?></h6>
                            <p class="card-text"><?= $data['results']->email; ?>.</p>
                            <p class="card-text"><?= $data['results']->alamat; ?>.</p>
                            <a href="<?= base_url("/mahasiswa"); ?>" class="card-link">Kembali</a>
                        </div>
                    </div>
                <?php else : ?>
                    <?= $data['results'] ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php view('layouts/footer'); ?>