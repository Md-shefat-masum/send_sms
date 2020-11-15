
<div class="form-group">
    <label for="input-1">Name</label> <span class="text-danger">*</span>
    <input type="text" name="name" class="form-control" placeholder="First Name" value="{{ old('name') }}">
</div>
<div class="form-group">
    <label for="input-1">Last Name</label> <span class="text-danger">*</span>
    <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}">
</div>
<div class="form-group">
    <label for="input-2">Email</label> <span class="text-danger">*</span>
    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
</div>
<div class="form-group">
    <label for="input-2">Phone</label> <span class="text-danger">*</span>
    <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}">
</div>
<div class="form-group">
    <label for="input-2">Photo</label> <span class="text-danger">*</span>
    <input type="file" style="height: 43px;" name="photo" class="form-control" placeholder="Photo" value="{{ old('photo') }}">
</div>
<div class="form-group">
    <label for="input-2">Password</label> <span class="text-danger">*</span>
    <input type="password" name="password" class="form-control" placeholder="Password">
</div>
<div class="form-group">
    <label for="input-2">Confirm Password</label> <span class="text-danger">*</span>
    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
</div>
