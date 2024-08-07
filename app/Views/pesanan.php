<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemesanan Menu</title>
    <link rel="icon" href="<?= base_url('restaurant.jpg') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        $db = \Config\Database::connect();
                        foreach ($menuItems as $list) :
                            $pid_menu = $list['v_pid_menu'];

                            try {
                                $query = $db->query('SELECT * FROM "PO".varian_menu WHERE v_pid_menu = ?', [$pid_menu]);
                                $detail = $query->getResultArray();
                                if ($detail === null) {
                                    throw new \Exception("No details found for pid_menu: $pid_menu");
                                }
                            } catch (\Exception $e) {
                                echo "Error: " . $e->getMessage();
                                continue;
                            }
                        ?>
                        <?php if ($list['kategori'] == 'Makanan') : ?>
                        <?php if ($list['nama_menu'] != $previousNamaMenu) : // Cek apakah nama_menu berbeda dari sebelumnya

                                ?>
                        <div class="menu-content">
                            <div class="row g-3 align-items-center">
                                <div class="col-4">
                                    <div class="dish-img"><a href="#"><img src="<?= $list['gambar'] ?>" alt=""
                                                class="rounded-circle img-fluid"></a></div>
                                </div>
                                <div class="col-6">
                                    <div class="dish-content">
                                        <h5 class="dish-title"><b><?= $list['nama_menu']  ?></b>
                                        </h5>

                                        <div class="menu-price">
                                            <p style="font-style: italic; font-weight:bold; font-size:15px">
                                                <?= $list['keterangan']  ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <?php if ($list['varian'] != null) : ?>
                                    <button type="button" class="btn btn-info text-white" data-bs-toggle="modal"
                                        data-bs-target="#myModal<?= $pid_menu ?>"><i
                                            class="fa fa-plus-square"></i></button>
                                    <?php else : ?>
                                    <button type="button" class="btn btn-info text-white"><i
                                            class="fa fa-cart-plus"></i></button>
                                    <?php endif; ?>
                                </div>


                            </div>
                        </div>
                        <?php endif;
                                $previousNamaMenu = $list['nama_menu']; // Update nama_menu sebelumnya
                                ?>

                        <div class="modal fade" id="myModal<?= $pid_menu ?>" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel<?= $pid_menu ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel<?= $pid_menu ?>">Tambah Pesanan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="dish-img"><a href="#"><img src="<?= $list['gambar'] ?>"
                                                            alt="" class="rounded-circle img-fluid"></a></div>
                                            </div>
                                            <div class="col-6">
                                                <div class="dish-content">
                                                    <h5 class="dish-title"><b><?= $list['nama_menu'] ?></b></h5>
                                                    <div class="menu-price">
                                                        <?php foreach ($detail as $d) : ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault">
                                                            <label class="form-check-label" for="flexRadioDefault">
                                                                <?= $d['varian'] . ' (' . number_format($d['harga'], 0, ',', '.') . ' ) ' ?>
                                                            </label>
                                                        </div>
                                                        <?php endforeach; ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary w-100">Tambah ke Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php
                        endforeach;
                        ?>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb40">
                    <div class="menu-block">
                        <h3 class="menu-title">Minuman</h3>
                        <?php
                        $previousNamaMenu = null; // Variabel untuk menyimpan nama_menu sebelumnya
                        $db = \Config\Database::connect();
                        foreach ($menuItems as $list) :
                            $pid_menu = $list['v_pid_menu'];

                            try {
                                $query = $db->query('SELECT * FROM "PO".varian_menu WHERE v_pid_menu = ?', [$pid_menu]);
                                $detail = $query->getResultArray();
                                if ($detail === null) {
                                    throw new \Exception("No details found for pid_menu: $pid_menu");
                                }
                            } catch (\Exception $e) {
                                echo "Error: " . $e->getMessage();
                                continue;
                            }
                        ?>
                        <?php if ($list['kategori'] == 'Minuman') : ?>
                        <?php if ($list['nama_menu'] != $previousNamaMenu) : // Cek apakah nama_menu berbeda dari sebelumnya

                                ?>
                        <div class="menu-content">
                            <div class="row g-3 align-items-center">
                                <div class="col-4">
                                    <div class="dish-img"><a href="#"><img src="<?= $list['gambar'] ?>" alt=""
                                                class="rounded-circle img-fluid"></a></div>
                                </div>
                                <div class="col-6">
                                    <div class="dish-content">
                                        <h5 class="dish-title"><b><?= $list['nama_menu']  ?></b>
                                        </h5>

                                        <div class="menu-price">
                                            <p style="font-style: italic; font-weight:bold; font-size:15px">
                                                <?= $list['keterangan']  ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <?php if ($list['varian'] != null) : ?>
                                    <button type="button" class="btn btn-info text-white" data-bs-toggle="modal"
                                        data-bs-target="#myModal<?= $pid_menu ?>"><i
                                            class="fa fa-plus-square"></i></button>
                                    <?php else : ?>
                                    <button type="button" class="btn btn-info text-white"><i
                                            class="fa fa-cart-plus"></i></button>
                                    <?php endif; ?>
                                </div>


                            </div>
                        </div>
                        <?php endif;
                                $previousNamaMenu = $list['nama_menu']; // Update nama_menu sebelumnya
                                ?>

                        <div class="modal fade" id="myModal<?= $pid_menu ?>" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel<?= $pid_menu ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel<?= $pid_menu ?>">Tambah Pesanan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="dish-img"><a href="#"><img src="<?= $list['gambar'] ?>"
                                                            alt="" class="rounded-circle img-fluid"></a></div>
                                            </div>
                                            <div class="col-6">
                                                <div class="dish-content">
                                                    <h5 class="dish-title"><b><?= $list['nama_menu'] ?></b></h5>
                                                    <div class="menu-price">
                                                        <?php foreach ($detail as $d) : ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault">
                                                            <label class="form-check-label" for="flexRadioDefault">
                                                                <?= $d['varian'] . ' (' . number_format($d['harga'], 0, ',', '.') . ' ) ' ?>
                                                            </label>
                                                        </div>
                                                        <?php endforeach; ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary w-100">Tambah ke Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php
                        endforeach;
                        ?>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb40">
                    <div class="menu-block">
                        <h3 class="menu-title">Promo</h3>
                        <?php
                        $previousNamaMenu = null; // Variabel untuk menyimpan nama_menu sebelumnya
                        $db = \Config\Database::connect();
                        foreach ($menuItems as $list) :
                            $pid_menu = $list['v_pid_menu'];

                            try {
                                $query = $db->query('SELECT * FROM "PO".varian_menu WHERE v_pid_menu = ?', [$pid_menu]);
                                $detail = $query->getResultArray();
                                if ($detail === null) {
                                    throw new \Exception("No details found for pid_menu: $pid_menu");
                                }
                            } catch (\Exception $e) {
                                echo "Error: " . $e->getMessage();
                                continue;
                            }
                        ?>
                        <?php if ($list['kategori'] == 'Promo') : ?>
                        <?php if ($list['nama_menu'] != $previousNamaMenu) : // Cek apakah nama_menu berbeda dari sebelumnya

                                ?>
                        <div class="menu-content">
                            <div class="row g-3 align-items-center">
                                <div class="col-4">
                                    <div class="dish-img"><a href="#"><img src="<?= $list['gambar'] ?>" alt=""
                                                class="rounded-circle img-fluid"></a></div>
                                </div>
                                <div class="col-6">
                                    <div class="dish-content">
                                        <h5 class="dish-title"><b><?= $list['nama_menu']  ?></b>
                                        </h5>

                                        <div class="menu-price">
                                            <p style="font-style: italic; font-weight:bold; font-size:15px">
                                                <?= $list['keterangan']  ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <?php if ($list['varian'] != null) : ?>
                                    <button type="button" class="btn btn-info text-white" data-bs-toggle="modal"
                                        data-bs-target="#myModal<?= $pid_menu ?>"><i
                                            class="fa fa-plus-square"></i></button>
                                    <?php else : ?>
                                    <button type="button" class="btn btn-info text-white"><i
                                            class="fa fa-cart-plus"></i></button>
                                    <?php endif; ?>
                                </div>


                            </div>
                        </div>
                        <?php endif;
                                $previousNamaMenu = $list['nama_menu']; // Update nama_menu sebelumnya
                                ?>

                        <div class="modal fade" id="myModal<?= $pid_menu ?>" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel<?= $pid_menu ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel<?= $pid_menu ?>">Tambah Pesanan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="dish-img"><a href="#"><img src="<?= $list['gambar'] ?>"
                                                            alt="" class="rounded-circle img-fluid"></a></div>
                                            </div>
                                            <div class="col-6">
                                                <div class="dish-content">
                                                    <h5 class="dish-title"><b><?= $list['nama_menu'] ?></b></h5>
                                                    <div class="menu-price">
                                                        <?php foreach ($detail as $d) : ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault">
                                                            <label class="form-check-label" for="flexRadioDefault">
                                                                <?= $d['varian'] . ' (' . number_format($d['harga'], 0, ',', '.') . ' ) ' ?>
                                                            </label>
                                                        </div>
                                                        <?php endforeach; ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary w-100">Tambah ke Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php
                        endforeach;
                        ?>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.menu -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>