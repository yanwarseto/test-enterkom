<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemesanan Menu</title>
    <link rel="icon" href="<?= base_url('restaurant.jpg') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    body {
        -webkit-font-smoothing: antialiased;
        text-rendering: optimizeLegibility;
        font-family: 'Lato', sans-serif;
        letter-spacing: 0px;
        font-size: 16px;
        color: #6e726e;
        font-weight: 400;
        line-height: 27px;
    }

    .menu-title {
        margin-bottom: 1rem;
    }

    .menu-content {
        margin-bottom: 1rem;
    }

    .dish-meta {
        font-size: 12px;
        text-transform: uppercase;
        display: block;
        width: 210px;
        line-height: 1.7;
    }

    .dish-title b {
        color: orange;
    }

    .dish-price {

        font-size: 26px;
        color: #e03c23;
        font-weight: 500;
        font-family: 'Zilla Slab', serif;
    }

    .menu-price {
        margin-top: 1rem;
    }
</style>

<body>
    <!-- menu -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center
                ">
                    <div class="page-section">
                        <h1 class="page-title">Food Menu</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb40">
                    <div class="menu-block">
                        <h3 class="menu-title">Makanan</h3>
                        <?php
                        $previousNamaMenu = null; // Variabel untuk menyimpan nama_menu sebelumnya

                        foreach ($menuItems as $list) :
                            if ($list['kategori'] == 'Makanan') :
                                if ($list['nama_menu'] != $previousNamaMenu) : // Cek apakah nama_menu berbeda dari sebelumnya
                        ?>
                                    <div class="menu-content">
                                        <div class="row g-3 align-items-center">
                                            <div class="col-4">
                                                <div class="dish-img"><a href="#"><img src="<?= $list['gambar'] ?>" alt="" class="rounded-circle img-fluid"></a></div>
                                            </div>
                                            <div class="col-6">
                                                <div class="dish-content">
                                                    <h5 class="dish-title"><b><?= $list['nama_menu']  ?></b></h5>

                                                    <div class="menu-price">
                                                        <p style="font-style: italic; font-weight:bold; font-size:15px"> <?= $list['keterangan']  ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                endif;
                                $previousNamaMenu = $list['nama_menu']; // Update nama_menu sebelumnya
                            endif;
                        endforeach;
                        ?>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb40">
                    <div class="menu-block">
                        <h3 class="menu-title">Minuman</h3>
                        <?php
                        $previousNamaMenu = null; // Variabel untuk menyimpan nama_menu sebelumnya

                        foreach ($menuItems as $list) :
                            if ($list['kategori'] == 'Minuman') :
                                if ($list['nama_menu'] != $previousNamaMenu) : // Cek apakah nama_menu berbeda dari sebelumnya
                        ?>
                                    <div class="menu-content">
                                        <div class="row g-3 align-items-center">
                                            <div class="col-4">
                                                <div class="dish-img"><a href="#"><img src="<?= $list['gambar'] ?>" alt="" class="rounded-circle img-fluid"></a></div>
                                            </div>
                                            <div class="col-6">
                                                <div class="dish-content">
                                                    <h5 class="dish-title"><b><?= $list['nama_menu']  ?></b></h5>

                                                    <div class="menu-price">
                                                        <p style="font-style: italic; font-weight:bold; font-size:15px"> <?= $list['keterangan']  ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                endif;
                                $previousNamaMenu = $list['nama_menu']; // Update nama_menu sebelumnya
                            endif;
                        endforeach;
                        ?>
                    </div>
                </div>
                <!-- /.soup -->
                <!-- main course -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb40">
                    <div class="menu-block">
                        <h3 class="menu-title">Main Course</h3>
                        <div class="menu-content">
                            <div class="row g-3 align-items-center">
                                <div class="col-3">
                                    <div class="dish-img"><a href="#"><img src="http://via.placeholder.com/70x70" alt="" class="rounded-circle img-fluid"></a></div>
                                </div>
                                <div class="col-7">
                                    <div class="dish-content">
                                        <h5 class="dish-title"><b>Minestrone</b></h5>
                                        <span class="dish-meta">Beans / Onions / Celery / Carrots</span>
                                        <h5 class="menu-price">
                                            <p>$15</p>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-content">
                            <div class="row g-3 align-items-center">
                                <div class="col-3">
                                    <div class="dish-img"><a href="#"><img src="http://via.placeholder.com/70x70" alt="" class="rounded-circle img-fluid"></a></div>
                                </div>
                                <div class="col-7">
                                    <div class="dish-content">
                                        <h5 class="dish-title"><b>Minestrone</b></h5>
                                        <span class="dish-meta">Beans / Onions / Celery / Carrots</span>
                                        <h5 class="menu-price">
                                            <p>$15</p>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-content">
                            <div class="row g-3 align-items-center">
                                <div class="col-3">
                                    <div class="dish-img"><a href="#"><img src="http://via.placeholder.com/70x70" alt="" class="rounded-circle img-fluid"></a></div>
                                </div>
                                <div class="col-7">
                                    <div class="dish-content">
                                        <h5 class="dish-title"><b>Minestrone</b></h5>
                                        <span class="dish-meta">Beans / Onions / Celery / Carrots</span>
                                        <h5 class="menu-price">
                                            <p>$15</p>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.main Course -->
            </div>
        </div>
    </div>
    <!-- /.menu -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>