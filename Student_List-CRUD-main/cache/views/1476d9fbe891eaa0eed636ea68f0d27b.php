<?php $__env->startSection('title', 'Add New Student'); ?>

<?php $__env->startSection('content'); ?>
    <h2 style="color: #667eea; margin-bottom: 20px;">➕ Add New Student</h2>

    <form method="POST" action="?page=store" style="max-width: 600px;">
        <div style="margin-bottom: 20px;">
            <label for="name" style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Student Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
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
                required 
                style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;"
                placeholder="Enter course name"
            >
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-success" style="flex: 1;">💾 Save Student</button>
            <a href="?page=index" class="btn btn-secondary" style="flex: 1; text-align: center;">❌ Cancel</a>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/workshop8/app/views/students/create.blade.php ENDPATH**/ ?>