<?php $__env->startSection('content'); ?>
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-8 mt-6">
    <div class="flex items-center gap-3 mb-6">
        <div class="bg-accent text-white rounded-full w-12 h-12 flex items-center justify-center text-2xl"><i class="fa-solid fa-list-check"></i></div>
        <div>
            <h1 class="text-2xl font-bold text-primary-dark">Detail Rencana Liburan</h1>
            <span class="px-3 py-1 rounded-full text-xs font-bold shadow <?php echo e($rencana->status == 'aktif' ? 'bg-accent text-white' : 'bg-info text-primary-dark'); ?>">
                <i class="fa fa-circle <?php echo e($rencana->status == 'aktif' ? 'text-green-300' : 'text-info'); ?> mr-1"></i> <?php echo e(ucfirst($rencana->status)); ?>

            </span>
        </div>
    </div>
    <div class="space-y-3 text-sm">
        <div class="flex items-center gap-2"><i class="fa fa-signature text-primary"></i> <span class="font-semibold text-primary-dark">Nama Rencana:</span> <span><?php echo e($rencana->nama_rencana); ?></span></div>
        <div class="flex items-center gap-2"><i class="fa fa-map-marker-alt text-primary"></i> <span class="font-semibold text-primary-dark">Destinasi:</span> <span><?php echo e($rencana->destinasi); ?></span></div>
        <div class="flex items-center gap-2"><i class="fa fa-calendar text-primary"></i> <span class="font-semibold text-primary-dark">Tanggal Berangkat:</span> <span><?php echo e($rencana->tgl_berangkat); ?></span></div>
        <div class="flex items-center gap-2"><i class="fa fa-calendar text-primary"></i> <span class="font-semibold text-primary-dark">Tanggal Pulang:</span> <span><?php echo e($rencana->tgl_pulang); ?></span></div>
        <div class="flex items-center gap-2"><i class="fa fa-money-bill-wave text-primary"></i> <span class="font-semibold text-primary-dark">Estimasi Biaya:</span> <span><?php echo e($rencana->estimasi_biaya); ?></span></div>
        <div class="flex items-center gap-2"><i class="fa fa-sticky-note text-primary"></i> <span class="font-semibold text-primary-dark">Catatan:</span> <span><?php echo e($rencana->catatan); ?></span></div>
    </div>
    <div class="flex gap-3 mt-8">
        <a href="<?php echo e(route('rencana.index')); ?>" class="inline-flex items-center gap-2 bg-background-light text-primary-dark px-4 py-2 rounded hover:bg-accent hover:text-white transition"><i class="fa fa-arrow-left"></i> Kembali</a>
        <a href="<?php echo e(route('rencana.edit', $rencana->id)); ?>" class="inline-flex items-center gap-2 bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark transition"><i class="fa fa-pen"></i> Edit</a>
        <form action="<?php echo e(route('rencana.destroy', $rencana->id)); ?>" method="POST" onsubmit="return confirm('Yakin hapus?')">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="inline-flex items-center gap-2 bg-red-100 text-red-600 px-4 py-2 rounded hover:bg-red-500 hover:text-white transition"><i class="fa fa-trash"></i> Hapus</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\prakweb\UAS\aplikasi_rencana_liburan\resources\views/rencana/show.blade.php ENDPATH**/ ?>