<?php
// Kode PHP untuk file pengguna.php
?>

<div class="card mb-3">
    <div class="card-body">
        <form action="" method="post">
            <!-- Form pengguna -->
            <div class="row mb-3">
            <div class="col md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="col md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="col md-6">
                <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" required>
            </div>
            <div class="col md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col md-6">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
            </div>
            <div class="col md-6">
            <label for="hak_akses" class="form-label">Hak Akses:</label>
                <select name="hak_akses" id="hak_akses">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    <option value="staff">Staff</option>
                </select>
            </div>
            </div>
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
        <h3>Data Pengguna</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>username</th>
                        <th>password</th>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>hak akses</th>
                        <th><i class="bi bi-gear-fill"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>username pengguna 1</td>
                        <td>password pengguna 1</td>
                        <td>Pengguna 1</td>
                        <td>Email pengguna 1</td>
                        <td>Jabatan pengguna 1</td>
                        <td>hak akses pengguna 1</td>
                        <td>
                        <a href="#editPengguna" class="text-decoration-none" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square text-success"></i>
                            </a>
                            <a href="" class="text-decoration-none">
                                <i class="bi bi-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>username pengguna 2</td>
                        <td>password pengguna 2</td>
                        <td>Pengguna 2</td>
                        <td>Email pengguna 2</td>
                        <td>Jabatan pengguna 2</td>
                        <td>hak akses pengguna 2</td>
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

<!-- Modal Edit Pengguna -->
<div class="modal fade" id="editPengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="" method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pengguna</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form edit pengguna -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>