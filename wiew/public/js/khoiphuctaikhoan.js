
     $(document).ready(function(){

        var email = '';
       
        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        $('#email').on('input' , function(){
            if($(this).val() == ''){
                $('.email-erro').show('fast');
                $('.email-erro').html('Không được để trống!');
                email = '';
            }
            else{
                if(validateEmail($(this).val()) == false){
                    $('.email-erro').show('fast');
                    $('.email-erro').html('Sai định dạng email!');
                    email = '';
                }else{
                    $('.email-erro').hide('fast');
                    $('.email-erro').html('');
                    email = $(this).val();
                }
            }
        })

        $('#submit').click(function(){
             if(email != ''){
                 $('section#load').css('display' , 'inline-block');
                 $.ajax({
                    url : 'user/khoiphuctaikhoan_ajax',
                    type : 'post',
                    data : {
                        email : email
                    }
                 }).done(function(res){
                    $('section#load').css('display' , 'none');              
                     console.log(res);
                     if(res == 'Email không trùng khớp!'){
                        $('.email-erro').show('fast');
                        $('.email-erro').html(res);
                     }else{
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Mật khẩu đã được gửi về email của bạn . vui lòng kiểm tra!',
                            showConfirmButton: false,
                            timer: 1000
                        })
                        setTimeout(() => window.location.href = '/' , 2000);
                     }
                 })
             }
        })

     })