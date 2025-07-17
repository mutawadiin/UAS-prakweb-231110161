<?php $__env->startSection('content'); ?>
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-8">
    <h1 class="text-2xl font-bold mb-6 text-primary-dark">Tambah Perjalanan</h1>
    <?php if($errors->any()): ?>
        <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded shadow">
            <?php echo e($errors->first()); ?>

        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('perjalanan.store')); ?>" method="POST" class="space-y-5">
        <?php echo csrf_field(); ?>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Rencana</label>
            <select name="rencana_id" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" required>
                <option value="">Pilih Rencana</option>
                <?php $__currentLoopData = $rencana; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($r->id); ?>"><?php echo e($r->nama_rencana); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Peserta</label>
            <select name="peserta_id[]" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" multiple required>
                <?php $__currentLoopData = $peserta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($p->id); ?>"><?php echo e($p->nama); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span class="text-xs text-gray-500">(Tekan Ctrl / Cmd untuk memilih lebih dari satu)</span>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Kegiatan</label>
            <input type="text" name="kegiatan" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" required>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Catatan</label>
            <textarea name="catatan" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent"></textarea>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Status</label>
            <select name="status" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent">
                <option value="aktif">Aktif</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>
        <button type="submit" class="w-full bg-accent hover:bg-primary text-white font-bold py-2 rounded-lg shadow transition">Simpan</button>
    </form>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\prakweb\UAS\aplikasi_rencana_liburan\resources\views/perjalanan/create.blade.php ENDPATH**/ ?>