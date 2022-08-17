 

      $(document).ready(function(){

        var ho = '';
        var ten = '';
        var email = '';
        var sdt = '';
        var matkhau = '';
        var hinhanh = '';
        var guimaxacnhan = false;
        var vld_hinhanh = true;
        var thoigiannhapma = 60;
          
        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }


        // vld họ
        $('#ho').on('input' , function(){
             if($(this).val() == ''){
                $('.ho-erro').show('fast');
                $('.ho-erro').html('Không được để trống!');
                ho = '';
             }
             else{
                if(isNaN($(this).val()) != true){
                    $('.ho-erro').show('fast');
                    $('.ho-erro').html('Hãy nhập định dạng chữ!');
                    ho = '';
                }else{
                    $('.ho-erro').hide('fast');
                    $('.ho-erro').html('');
                    ho = $(this).val();
                }
             }
        })
         
        // vld ten
        $('#ten').on('input' , function(){
            if($(this).val() == ''){
               $('.ten-erro').show('fast');
               $('.ten-erro').html('Không được để trống!');
               ten = '';
            }
            else{
               if(isNaN($(this).val()) != true){
                   $('.ten-erro').show('fast');
                   $('.ten-erro').html('Hãy nhập định dạng chữ!');
                   ten = '';
               }else{
                   $('.ten-erro').hide('fast');
                   $('.ten-erro').html('');
                   ten = $(this).val();
               }
            }
       })

       //vld email
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

       $('#sdt').on('input' , function(){
            var value = $(this).val()
            if(isNaN(value) == true){
                $('.sdt-erro').show('fast');
                $('.sdt-erro').html('Hãy nhập số!');
                sdt = '';
            }else{
            if(value.length == 10){
                var arr = value.split('');
                if(arr[0] == 0){
                    sdt = value;    
                    $('.sdt-erro').hide('fast');
                    $('.sdt-erro').html('');
                }else{
                        $('.sdt-erro').show('fast');
                        $('.sdt-erro').html('Số điện thoại bắt đầu bằng số 0!');
                    sdt = '';
                }
            }else{
                $('.sdt-erro').show('fast');
                $('.sdt-erro').html('Số điện thoại phải có 10 kí tự!');
                sdt = '';
            }
            }
            if(value == ''){
            $('.sdt-erro').show('fast');
            $('.sdt-erro').html('Không được để trống!');
            sdt = '';
            }
      })

      

       $('#matkhau').on('input' , function(){
            if($(this).val() == ''){
                $('.matkhau-erro').show('fast');
                $('.matkhau-erro').html('Không được để trống!');
                matkhau = '';
                formData.delete('matkhau');
            }else{
                $('.matkhau-erro').hide('fast');
                $('.matkhau-erro').html('');
                matkhau = $(this).val();
            }         
       })


       $('#hinhanh').change(function(){
            hinhanh = $(this).prop('files')[0];
            $('#text-anhdaidien').html(hinhanh.name);      
            if(hinhanh.type != 'image/jpeg' && hinhanh.type != 'image/png' && hinhanh.type != 'image/gif'){
                $('.hinhanh-erro').show('fast');
                $('.hinhanh-erro').html('Chỉ được tải ảnh!');
                vld_hinhanh = false;
                hinhanh = '';
            }else{
                $('.hinhanh-erro').hide('fast');
                $('.hinhanh-erro').html('');
                vld_hinhanh = true;  
                hinhanh = $(this).prop('files')[0];  
            }
       })


        $('#submit').click(function(){
             
             if(ho != '' && ten != '' && email != '' && matkhau != '' && sdt != '' && vld_hinhanh == true){
                if(guimaxacnhan == false){
                    $('section#load').css('display' , 'inline-block');
                    $.ajax({
                        url : 'user/tao_maxacnhan',
                        type : 'post',
                        data : {
                            email : email
                        }
                    }).done(function(res){
                        console.log(res)
                        $('section#load').css('display' , 'none');
                        if(res == 'Email đã tồn tại!'){
                            $('.email-erro').show('fast');
                            $('.email-erro').html(res);
                            guimaxacnhan = false;
                        }else{
                            $('.box-maxacnhan').show('fast');
                            setInterval(() => {               
                                if(thoigiannhapma > 0){
                                    thoigiannhapma -=1;
                                    $('#thoigiantontai').html('('+ thoigiannhapma + ')');
                                }
                                if(thoigiannhapma == 0){
                                    alert('Hết thời hạn xác thực!');
                                    window.location.href = location.href;
                                }
                            }, 1000);
                        }         
                    })       
                }
                else{
                    var maxacnhan = $('#maxacnhan').val();
                    var formData = new FormData();
                    formData.append('maxacnhan' , maxacnhan);
                    formData.append('ho' , ho);
                    formData.append('ten' , ten);
                    formData.append('email' , email);
                    formData.append('sdt' , sdt);
                    formData.append('matkhau' , matkhau);
                    formData.append('hinhanh' , hinhanh);
                    $.ajax({
                        url: 'user/submit_dangky_ajax',
                        type :'post',
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data : formData
                    }).done(function(res){
                        console.log(res)
                        if(res == 'Đăng ký thành công'){
                           $('section#load').css('display' , 'inline-block');
                           setTimeout( () => window.location.href = '/' , 500)
                        }
                        else if(res == 'Mã xác nhận không trùng khớp!'){
                           alert(res);
                        }
                    })
                }     
                guimaxacnhan = true;
             }
        })
      })   
      
      

    //   $.ajax({
    //     url: 'user/CapNhatAnhDaiDien',
    //     type :'post',
    //     dataType: 'text',
    //     cache: false,
    //     contentType: false,
    //     processData: false,
    //     data : formData
    // }).done(function(data){
    //     $('.img-updated').attr('src' , '/wiew/public/upload/' + data);
    // })