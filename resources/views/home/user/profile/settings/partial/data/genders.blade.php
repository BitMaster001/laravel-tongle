<option value="">Select your Gender</option>
<option value="Female"{{Auth::user()->gender == 'Female' ? ' selected' : ''}}>Female</option>
<option value="Male"{{Auth::user()->gender == 'Male' ? ' selected' : ''}}>Male</option>
<option value="Other"{{Auth::user()->gender == 'Other' ? ' selected' : ''}}>Other</option>
