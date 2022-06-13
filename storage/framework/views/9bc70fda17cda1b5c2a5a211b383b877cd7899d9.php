<option value="">Select your Status</option>
<option value="Single"<?php echo e(Auth::user()->marital_status == 'Single' ? ' selected' : ''); ?>>Single</option>
<option value="In a relationship"<?php echo e(Auth::user()->marital_status == 'In a relationship' ? ' selected' : ''); ?>>In a relationship</option>
<option value="Engaged"<?php echo e(Auth::user()->marital_status == 'Engaged' ? ' selected' : ''); ?>>Engaged</option>
<option value="Married"<?php echo e(Auth::user()->marital_status == 'Married' ? 'selected' : ''); ?>>Married</option>
<option value="In a civil union"<?php echo e(Auth::user()->marital_status == 'In a civil union' ? ' selected' : ''); ?>>In a civil union</option>
<option value="In a domestic partnership"<?php echo e(Auth::user()->marital_status == 'In a domestic partnership' ? ' selected' : ''); ?>>In a domestic partnership</option>
<option value="In a open partnership"<?php echo e(Auth::user()->marital_status == 'In a open partnership' ? ' selected' : ''); ?>>In a open partnership</option>
<option value="It's complicated"<?php echo e(Auth::user()->marital_status == 'It\'s complicated' ? ' selected' : ''); ?>>It's complicated</option>
<?php /**PATH E:\xampp\htdocs\msm\resources\views/home/user/profile/settings/partial/data/marital-status.blade.php ENDPATH**/ ?>