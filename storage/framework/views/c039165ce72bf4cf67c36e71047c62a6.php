<?php $__env->startSection('content'); ?>
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-8">
    <h1 class="text-2xl font-bold mb-6 text-primary-dark">Detail Peserta</h1>
    <div class="space-y-2">
        <p><span class="font-semibold text-primary-dark">Nama:</span> <?php echo e($peserta->nama); ?></p>
        <p><span class="font-semibold text-primary-dark">Alamat:</span> <?php echo e($peserta->alamat); ?></p>
        <p><span class="font-semibold text-primary-dark">No. Telp:</span> <?php echo e($peserta->no_telp); ?></p>
        <p><span class="font-semibold text-primary-dark">Email:</span> <?php echo e($peserta->email); ?></p>
        <p><span class="font-semibold text-primary-dark">Identitas:</span> <?php echo e($peserta->identitas); ?></p>
    </div>
    <a href="<?php echo e(route('peserta.index')); ?>" class="mt-6 inline-block text-primary hover:underline">Kembali ke Daftar</a>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\prakweb\UAS\aplikasi_rencana_liburan\resources\views/peserta/show.blade.php ENDPATH**/ ?>