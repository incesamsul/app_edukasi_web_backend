<script>
    $('#btn-register').on('click',function(e){
        e.preventDefault();
        let name = errorMessageDisplay('name');
        let email = errorMessageDisplay('new_email');
        let password = errorMessageDisplay('new_password');
        if(name == 1 && email == 1 && password == 1){
            $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , url: '/registeruser'
            , method: 'post'
            , dataType: 'json'
            , data: {
                name: $('#name').val(),
                email: $('#new_email').val(),
                password: $('#new_password').val(),
            }
            , success: function(data) {
                console.log(data);
                if (data == 3) {
                    $('#loginRegisterMessage').html('<div class="alert alert-danger">email sudah ada</div>');
                } else {
                    $('#loginRegisterMessage').html('<div class="alert alert-success">Berhasil registrasi</div>');
                }
            }
            , error: function(error){
                console.log(error);
            }
        })
        }
    })
</script>
