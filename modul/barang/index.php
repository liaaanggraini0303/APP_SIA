<?php
// Kode PHP untuk file barang.php
?>

<div class="card mb-3">
    <div class="card-body">
        <form action="" method="post">
            <!-- Form barang -->
            <div class="row mb-3">
            <div class="col md-6">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
            </div>
            <div class="col-md-4">
                    <label for="harga" class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="harga">
                    </div>
                </div>
            <div class="col md-6">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" required>
            </div></div>
         <hr class="text-secondary">
            <div class="text-end">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Data Barang</h3>
    </div>
    <div class="card-body">
    <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th><i class="bi bi-gear-fill"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Barang 1</td>
                        <td>Rp. 100.000,-</td>
                        <td>10</td>
                        <td>
                            <a href="#editBarang" class="text-decoration-none" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square text-success"></i>
                            </a>
                            <a href="" class="text-decoration-none">
                                <i class="bi bi-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Barang 2</td>
                        <td>Rp. 200.000,-</td>
                        <td>5</td>
                        <td>
                            <a href="" class="text-decoration-none">
                                <i class="bi bi-pencil-square text-success"></i>
                            </a>
                            <a href="" class="text-decoration-none">
                                <i class="bi bi-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Edit Barang -->
<div class="modal fade" id="editBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="" method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form edit barang -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>