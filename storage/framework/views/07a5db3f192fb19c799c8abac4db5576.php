<?php $__env->startSection('content'); ?>
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-8 mt-6">
    <div class="flex items-center gap-3 mb-6">
        <div class="bg-accent text-white rounded-full w-12 h-12 flex items-center justify-center text-2xl"><i class="fa-solid fa-route"></i></div>
        <div>
            <h1 class="text-2xl font-bold text-primary-dark">Detail Perjalanan</h1>
            <span class="px-3 py-1 rounded-full text-xs font-bold shadow <?php echo e($perjalanan->status == 'aktif' ? 'bg-accent text-white' : 'bg-info text-primary-dark'); ?>">
                <i class="fa fa-circle <?php echo e($perjalanan->status == 'aktif' ? 'text-green-300' : 'text-info'); ?> mr-1"></i> <?php echo e(ucfirst($perjalanan->status)); ?>

            </span>
        </div>
    </div>
    <div class="space-y-3 text-sm">
        <div class="flex items-center gap-2"><i class="fa fa-list-check text-primary"></i> <span class="font-semibold text-primary-dark">Rencana:</span> <span><?php echo e($perjalanan->rencana->nama_rencana ?? '-'); ?></span></div>
        <div class="flex items-center gap-2"><i class="fa fa-user text-primary"></i> <span class="font-semibold text-primary-dark">Peserta:</span>
            <div class="flex flex-col gap-1">
                <?php $__currentLoopData = $perjalanan->peserta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="inline-block bg-info text-primary-dark px-2 py-1 rounded text-xs font-semibold"><?php echo e($p->nama); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="flex items-center gap-2"><i class="fa fa-clipboard-list text-primary"></i> <span class="font-semibold text-primary-dark">Kegiatan:</span> <span><?php echo e($perjalanan->kegiatan); ?></span></div>
        <div class="flex items-center gap-2"><i class="fa fa-sticky-note text-primary"></i> <span class="font-semibold text-primary-dark">Catatan:</span> <span><?php echo e($perjalanan->catatan); ?></span></div>
    </div>
    <div class="flex gap-3 mt-8">
        <a href="<?php echo e(route('perjalanan.index')); ?>" class="inline-flex items-center gap-2 bg-background-light text-primary-dark px-4 py-2 rounded hover:bg-accent hover:text-white transition"><i class="fa fa-arrow-left"></i> Kembali</a>
        <a href="<?php echo e(route('perjalanan.edit', $perjalanan->id)); ?>" class="inline-flex items-center gap-2 bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark transition"><i class="fa fa-pen"></i> Edit</a>
        <form action="<?php echo e(route('perjalanan.destroy', $perjalanan->id)); ?>" method="POST" onsubmit="return confirm('Yakin hapus?')">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="inline-flex items-center gap-2 bg-red-100 text-red-600 px-4 py-2 rounded hover:bg-red-500 hover:text-white transition"><i class="fa fa-trash"></i> Hapus</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\prakweb\UAS\aplikasi_rencana_liburan\resources\views/perjalanan/show.blade.php ENDPATH**/ ?>