<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h3>Manajemen Diskon</h3>
<!-- Tombol Tambah -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Tambah Diskon</button>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<?php if (session()->get('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nominal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($diskon as $d): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $d['tanggal'] ?></td>
                <td>Rp <?= number_format($d['nominal'], 0, ',', '.') ?></td>
                <td>
                    <!-- Tombol Ubah -->
                    <button
                        class="btn btn-success btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#modalEdit<?= $d['id'] ?>">Ubah</button>

                    <!-- Tombol Hapus -->
                    <a href="<?= base_url('/diskon/delete/' . $d['id']) ?>"
                        onclick="return confirm('Hapus data ini?')"
                        class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>

            <!-- Modal Edit -->
            <div class="modal fade" id="modalEdit<?= $d['id'] ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Diskon</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <form action="<?= base_url('/diskon/update/' . $d['id']) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label for="tanggal<?= $d['id'] ?>">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="tanggal<?= $d['id'] ?>" value="<?= $d['tanggal'] ?>" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nominal<?= $d['id'] ?>">Nominal</label>
                                    <input type="number" name="nominal" class="form-control" id="nominal<?= $d['id'] ?>" value="<?= $d['nominal'] ?>" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endforeach ?>
    </tbody>
</table>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form action="<?= base_url('/diskon/store') ?>" method="post" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Diskon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required value="<?= old('tanggal') ?>">
                </div>
                <div class="mb-3">
                    <label for="nominal">Nominal</label>
                    <input type="number" name="nominal" class="form-control" required value="<?= old('nominal') ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>