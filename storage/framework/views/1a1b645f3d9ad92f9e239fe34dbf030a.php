<?php $__env->startSection('content'); ?>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Dashboard</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Card: Kelola Artikel -->
            <a href="<?php echo e(route('articles.index')); ?>" class="block bg-white hover:bg-purple-50 border border-gray-200 rounded-xl shadow-sm transition-all duration-300 hover:shadow-md">
                <div class="p-6 text-center">
                    <div class="flex justify-center mb-3">
                        <div class="bg-purple-100 text-purple-600 rounded-full p-4">
                            <i class="fa-solid fa-newspaper fa-xl"></i>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-700">Artikel</h3>
                    <p class="text-sm text-gray-500 mt-1">Lihat dan kelola semua artikel yang ada.</p>
                </div>
            </a>

           
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-rbac-crud\resources\views/dashboard.blade.php ENDPATH**/ ?>