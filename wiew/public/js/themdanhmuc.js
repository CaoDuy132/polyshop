
    
     $(document).ready(function(){
            var validate_tendanhmuc = false;
            $('#tendanhmuc').on('input' , function(){
                if($(this).val() == ''){
                    $('#tendanhmuc-erro').show('fast');
                    $('#tendanhmuc-erro').html('Không được để trống trường này!');
                    validate_tendanhmuc = '';
                }else if(isNaN($(this).val()) == false){
                    $('#tendanhmuc-erro').show('fast');
                    $('#tendanhmuc-erro').html('Tên danh mục phải có kí tự là chữ!');
                    validate_tendanhmuc = '';
                }else{
                    $('#tendanhmuc-erro').hide('fast');
                    validate_tendanhmuc = $(this).val();
                }
            })

            $('#submit-them').click(function(){
                 $.ajax({
                    url : 'admin/them_danhmuc',
                    type : 'post',
                    data : {
                       tendanhmuc : $('#tendanhmuc').val()
                    }
                 }).done(function(res){
                    if(res != 'false'){
                        setTimeout( ()=> window.location.href = "admin/danhmuc" , 500)
                    }else{
                        alert('Danh mục đã tồn tại!');
                    }
                 })
            })
     })