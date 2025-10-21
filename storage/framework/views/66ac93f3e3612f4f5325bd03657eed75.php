<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">📚 Daftar Artikel</h2>

        <?php if(auth()->user()->level_id == 1): ?>
            <a href="<?php echo e(route('articles.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Tambah Artikel
            </a>
        <?php endif; ?>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Konten</th>
                        <th>File</th>
                        <?php if(auth()->user()->level_id == 1): ?>
                            <th class="text-center">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td class="fw-semibold"><?php echo e($article->title); ?></td>
                            <td><?php echo e(Str::limit($article->content, 100)); ?></td>
                            <td>
                                <?php if($article->file): ?>
                                    <img src="<?php echo e(asset('storage/uploads/' . $article->file)); ?>" 
                                         class="img-thumbnail" width="120" alt="Gambar Artikel">
                                <?php else: ?>
                                    <span class="text-muted fst-italic">Tidak ada gambar</span>
                                <?php endif; ?>
                            </td>
                            <?php if(auth()->user()->level_id == 1): ?>
                                <td class="text-center">
                                    <a href="<?php echo e(route('articles.edit', $article->id)); ?>" 
                                       class="btn btn-sm btn-warning me-1">
                                       <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="<?php echo e(route('articles.destroy', $article->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" 
                                                onclick="return confirm('Yakin ingin menghapus artikel ini?')" 
                                                class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Belum ada artikel yang tersedia.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-rbac-crud\resources\views/articles/index.blade.php ENDPATH**/ ?>