<?php $__env->startSection('title', 'Student List'); ?>

<?php $__env->startSection('content'); ?>
    <div class="btn-group">
        <a href="?page=create" class="btn btn-success">➕ Add New Student</a>
    </div>

    <?php if(count($students) > 0): ?>
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f8f9fa; border-bottom: 2px solid #667eea;">
                    <th style="padding: 15px; text-align: left; font-weight: bold; color: #667eea;">ID</th>
                    <th style="padding: 15px; text-align: left; font-weight: bold; color: #667eea;">Name</th>
                    <th style="padding: 15px; text-align: left; font-weight: bold; color: #667eea;">Email</th>
                    <th style="padding: 15px; text-align: left; font-weight: bold; color: #667eea;">Course</th>
                    <th style="padding: 15px; text-align: center; font-weight: bold; color: #667eea;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 15px;"><?php echo e($student['id']); ?></td>
                        <td style="padding: 15px;"><?php echo e($student['name']); ?></td>
                        <td style="padding: 15px;"><?php echo e($student['email']); ?></td>
                        <td style="padding: 15px;"><?php echo e($student['course']); ?></td>
                        <td style="padding: 15px; text-align: center;">
                            <a href="?page=edit&id=<?php echo e($student['id']); ?>" class="btn" style="padding: 8px 15px; font-size: 0.9em;">✏️ Edit</a>
                            <a href="?page=delete&id=<?php echo e($student['id']); ?>" class="btn btn-danger" style="padding: 8px 15px; font-size: 0.9em;" onclick="return confirm('Are you sure?');">🗑️ Delete</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">
            <strong>No students found.</strong> <a href="?page=create" style="color: inherit; text-decoration: underline;">Click here to add one</a>.
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/workshop8/app/views/students/index.blade.php ENDPATH**/ ?>