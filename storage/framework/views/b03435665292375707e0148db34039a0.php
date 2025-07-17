<?php $__env->startSection('content'); ?>
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-8">
    <h1 class="text-2xl font-bold mb-6 text-primary-dark">Edit Peserta</h1>
    <?php if($errors->any()): ?>
        <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded shadow">
            <?php echo e($errors->first()); ?>

        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('peserta.update', $peserta->id)); ?>" method="POST" class="space-y-5">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Nama</label>
            <input type="text" name="nama" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" value="<?php echo e($peserta->nama); ?>" required>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Alamat</label>
            <input type="text" name="alamat" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" value="<?php echo e($peserta->alamat); ?>" required>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">No. Telp</label>
            <input type="text" name="no_telp" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" value="<?php echo e($peserta->no_telp); ?>" required>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Email</label>
            <input type="email" name="email" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" value="<?php echo e($peserta->email); ?>">
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Identitas (KTP/SIM)</label>
            <input type="text" name="identitas" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" value="<?php echo e($peserta->identitas); ?>" required>
        </div>
        <button type="submit" class="w-full bg-accent hover:bg-primary text-white font-bold py-2 rounded-lg shadow transition">Update</button>
    </form>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\prakweb\UAS\aplikasi_rencana_liburan\resources\views/peserta/edit.blade.php ENDPATH**/ ?>