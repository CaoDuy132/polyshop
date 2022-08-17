

    $(document).ready(function(){

        var validate_hoten = true;
        var validate_sdt = true;
        var validate_matkhau = true;
        var validate_email = true;

          
        $('#hoten').on('input' , function(){
            if($(this).val() == ''){
                $('#hoten-erro').show('fast');
                $('#hoten-erro').html('Không được để trống trường này!');
                validate_hoten = false;
            }else if(isNaN($(this).val()) == false){
                $('#hoten-erro').show('fast');
                $('#hoten-erro').html('Họ tên phải có kí tự là chữ!');
                validate_hoten = false;
            }else{
                $('#hoten-erro').hide('fast');
                validate_hoten = true;
            }
        })

        
        $('#sdt').on('input' , function(){
            var value = $(this).val()
            if(isNaN(value) == true){
                $('#sdt-erro').show('fast');
                $('#sdt-erro').html('Hãy nhập số!');
                validate_sdt = false;
            }else{
                if(value.length == 10){
                    var arr = value.split('');
                    if(arr[0] == 0){
                        $('#sdt-erro').hide('fast');
                        $('#sdt-erro').html('');
                        validate_sdt = true;
                    }else{
                        $('#sdt-erro').show('fast');
                        $('#sdt-erro').html('Số điện thoại bắt đầu bằng số 0!');
                        validate_sdt = false;
                    }
                }else{
                    $('#sdt-erro').show('fast');
                    $('#sdt-erro').html('Số điện thoại phải có 10 kí tự!');
                    validate_sdt = false;
                }
            }
            if(value == ''){
                $('#sdt-erro').show('fast');
                $('#sdt-erro').html('Không được để trống!');
                validate_sdt = false;
            }
       })
  
        $('#matkhau').on('input' , function(){
                if($(this).val() == ''){
                    $('#matkhau-erro').show('fast');
                    $('#matkhau-erro').html('Không được để trống trường này!');
                    validate_matkhau = false;
                }else{
                    $('#matkhau-erro').hide('fast');
                    validate_matkhau = true;
                }
        })

        function validateEmail(email) {
           var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
           return re.test(String(email).toLowerCase());
        }


        $('#email').on('input' , function(){
            if($(this).val() == ''){
                $('#email-erro').show('fast');
                $('#email-erro').html('Không được để trống!');
            validate_email = false;
            }
            else{
                if(validateEmail($(this).val()) == false){
                    $('#email-erro').show('fast');
                    $('#email-erro').html('Sai định dạng email!');
                    validate_email = false;
                }else{
                    $('#email-erro').hide('fast');
                    $('#email-erro').html('');
                    validate_email = true;
                }
            }
        })

        
       $('#anhdaidien').change(function(){
        var anhdaidien = $(this).prop('files')[0];
        if(anhdaidien.type != 'image/jpeg' && anhdaidien.type != 'image/png' && anhdaidien.type != 'image/gif'){
            $(this).parent().children().last().show('fast');
            $(this).parent().children().last().html('Chỉ được tải ảnh!');
            validate_anhdaidien = false;
        }else{
            validate_anhdaidien = true;
            $(this).parent().children().last().hide('fast');
            var newImg = document.createElement('img');
            var fileReader = new FileReader();
            fileReader.onload = function(e){
               src = e.target.result;
               newImg.src = src;
            }
            fileReader.readAsDataURL(anhdaidien)
            $(this).next().children().first().html(newImg);
        }
    })


    $('#luu-chinhsua').click(function(){
        if(validate_hoten != false && validate_sdt != false && validate_email != false && validate_matkhau != false){
            var id = $(this).data('id');
            var hoten = $('#hoten').val();
            var sdt = $('#sdt').val();
            var email = $('#email').val();
            var matkhau = $('#matkhau').val();
            var anhdaidien = $('#anhdaidien').prop('files')[0];
            var formData = new FormData();
            formData.append('id' , id);
            formData.append('hoten' , hoten);
            formData.append('sdt' , sdt);
            formData.append('email' , email);
            formData.append('matkhau' , matkhau);
            formData.append('anhdaidien' , anhdaidien);
            $.ajax({
                url: 'admin/chinhsua_thongtincanhan',
                type :'post',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data : formData
            }).done(function(res){
                console.log(res)
                $('section#load').fadeIn();
                setTimeout(()=> window.location.href = 'admin' , 500);
            })

        }else{
            alert('Hãy kiểm tra lại thông tin!');
        }

    })

       
         
})