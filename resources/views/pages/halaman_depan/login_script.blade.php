<script>
    $('#btn-login').on('click',function(e){
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , url: '/postloginuser'
            , method: 'post'
            , dataType: 'json'
            , data: {
                email: $('#email').val(),
                password: $('#password').val(),
            }
            , success: function(data) {
                console.log(data);
                if (data == 3) {
                    $('#loginMessage').html('<div class="alert alert-danger">email salah</div>');
                } else if(data == 2) {
                    $('#loginMessage').html('<div class="alert alert-danger">password salah</div>');
                } else {
                    location.reload();
                }
            }
            , error: function(error){
                console.log(error);
            }
        })
    })
</script>
