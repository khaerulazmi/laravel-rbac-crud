<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Edit Artikel</h2>

    <form action="<?php echo e(route('articles.update', $article->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="<?php echo e($article->title); ?>" required>
        </div>

        <div class="mb-3">
            <label>Konten</label>
            <textarea name="content" class="form-control" rows="5" required><?php echo e($article->content); ?></textarea>
        </div>

        <div class="mb-3">
            <label>File Saat Ini</label><br>
            <?php if($article->file_path): ?>
                <a href="<?php echo e(asset('storage/' . $article->file_path)); ?>" target="_blank">Lihat File</a>
            <?php else: ?>
                <p>Tidak ada file</p>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label>Ganti File</label>
            <input type="file" name="file" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?php echo e(route('articles.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-rbac-crud\resources\views/articles/edit.blade.php ENDPATH**/ ?>