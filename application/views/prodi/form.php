<div class="row justify-content-center">
  <div class="col-md-7">
    <div class="card border-0" style="border-radius:12px;border:0.5px solid #e5e7eb !important;overflow:hidden;">

      <div class="card-header bg-light d-flex align-items-center justify-content-between py-3 px-4" style="border-bottom:1px solid #f3f4f6;">
        <div class="d-flex align-items-center gap-2">
          <i class="bi bi-journal-bookmark text-secondary" style="font-size:17px;"></i>
          <span style="font-size:14px;font-weight:500;">
            <?php echo isset($button) && $button === 'Update' ? 'Ubah Program Studi' : 'Tambah Program Studi'; ?>
          </span>
          <span class="badge rounded-pill" style="font-size:11px;background:#EAF3DE;color:#27500A;">
            <?php echo isset($button) && $button === 'Update' ? 'Edit' : 'Baru'; ?>
          </span>
        </div>
        <a href="<?php echo base_url('prodi') ?>" class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1" style="font-size:12px;">
          <i class="bi bi-arrow-left"></i> Kembali
        </a>
      </div>

      <div class="card-body px-4 py-4">
        <form action="<?php echo $action; ?>" method="post" novalidate>

          <?php if (!isset($button) || $button !== 'Update'): ?>
          <!-- Field ID hanya muncul saat tambah (ID manual) -->
          <div class="mb-4">
            <label for="prodi_id" class="d-flex align-items-center gap-1 mb-2" style="font-size:12px;font-weight:500;color:#6b7280;">
              <i class="bi bi-hash" style="font-size:14px;"></i> ID Program Studi
            </label>
            <input
              type="number"
              name="prodi_id"
              id="prodi_id"
              class="form-control <?php echo form_error('prodi_id') ? 'is-invalid' : (isset($_POST['prodi_id']) ? 'is-valid' : ''); ?>"
              value="<?php echo set_value('prodi_id'); ?>"
              placeholder="Contoh: 23">
            <div class="form-text" style="font-size:11.5px;">Masukkan angka unik sebagai pengenal program studi</div>
            <?php if (form_error('prodi_id')): ?>
              <div class="invalid-feedback"><?php echo form_error('prodi_id'); ?></div>
            <?php endif; ?>
          </div>
          <?php endif; ?>

          <!-- Dropdown Fakultas -->
          <div class="mb-4">
            <label for="fakultas_id" class="d-flex align-items-center gap-1 mb-2" style="font-size:12px;font-weight:500;color:#6b7280;">
              <i class="bi bi-building" style="font-size:14px;"></i> Fakultas
            </label>
            <select
              name="fakultas_id"
              id="fakultas_id"
              class="form-select <?php echo form_error('fakultas_id') ? 'is-invalid' : (isset($_POST['fakultas_id']) ? 'is-valid' : ''); ?>">
              <option value="">-- Pilih Fakultas --</option>
              <?php foreach ($fakultas as $f): ?>
                <option value="<?php echo $f['fakultas_id']; ?>"
                  <?php echo set_select('fakultas_id', $f['fakultas_id'], (isset($prodi['fakultas_id']) && $prodi['fakultas_id'] == $f['fakultas_id'])); ?>>
                  <?php echo $f['fakultas_name']; ?>
                </option>
              <?php endforeach; ?>
            </select>
            <div class="form-text" style="font-size:11.5px;">Pilih fakultas yang menaungi program studi ini</div>
            <?php if (form_error('fakultas_id')): ?>
              <div class="invalid-feedback"><?php echo form_error('fakultas_id'); ?></div>
            <?php endif; ?>
          </div>

          <!-- Nama Program Studi -->
          <div class="mb-4">
            <label for="prodi_name" class="d-flex align-items-center gap-1 mb-2" style="font-size:12px;font-weight:500;color:#6b7280;">
              <i class="bi bi-journal-bookmark" style="font-size:14px;"></i> Nama Program Studi
            </label>
            <input
              type="text"
              name="prodi_name"
              id="prodi_name"
              class="form-control <?php echo form_error('prodi_name') ? 'is-invalid' : (isset($_POST['prodi_name']) ? 'is-valid' : ''); ?>"
              value="<?php echo set_value('prodi_name', isset($prodi['prodi_name']) ? $prodi['prodi_name'] : ''); ?>"
              placeholder="Contoh: Teknik Informatika">
            <div class="form-text" style="font-size:11.5px;">Tuliskan nama lengkap program studi</div>
            <?php if (form_error('prodi_name')): ?>
              <div class="invalid-feedback"><?php echo form_error('prodi_name'); ?></div>
            <?php endif; ?>
          </div>

          <!-- Radio Strata -->
          <div class="mb-4">
            <label class="d-flex align-items-center gap-1 mb-2" style="font-size:12px;font-weight:500;color:#6b7280;">
              <i class="bi bi-mortarboard" style="font-size:14px;"></i> Strata
            </label>
            <div class="d-flex gap-3">
              <?php
              $strata_options = ['D3', 'S1', 'S2'];
              foreach ($strata_options as $s): ?>
                <div class="form-check">
                  <input
                    class="form-check-input <?php echo form_error('prodi_strata') ? 'is-invalid' : (isset($_POST['prodi_strata']) ? 'is-valid' : ''); ?>"
                    type="radio"
                    name="prodi_strata"
                    id="strata_<?php echo $s; ?>"
                    value="<?php echo $s; ?>"
                    <?php echo set_radio('prodi_strata', $s, (isset($prodi['prodi_strata']) && $prodi['prodi_strata'] === $s)); ?>>
                  <label class="form-check-label" for="strata_<?php echo $s; ?>" style="font-size:13.5px;">
                    <?php echo $s; ?>
                  </label>
                </div>
              <?php endforeach; ?>
            </div>
            <?php if (form_error('prodi_strata')): ?>
              <div class="text-danger mt-1" style="font-size:12px;"><?php echo form_error('prodi_strata'); ?></div>
            <?php endif; ?>
          </div>

          <hr style="border-color:#f3f4f6;margin:1.25rem 0;">

          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary d-flex align-items-center gap-1" style="font-size:13px;">
              <i class="bi bi-floppy"></i>
              <?php echo isset($button) ? $button : 'Simpan'; ?>
            </button>
            <a href="<?php echo base_url('prodi') ?>" class="btn btn-outline-secondary d-flex align-items-center gap-1" style="font-size:13px;">
              <i class="bi bi-x-lg"></i> Batal
            </a>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>