<option value="">Select your Gender</option>
<option value="Female"<?php echo e(Auth::user()->gender == 'Female' ? ' selected' : ''); ?>>Female</option>
<option value="Male"<?php echo e(Auth::user()->gender == 'Male' ? ' selected' : ''); ?>>Male</option>
<option value="Other"<?php echo e(Auth::user()->gender == 'Other' ? ' selected' : ''); ?>>Other</option>
<?php /**PATH E:\xampp\htdocs\msm\resources\views/home/user/profile/settings/partial/data/genders.blade.php ENDPATH**/ ?>