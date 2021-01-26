<?php view('layouts/header'); ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <h1>Ini adalah halaman About</h1>
                <p>Halo, Nama saya <?= $data['nama'];?>. Hobi saya <?= $data['hobi'][0];?> dan <?= $data['hobi'][1];?>. Umur saya <?= $data['umur'];?> tahun.</p>
            </div>
        </div>
    </div>
<?php view('layouts/footer'); ?>