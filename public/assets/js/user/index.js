const baseurl = 'http://127.0.0.1:8000/'

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



function list(){
    axios.get(`${baseurl}users`)
    .then((response)=>{
        if(response.status == 200){
            $data = response.data.data;
            let tbody = "";
            $data.forEach((row)=>{
                tbody += "<tr>";
                tbody+= "<td class>" + row.id + "</td>";
                tbody+= "<td >" + row.name + "</td>";
                tbody+= "<td >" + row.email + "</td>";
                tbody+= "<td >" + row.address + "</td>";
                tbody+= "<td >" + row.role.name + "</td>";
                tbody+= "</tr>"
            })
            $("#user_data").html(tbody);
        }
    }).catch((error)=>{
        console.log(error.response.data);
    });
}


//Geting Roles from database and Binding it to Create employee form
function getRoles(){
    axios.get(`${baseurl}roles`)
    .then((response)=>{
        if(response.status == 200){
            let html = '';
            response.data.data.forEach(el => {
                html+= "<option value="+ el.id +">" + el.name + "</option>"
            });
            $("#role_id").html(html);
        }
    }).catch((error)=>{
        console.log(error.response.data);
    });
}
