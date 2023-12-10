<form>
    @csrf
    <input type="hidden" id="token" value="{{csrf_token()}}">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Huraira vai">
      <span id="nameError" class="error"><span>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="name@example.com">
        <span id="emailError" class="error"><span>
    </div>
    <div class="form-group">
        <label for="password">Passowrd</label>
        <input type="password" class="form-control" id="password" placeholder="******">
        <span id="passwordError" class="error"><span>
    </div>
    <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" class="form-control" id="confirmPassword" placeholder="******">
        <span id="confirmPasswordError" class="error"><span>
    </div>

    <div class="form-group">
      <label for="address">Address</label>
      <textarea class="form-control" id="address" rows="3"></textarea>
      <span id="addressError" class="error"><span>
    </div>
    <div class="form-group">
        <label for="roleId">Role</label>
        <select class="form-control" id="role_id" name="roleId">
          <option value="1">Super Admin</option>
          <option value="2">Admin</option>
          <option value="3">Employee</option>
        </select>
        <span id="roli_idError" class="error"><span>
      </div>
    <button type="button" class="btn btn-outline-primary" onclick="create()">Create User</button>
</form>
