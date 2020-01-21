function getUsers() {
    const apiUrl = "http://localhost//PAI";
    const $list = $('.users-list');

    $.ajax({
        url : apiUrl + '/?page=users',
        dataType : 'json'
    })
    .done((res) => {
        $list.empty();
        
        res.forEach(el => {
            if(el.role_id == 2) {
                role = 'ROLE_ADMIN';
            }   else    {
                role = 'ROLE_USER';
            }
            $list.append(`<tr>
                        <td>${el.user_id}</td>
                        <td>${el.email}</td>
                        <td>${el.name}</td>
                        <td>${el.surname}</td>
                        <td>${el.username}</td>
                        <td>${role}</td>
                        <td>
                            <button id="btn-delete" class="btn-small" type="button"
                            onclick="deleteUser(${el.user_id})">
                            DELETE
                            </button>
                        </td>
                        </tr>`);
        });
    });
}

const deleteUser = (id) => {
    if (!confirm('Do you want to delete this user?')) {
       return;
    }
    console.log(id);
    const apiUrl = "http://localhost//PAI";
    $.ajax({
        url : apiUrl + '/?page=admin_delete_user',
        method : "POST",
        data : {
        id : id
        },
        success: function() {
        alert('Selected user successfully deleted from database!');
        getUsers();
        }
    });
}