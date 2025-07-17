<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-2">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark flex items-center gap-2">
                <i class="fa-solid fa-users"></i> Daftar Peserta
            </h1>
            <p class="text-gray-500 mt-1 text-sm">Kelola data peserta yang akan ikut dalam rencana liburan Anda.</p>
        </div>
        <a href="<?php echo e(route('peserta.create')); ?>" class="bg-accent hover:bg-primary text-white px-5 py-2 rounded-lg shadow transition font-semibold flex items-center gap-2">
            <i class="fa fa-plus"></i> Tambah Peserta
        </a>
    </div>
    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-800 p-3 mb-4 rounded shadow flex items-center gap-2"><i class="fa fa-check-circle"></i> <?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <div class="bg-white rounded-xl shadow-lg overflow-x-auto">
        <?php if($peserta->count() > 0): ?>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="bg-primary-light text-white">
                    <th class="py-3 px-4 text-left">Nama</th>
                    <th class="py-3 px-4 text-left">Alamat</th>
                    <th class="py-3 px-4 text-left">No. Telp</th>
                    <th class="py-3 px-4 text-left">Email</th>
                    <th class="py-3 px-4 text-left">Identitas</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__currentLoopData = $peserta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-background-light transition <?php echo e($loop->even ? 'bg-gray-50' : ''); ?>">
                    <td class="py-2 px-4 font-semibold text-primary-dark"><?php echo e($item->nama); ?></td>
                    <td class="px-4"><?php echo e($item->alamat); ?></td>
                    <td class="px-4"><?php echo e($item->no_telp); ?></td>
                    <td class="px-4"><?php echo e($item->email); ?></td>
                    <td class="px-4"><span class="inline-block bg-info text-primary-dark px-2 py-1 rounded text-xs font-semibold"><?php echo e($item->identitas); ?></span></td>
                    <td class="px-4 flex gap-2">
                        <a href="<?php echo e(route('peserta.show', $item->id)); ?>" class="text-info hover:underline flex items-center gap-1"><i class="fa fa-eye"></i> Lihat</a>
                        <a href="<?php echo e(route('peserta.edit', $item->id)); ?>" class="text-primary hover:underline flex items-center gap-1"><i class="fa fa-pen"></i> Edit</a>
                        <form action="<?php echo e(route('peserta.destroy', $item->id)); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-red-600 hover:underline flex items-center gap-1" onclick="return confirm('Yakin hapus?')"><i class="fa fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php else: ?>
        <div class="flex flex-col items-center justify-center py-16 text-gray-400">
            <i class="fa fa-users text-6xl mb-4"></i>
            <p class="text-lg font-semibold">Belum ada peserta terdaftar.</p>
            <a href="<?php echo e(route('peserta.create')); ?>" class="mt-4 bg-accent hover:bg-primary text-white px-4 py-2 rounded-lg shadow flex items-center gap-2"><i class="fa fa-plus"></i> Tambah Peserta Pertama</a>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\prakweb\UAS\aplikasi_rencana_liburan\resources\views/peserta/index.blade.php ENDPATH**/ ?>