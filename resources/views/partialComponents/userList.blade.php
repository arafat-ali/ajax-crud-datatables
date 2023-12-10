
<div class="table-responsive">
    <table id="user_table" class="display nowrap" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Role name</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

{{-- Edit User Modal --}}
<div id="editUserModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body edit_user">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="e_name" placeholder="Huraira vai">
                    <span id="nameError" class="error"><span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="e_email" placeholder="name@example.com" disabled>
                    <span id="emailError" class="error"><span>
                </div>
                <div class="form-group">
                    <label for="password">Passowrd</label>
                    <input type="password" class="form-control" id="e_password" placeholder="******">
                    <span id="passwordError" class="error"><span>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="e_confirmPassword" placeholder="******">
                    <span id="confirmPasswordError" class="error"><span>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="e_address" rows="3"></textarea>
                    <span id="addressError" class="error"><span>
                </div>
                <div class="form-group">
                    <label for="roleId">Role</label>
                    <select class="form-control" id="e_role_id" name="roleId">
                    </select>
                </div>
                <input type="hidden" id="user_id" class="form-control">
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-info" onclick="updateUser()" value="Save">
            </div>
        </div>
    </div>
</div>


{{-- Delete User Modal --}}
 <div id="deleteUserModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete User - <span id="deleted_user_name"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the user?</p>
                <p class="text-warning"><small>This action cannot be undone.</small></p>
            </div>
            <input type="hidden" id="deleted_user_id" name="delete_user_id">
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-danger" onclick="deleteUser()" value="Delete">
            </div>
        </div>
    </div>
</div>
