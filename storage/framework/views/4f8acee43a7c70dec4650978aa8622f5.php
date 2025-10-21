<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang | Laravel RBAC CRUD</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 min-h-screen flex flex-col justify-center items-center text-white">

    <div class="text-center px-6">
        <!-- Logo / Judul -->
        <h1 class="text-5xl font-extrabold mb-4 tracking-tight">Selamat Datang 👋</h1>
        <p class="text-lg mb-8 max-w-md mx-auto opacity-90">
            Aplikasi Laravel dengan fitur Login, Register, RBAC, dan CRUD sederhana.<br>
            Didesain dengan TailwindCSS agar tampilan bersih dan profesional.
        </p>

        <!-- Tombol -->
        <div class="flex justify-center gap-4">
            <a href="<?php echo e(route('login')); ?>" class="bg-white text-indigo-600 font-semibold px-6 py-3 rounded-xl shadow-lg hover:bg-gray-100 transition duration-200">
                Login
            </a>
            <a href="<?php echo e(route('register')); ?>" class="border border-white font-semibold px-6 py-3 rounded-xl hover:bg-white hover:text-indigo-600 transition duration-200">
                Register
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="absolute bottom-4 text-sm opacity-70">
        &copy; <?php echo e(date('Y')); ?> Laravel RBAC CRUD by <span class="font-semibold">Khaerul Azmi</span>
    </footer>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel-rbac-crud\resources\views/welcome.blade.php ENDPATH**/ ?>