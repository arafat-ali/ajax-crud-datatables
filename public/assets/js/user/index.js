const baseurl = 'http://127.0.0.1:8000/'

function userList(){
    if ( $.fn.dataTable.isDataTable( '#user_table' ) ) {
        table = $('#user_table').DataTable();
        table.destroy();
    }

    $('#user_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: `${baseurl}users`,
        columns: [
            {data: 'id', name: 'ID'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'address', name: 'Address'},
            {data: 'role.name', name: 'Role Id'},
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    });
}

function clearError(keys){
    keys.forEach((key)=>{
        $(`#${key}Error`).text('')
        $(`#${key}`).removeClass('error-border')
    })
}

function setErrorMessage(el, message){
    $(`#${el}Error`).text(message)
    $(`#${el}`).addClass('error-border')
}

function create(){
    clearError(['name', 'email', 'password', 'confirmPassword', 'address']);
    data = {
        name: $('#name').val(),
        email:$('#email').val(),
        password: $('#password').val(),
        confirmPassword: $('#confirmPassword').val(),
        address: $('#address').val(),
        role_id: $('#role_id').val(),
        _token: $('#token').val()
    }
    axios.post(`${baseurl}user`,data)
    .then((response)=>{
        if(response.status == 200){
            Swal.fire({
                title: "Success",
                text: response.data.message,
                icon: "success"
            });
            //reload datatables data
            userList()
        }
    }).catch((error)=>{
        console.log(error.response.data);
        if(error?.response?.data){
            errors = error?.response?.data.errors;
            Object.keys(errors).forEach((key) => {
                setErrorMessage(key,errors[key][0])
            });
        }
    });
}



function showUser(id){
    axios.get(`${baseurl}user/${id}`)
    .then((response)=>{
        if(response.status == 200){
            data = response.data.data;
            //Assigning roles for edited User Role
            getRoles('e_role_id', data.role_id);

            //assigning value to the form
            $("#e_name").val(data.name)
            $("#e_email").val(data.email)
            $("#e_address").val(data.address)
            $("#user_id").val(data.id)
        }
    }).catch((error)=>{
        console.log(error.response.data);
    });
}


//Geting Roles from database and Binding it to Create employee form
//role_id is send to add selected or not
function getRoles(el, role_id=2){
    axios.get(`${baseurl}roles`)
    .then((response)=>{
        if(response.status == 200){
            let html = '';
            response.data.data.forEach(el => {
                html+= "<option value="+ el.id + " ";
                html+=role_id == el.id ? "selected": "";
                html+= ">";
                html+= el.name + "</option>";
            });
            $(`#${el}`).html(html);
        }
    }).catch((error)=>{
        console.log(error.response.data);
    });
}


function updateUser(){
    clearError(['e_name', 'e_email', 'e_password', 'e_confirmPassword', 'e_address']);
    data = {
        name: $('#e_name').val(),
        email:$('#e_email').val(),
        password: $('#e_password').val(),
        confirmPassword: $('#e_confirmPassword').val(),
        address: $('#e_address').val(),
        role_id: $('#e_role_id').val()
    }
    id = $('#user_id').val()

    axios.put(`${baseurl}user/${id}`,data)
    .then((response)=>{
        if(response.status == 200){

            Swal.fire({
                title: "Success",
                text: response.data.message,
                icon: "success"
            });
            //close modal
            closeModal('editUserModal');
            //reload datatables data
            userList()

        }
    }).catch((error)=>{
        console.log(error.response.data);
        if(error?.response?.data){
            errors = error?.response?.data.errors;
            Object.keys(errors).forEach((key) => {
                setErrorMessage(key,errors[key][0])
            });
        }
    });
}

function closeModal (el){
    $(`#${el}`).modal('toggle');
}


function deleteConfirm(id){
    axios.get(`${baseurl}user/${id}`)
    .then((response)=>{
        if(response.status == 200){
            data = response.data.data;
            //assigning value to the form
            $("#deleted_user_name").text(data.name)
            $("#deleted_user_id").val(data.id)
        }
    }).catch((error)=>{
        console.log(error.response.data);
    });
}


function deleteUser(){
    userId = $("#deleted_user_id").val();
    axios.delete(`${baseurl}user/${userId}`)
    .then((response)=>{
        if(response.status == 200){
            data = response.data.data;
            Swal.fire({
                title: "Success",
                text: response.data.message,
                icon: "success"
            });
            //close modal
            closeModal('deleteUserModal');
            //reload datatables data
            userList()
        }
    }).catch((error)=>{
        console.log(error.response.data);
    });

}


