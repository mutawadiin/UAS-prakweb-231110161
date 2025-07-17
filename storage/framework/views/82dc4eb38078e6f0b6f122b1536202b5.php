<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Daftar Rencana Liburan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-dark: #012A4A;
            --primary: #014F86;
            --primary-light: #2A6F97;
            --accent: #61A5C2;
            --info: #89C2D9;
            --background-light: #E0F7FA;
        }
        .bg-primary { background-color: var(--primary) !important; }
        .bg-primary-dark { background-color: var(--primary-dark) !important; }
        .bg-primary-light { background-color: var(--primary-light) !important; }
        .bg-accent { background-color: var(--accent) !important; }
        .text-primary { color: var(--primary) !important; }
        .text-info { color: var(--info) !important; }
        .bg-background-light { background-color: var(--background-light) !important; }
    </style>
</head>
<body class="bg-background-light min-h-screen font-sans flex flex-col">
    <div class="flex flex-1 min-h-0">
        <!-- Sidebar -->
        <aside class="hidden md:flex flex-col w-64 bg-white shadow-lg z-30">
            <div class="flex items-center gap-2 px-6 py-6 border-b">
                <span class="bg-primary text-white rounded-full px-3 py-1 font-bold text-lg">RL</span>
                <span class="text-primary-dark font-bold text-lg">Rencana Liburan</span>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="/dashboard" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-background-light transition <?php echo e(request()->is('dashboard') ? 'bg-accent text-white' : 'text-primary-dark'); ?>">
                    <i class="fa-solid fa-gauge-high"></i> Dashboard
                </a>
                <a href="/rencana" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-background-light transition <?php echo e(request()->is('rencana*') ? 'bg-accent text-white' : 'text-primary-dark'); ?>">
                    <i class="fa-solid fa-list-check"></i> Rencana
                </a>
                <a href="/peserta" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-background-light transition <?php echo e(request()->is('peserta*') ? 'bg-accent text-white' : 'text-primary-dark'); ?>">
                    <i class="fa-solid fa-users"></i> Peserta
                </a>
                <a href="/perjalanan" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-background-light transition <?php echo e(request()->is('perjalanan*') ? 'bg-accent text-white' : 'text-primary-dark'); ?>">
                    <i class="fa-solid fa-route"></i> Perjalanan
                </a>
            </nav>
            <div class="mt-auto px-6 py-4 border-t text-xs text-gray-500">
                &copy; <?php echo e(date('Y')); ?> Rencana Liburan. All rights reserved.
            </div>
        </aside>
        <!-- End Sidebar -->
        <div class="flex-1 flex flex-col min-h-0">
            <!-- Header -->
            <header class="bg-white shadow sticky top-0 z-20 flex items-center justify-between px-4 py-3 md:hidden">
                <div class="flex items-center gap-2">
                    <span class="bg-primary text-white rounded-full px-3 py-1 font-bold text-lg">RL</span>
                    <span class="text-primary-dark font-bold text-lg">Rencana Liburan</span>
                </div>
                <button id="mobile-menu-btn" class="text-primary-dark focus:outline-none">
                    <i class="fa fa-bars fa-lg"></i>
                </button>
            </header>
            <nav id="mobile-menu" class="fixed inset-0 bg-black bg-opacity-40 z-40 hidden md:hidden">
                <div class="absolute left-0 top-0 w-64 bg-white h-full shadow-lg flex flex-col">
                    <div class="flex items-center gap-2 px-6 py-6 border-b">
                        <span class="bg-primary text-white rounded-full px-3 py-1 font-bold text-lg">RL</span>
                        <span class="text-primary-dark font-bold text-lg">Rencana Liburan</span>
                    </div>
                    <a href="/dashboard" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-background-light transition <?php echo e(request()->is('dashboard') ? 'bg-accent text-white' : 'text-primary-dark'); ?>">
                        <i class="fa-solid fa-gauge-high"></i> Dashboard
                    </a>
                    <a href="/rencana" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-background-light transition <?php echo e(request()->is('rencana*') ? 'bg-accent text-white' : 'text-primary-dark'); ?>">
                        <i class="fa-solid fa-list-check"></i> Rencana
                    </a>
                    <a href="/peserta" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-background-light transition <?php echo e(request()->is('peserta*') ? 'bg-accent text-white' : 'text-primary-dark'); ?>">
                        <i class="fa-solid fa-users"></i> Peserta
                    </a>
                    <a href="/perjalanan" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-background-light transition <?php echo e(request()->is('perjalanan*') ? 'bg-accent text-white' : 'text-primary-dark'); ?>">
                        <i class="fa-solid fa-route"></i> Perjalanan
                    </a>
                    <button id="close-mobile-menu" class="absolute top-4 right-4 text-primary-dark"><i class="fa fa-times fa-lg"></i></button>
                </div>
            </nav>
            <!-- End Header -->
            <!-- Topbar -->
            <div class="bg-white shadow flex items-center justify-between px-6 py-4 sticky top-0 z-10 hidden md:flex">
                <div class="flex items-center gap-2">
                    <span class="bg-primary text-white rounded-full px-3 py-1 font-bold text-lg">RL</span>
                    <span class="text-primary-dark font-bold text-lg">Rencana Liburan</span>
                </div>
                <div class="flex items-center gap-4">
                    <div class="relative group">
                        <button class="w-10 h-10 rounded-full bg-primary-light text-white flex items-center justify-center font-bold focus:outline-none">
                            <i class="fa-solid fa-user"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg py-2 hidden group-hover:block">
                            <a href="#" class="block px-4 py-2 text-primary-dark hover:bg-background-light">Profile</a>
                            <a href="#" class="block px-4 py-2 text-primary-dark hover:bg-background-light">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Topbar -->
            <main class="flex-1 min-h-0 px-2 md:px-8 py-6">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
            <!-- Footer -->
            <footer class="bg-white border-t py-4 px-6 text-center text-xs text-gray-500">
                Dibuat dengan <i class="fa fa-heart text-red-500"></i> oleh Tim Rencana Liburan
            </footer>
            <!-- End Footer -->
        </div>
    </div>
    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const closeBtn = document.getElementById('close-mobile-menu');
            if(btn && menu && closeBtn) {
                btn.onclick = () => menu.classList.remove('hidden');
                closeBtn.onclick = () => menu.classList.add('hidden');
                menu.onclick = (e) => { if(e.target === menu) menu.classList.add('hidden'); };
            }
        });
    </script>
</body>
</html> <?php /**PATH C:\prakweb\UAS\aplikasi_rencana_liburan\resources\views/layouts/app.blade.php ENDPATH**/ ?>