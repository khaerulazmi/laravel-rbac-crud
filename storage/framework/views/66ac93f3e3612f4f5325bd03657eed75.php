<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Daftar Artikel</h2>

    
    <?php if(auth()->user()->level_id == 1): ?>
        <a href="<?php echo e(route('articles.create')); ?>" class="btn btn-primary mb-3">+ Tambah Artikel</a>
    <?php endif; ?>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Konten</th>
                <th>File</th>
               <?php if(auth()->user()->level_id == 1): ?>
                <th>Aksi</th>
            <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php echo e($article->title); ?></td>
                <td><?php echo e(Str::limit($article->content, 100)); ?></td>
                <td>

                    <?php if($article->file): ?>
                    <img src="<?php echo e(asset('storage/uploads/' . $article->file)); ?>" width="150" alt="Gambar Artikel">
                    <?php endif; ?> 
                </td>
                 <td>
                    
                    <?php if(auth()->user()->level_id == 1): ?>
                        <a href="<?php echo e(route('articles.edit', $article->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="<?php echo e(route('articles.destroy', $article->id)); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-rbac-crud\resources\views/articles/index.blade.php ENDPATH**/ ?>