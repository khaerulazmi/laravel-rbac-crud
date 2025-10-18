

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Tambah Artikel</h2>

    <form action="<?php echo e(route('articles.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Konten</label>
        <textarea name="content" class="form-control" rows="5" required></textarea>
    </div>

    <div class="mb-3">
        <label>Upload File</label>
        <input type="file" name="file" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-rbac-crud\resources\views/articles/create.blade.php ENDPATH**/ ?>