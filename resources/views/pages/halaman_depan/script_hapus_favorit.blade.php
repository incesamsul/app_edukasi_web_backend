<script>
    $('.btn-hapus-favorit').on('click',function(){
        let idInfo = $(this).data('id_info');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , url: '/hapus_favorit'
            , method: 'post'
            , dataType: 'json'
            , data: {
                id_info: idInfo,
            }
            , success: function(data) {
                console.log(data);
                if (data == 1) {
                    location.reload();
                }
            }
            , error: function(error){
                console.log(error);
            }
        })
    })
</script>
