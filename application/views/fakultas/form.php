<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card border-0" style="border-radius:12px;border:0.5px solid #e5e7eb !important;overflow:hidden;">

      <div class="card-header bg-light d-flex align-items-center justify-content-between py-3 px-4" style="border-bottom:1px solid #f3f4f6;">
        <div class="d-flex align-items-center gap-2">
          <i class="bi bi-building text-secondary" style="font-size:17px;"></i>
          <span style="font-size:14px;font-weight:500;">
            <?php echo isset($button) && $button === 'Update' ? 'Ubah Fakultas' : 'Tambah Fakultas'; ?>
          </span>
          <span class="badge rounded-pill" style="font-size:11px;background:#EAF3DE;color:#27500A;">
            <?php echo isset($button) && $button === 'Update' ? 'Edit' : 'Baru'; ?>
          </span>
        </div>
        <a href="<?php echo base_url('fakultas') ?>" class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1" style="font-size:12px;">
          <i class="bi bi-arrow-left"></i> Kembali
        </a>
      </div>

      <div class="card-body px-4 py-4">
        <form action="<?php echo $action; ?>" method="post" novalidate>

          <div class="mb-4">
            <label for="fakultas_name" class="d-flex align-items-center gap-1 mb-2" style="font-size:12px;font-weight:500;color:#6b7280;">
              <i class="bi bi-mortarboard" style="font-size:14px;"></i> Nama Fakultas
            </label>
            <input
              type="text"
              name="fakultas_name"
              id="fakultas_name"
              class="form-control <?php echo form_error('fakultas_name') ? 'is-invalid' : (isset($_POST['fakultas_name']) ? 'is-valid' : ''); ?>"
              value="<?php echo set_value('fakultas_name', isset($fakultas['fakultas_name']) ? $fakultas['fakultas_name'] : ''); ?>"
              placeholder="Contoh: Fakultas Ilmu Komputer">
            <div class="form-text" style="font-size:11.5px;">Tuliskan nama lengkap fakultas</div>
            <?php if (form_error('fakultas_name')): ?>
              <div class="invalid-feedback"><?php echo form_error('fakultas_name'); ?></div>
            <?php endif; ?>
          </div>

          <hr style="border-color:#f3f4f6;margin:1.25rem 0;">

          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary d-flex align-items-center gap-1" style="font-size:13px;">
              <i class="bi bi-floppy"></i>
              <?php echo isset($button) ? $button : 'Simpan'; ?>
            </button>
            <a href="<?php echo base_url('fakultas') ?>" class="btn btn-outline-secondary d-flex align-items-center gap-1" style="font-size:13px;">
              <i class="bi bi-x-lg"></i> Batal
            </a>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>