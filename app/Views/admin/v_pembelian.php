<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h3>Manajemen Pembelian</h3>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Total Harga</th>
            <th>Ongkir</th>
            <th>Status</th>
            <th>Ubah Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($transaksi as $t): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($t['username']) ?></td>
            <td>Rp <?= number_format($t['total_harga'], 0, ',', '.') ?></td>
            <td>Rp <?= number_format($t['ongkir'], 0, ',', '.') ?></td>
            <td>
                <?php if ($t['status'] == 0): ?>
                    <span class="badge bg-warning text-dark">Belum Selesai</span>
                <?php else: ?>
                    <span class="badge bg-success">Sudah Selesai</span>
                <?php endif; ?>
            </td>
            <td>
                <a href="<?= base_url('/admin/pembelian/ubah-status/' . $t['id']) ?>" class="btn btn-primary btn-sm">Ubah Status</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
