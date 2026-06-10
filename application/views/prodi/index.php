<div class="card shadow border-0 mb-4">
    <div class="card-header bg-primary text-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
        <div>
            <h5 class="mb-0 fw-bold"><i class="bi bi-journal-bookmark me-2"></i>Data Program Studi</h5>
        </div>

        <a class="btn btn-light fw-bold" href="<?php echo base_url('prodi/tambah') ?>">
            <i class="bi bi-plus-circle me-1"></i> Tambah
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered align-middle w-100 mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>ID Prodi</th>
                        <th>Nama Prodi</th>
                        <th>Strata</th>
                        <th>Fakultas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($prodi as $key => $value): ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><span class="badge bg-primary"><?php echo $value['prodi_id'] ?></span></td>
                            <td><?php echo $value['prodi_name'] ?></td>
                            <td><span class="badge bg-success"><?php echo $value['prodi_strata'] ?></span></td>
                            <td><?php echo $value['fakultas_name'] ?></td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="<?php echo base_url('prodi/ubah/'.$value['prodi_id']) ?>">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <a class="btn btn-danger btn-sm btn-hapus" href="<?php echo base_url('prodi/hapus/'.$value['prodi_id']) ?>">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>