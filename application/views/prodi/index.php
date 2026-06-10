<div class="card border-0 mb-4" style="border-radius:12px; overflow:hidden; border:0.5px solid #e5e7eb !important;">
    <div class="card-header bg-white d-flex align-items-center justify-content-between py-3 px-4" style="border-bottom:1px solid #f3f4f6;">
        <div class="d-flex align-items-center gap-3">
            <div class="d-flex align-items-center justify-content-center rounded-2 bg-primary bg-opacity-10" style="width:34px;height:34px;">
                <i class="bi bi-journal-bookmark text-primary" style="font-size:16px;"></i>
            </div>
            <span class="fw-500" style="font-size:14px;">Data Program Studi</span>
            <span class="badge rounded-pill" style="font-size:11px;background:#E6F1FB;color:#0C447C;">
                <?php echo count($prodi); ?> data
            </span>
        </div>
        <a href="<?php echo base_url('prodi/tambah') ?>" class="btn btn-primary btn-sm d-flex align-items-center gap-1" style="font-size:13px;">
            <i class="bi bi-plus-lg"></i> Tambah
        </a>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table id="datatable" class="table table-hover mb-0 align-middle w-100">
                <thead>
                    <tr style="background:#f9fafb;">
                        <th class="px-4 py-3" style="font-size:11px;font-weight:500;color:#6b7280;letter-spacing:.04em;width:50px;">No.</th>
                        <th class="px-4 py-3" style="font-size:11px;font-weight:500;color:#6b7280;letter-spacing:.04em;">Nama Program Studi</th>
                        <th class="px-4 py-3" style="font-size:11px;font-weight:500;color:#6b7280;letter-spacing:.04em;width:80px;">Strata</th>
                        <th class="px-4 py-3" style="font-size:11px;font-weight:500;color:#6b7280;letter-spacing:.04em;">Fakultas</th>
                        <th class="px-4 py-3" style="font-size:11px;font-weight:500;color:#6b7280;letter-spacing:.04em;width:90px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prodi as $key => $value): ?>
                    <tr style="border-bottom:1px solid #f3f4f6;">
                        <td class="px-4" style="font-size:12px;color:#9ca3af;"><?php echo $key + 1 ?>.</td>
                        <td class="px-4">
                            <div class="d-flex align-items-center gap-2">
                                <div class="d-flex align-items-center justify-content-center rounded-2 bg-primary bg-opacity-10" style="width:30px;height:30px;flex-shrink:0;">
                                    <i class="bi bi-journal-bookmark text-primary" style="font-size:13px;"></i>
                                </div>
                                <span style="font-size:13.5px;"><?php echo $value['prodi_name'] ?></span>
                            </div>
                        </td>
                        <td class="px-4">
                            <span class="badge rounded-pill" style="font-size:11px;background:#EAF3DE;color:#27500A;font-weight:500;">
                                <?php echo $value['prodi_strata'] ?>
                            </span>
                        </td>
                        <td class="px-4" style="font-size:13.5px;color:#6b7280;">
                            <?php echo $value['fakultas_name'] ?? '-' ?>
                        </td>
                        <td class="px-4">
                            <div class="d-flex gap-2">
                                <a href="<?php echo base_url('prodi/ubah/'.$value['prodi_id']) ?>"
                                   class="d-flex align-items-center justify-content-center rounded-2"
                                   style="width:30px;height:30px;background:#FAEEDA;border:0.5px solid #EF9F27;text-decoration:none;">
                                    <i class="bi bi-pencil-square" style="font-size:13px;color:#633806;"></i>
                                </a>
                                <a href="<?php echo base_url('prodi/hapus/'.$value['prodi_id']) ?>"
                                   class="btn-hapus d-flex align-items-center justify-content-center rounded-2"
                                   style="width:30px;height:30px;background:#FCEBEB;border:0.5px solid #F09595;text-decoration:none;">
                                    <i class="bi bi-trash" style="font-size:13px;color:#791F1F;"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>