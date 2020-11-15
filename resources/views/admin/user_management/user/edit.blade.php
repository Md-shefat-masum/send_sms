<input type="hidden"  name="id" value="{{ $user->id }}" id="">
<div class="form-group">
    <label for="input-1">Name</label>
    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
</div>
<div class="form-group">
    <label for="input-1">Last Name</label>
    <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
</div>
<div class="form-group">
    <label for="input-2">Email</label>
    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
</div>
<div class="form-group">
    <label for="input-2">Phone</label>
    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
</div>
