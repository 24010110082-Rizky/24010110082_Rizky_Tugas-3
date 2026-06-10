<div class="card shadow border-0 mb-4">
    <div class="card-header bg-primary text-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
        <div>
            <h5 class="mb-0 fw-bold"><i class="bi bi-building me-2"></i>Data Fakultas</h5>
        </div>
        <a class="btn btn-light fw-bold" href="<?php echo base_url('fakultas/tambah') ?>">
            <i class="bi bi-plus-circle me-1"></i> Tambah
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered align-middle w-100 mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>ID Fakultas</th>
                        <th>Nama Fakultas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($fakultas as $key => $value): ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><span class="badge bg-primary"><?php echo $value['fakultas_id'] ?></span></td>
                            <td><?php echo $value['fakultas_name'] ?></td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="<?php echo base_url('fakultas/ubah/'.$value['fakultas_id']) ?>">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <button class="btn btn-danger btn-sm btn-hapus"
                                    data-id="<?php echo $value['fakultas_id'] ?>"
                                    data-nama="<?php echo $value['fakultas_name'] ?>"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalHapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="modalHapus" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title"><i class="bi bi-exclamation-triangle me-2"></i>Konfirmasi Hapus</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Apakah kamu yakin ingin menghapus fakultas <strong id="namaFakultas"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a id="btnKonfirmasiHapus" href="#" class="btn btn-danger">
                    <i class="bi bi-trash me-1"></i> Hapus
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.btn-hapus').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var id = this.getAttribute('data-id');
            var nama = this.getAttribute('data-nama');
            document.getElementById('namaFakultas').textContent = nama;
            document.getElementById('btnKonfirmasiHapus').href = '<?php echo base_url('fakultas/hapus/') ?>' + id;
        });
    });
</script>