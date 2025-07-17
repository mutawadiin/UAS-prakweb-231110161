<?php $__env->startSection('content'); ?>
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-8">
    <h1 class="text-2xl font-bold mb-6 text-primary-dark">Edit Rencana Liburan</h1>
    <?php if($errors->any()): ?>
        <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded shadow">
            <?php echo e($errors->first()); ?>

        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('rencana.update', $rencana->id)); ?>" method="POST" class="space-y-5">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Nama Rencana</label>
            <input type="text" name="nama_rencana" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" value="<?php echo e($rencana->nama_rencana); ?>" required>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Destinasi</label>
            <input type="text" name="destinasi" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" value="<?php echo e($rencana->destinasi); ?>" required>
        </div>
        <div class="flex gap-4">
            <div class="flex-1">
                <label class="block text-primary-dark font-semibold mb-1">Tanggal Berangkat</label>
                <input type="date" name="tgl_berangkat" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" value="<?php echo e($rencana->tgl_berangkat); ?>" required>
            </div>
            <div class="flex-1">
                <label class="block text-primary-dark font-semibold mb-1">Tanggal Pulang</label>
                <input type="date" name="tgl_pulang" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" value="<?php echo e($rencana->tgl_pulang); ?>" required>
            </div>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Estimasi Biaya</label>
            <input type="number" name="estimasi_biaya" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" value="<?php echo e($rencana->estimasi_biaya); ?>" required>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Catatan</label>
            <textarea name="catatan" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent"><?php echo e($rencana->catatan); ?></textarea>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Status</label>
            <select name="status" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent">
                <option value="aktif" <?php if($rencana->status=='aktif'): ?> selected <?php endif; ?>>Aktif</option>
                <option value="selesai" <?php if($rencana->status=='selesai'): ?> selected <?php endif; ?>>Selesai</option>
            </select>
        </div>
        <button type="submit" class="w-full bg-accent hover:bg-primary text-white font-bold py-2 rounded-lg shadow transition">Update</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\prakweb\UAS\aplikasi_rencana_liburan\resources\views/rencana/edit.blade.php ENDPATH**/ ?>