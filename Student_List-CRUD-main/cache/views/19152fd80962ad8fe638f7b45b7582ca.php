<?php $__env->startSection('title', 'Edit Student'); ?>

<?php $__env->startSection('content'); ?>
    <h2 style="color: #667eea; margin-bottom: 20px;">✏️ Edit Student</h2>

    <?php if($student): ?>
        <form method="POST" action="?page=update&id=<?php echo e($student['id']); ?>" style="max-width: 600px;">
            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Student Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="<?php echo e($student['name']); ?>"
                    required 
                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;"
                    placeholder="Enter student name"
                >
            </div>

            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="<?php echo e($student['email']); ?>"
                    required 
                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;"
                    placeholder="Enter email address"
                >
            </div>

            <div style="margin-bottom: 20px;">
                <label for="course" style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Course</label>
                <input 
                    type="text" 
                    id="course" 
                    name="course" 
                    value="<?php echo e($student['course']); ?>"
                    required 
                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;"
                    placeholder="Enter course name"
                >
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn btn-success" style="flex: 1;">💾 Update Student</button>
                <a href="?page=index" class="btn btn-secondary" style="flex: 1; text-align: center;">❌ Cancel</a>
            </div>
        </form>
    <?php else: ?>
        <div class="alert alert-error">
            <strong>Error:</strong> Student not found.
        </div>
        <a href="?page=index" class="btn btn-secondary">← Back to List</a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/workshop8/app/views/students/edit.blade.php ENDPATH**/ ?>