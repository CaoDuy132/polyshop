 

     $(document).ready(function(){
 
        var hoten = $('#hoten').val();
        var sdt = $('#sdt').val();
        var matkhau = $('#matkhau').val();

        sessionStorage['hoten'] = $('#hoten').val();
        sessionStorage['email'] = $('#email').val();
        sessionStorage['sdt'] = $('#sdt').val();
        sessionStorage['matkhau'] = $('#matkhau').val();


        $('#hinhanh').change(function(){
            hinhanh = $(this).prop('files')[0];
            if(hinhanh.type != 'image/jpeg' && hinhanh.type != 'image/png' && hinhanh.type != 'image/gif'){
                alert('Chỉ được tải ảnh');
            }else{
                var formData = new FormData();
                formData.append('hinhanh' , hinhanh);
                $.ajax({
                    url: 'user/chinhsua_anh',
                    type :'post',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data : formData
                }).done(function(res){
                    console.log(res)
                    $('.left-img-user').attr('src' , '/wiew/public/upload/' + res);
                })
            }
       })
      
         function load_event(){
            $('.edit').click(function(){
                $('.box-xacthuc').css('display','flex');
                $(this).attr('class' , 'exit')
                $('#box-submit').show();
                $('.input').removeAttr('disabled');
                $('.input').css({'background-color' : 'white'});
                $('#icon-action').attr('class' , 'fas fa-sign-out-alt');
                load_event();
           })
           
           $('.exit').click(function(){
               window.location.href = "user";
            //    $('.box-xacthuc').css('display','none');
            //    $(this).attr('class' , 'edit')
            //    $('#box-submit').hide();
            //    $('.input').attr('disabled' , 'true');
            //    $('.input').css({'background-color' : '#ecf1f5'});
            //    $('#icon-action').attr('class' , 'fas fa-user-edit');
            //    $('.erro').html('');
            //    //
            //    $('#hoten').val(sessionStorage['hoten']);
            //    $('#email').val(sessionStorage['email']);
            //    $('#sdt').val(sessionStorage['sdt']);
            //    $('#matkhau').val(sessionStorage['matkhau']);
           })
         }
         
         load_event();

          $('#hoten').on('input' , function(){
            if($(this).val() == ''){
               $('.hoten-erro').show('fast');
               $('.hoten-erro').html('Không được để trống!');
               hoten = '';
            }
            else{
               if(isNaN($(this).val()) != true){
                   $('.hoten-erro').show('fast');
                   $('.hoten-erro').html('Hãy nhập định dạng chữ!');
                   hoten = '';
               }else{
                   $('.hoten-erro').hide('fast');
                   $('.hoten-erro').html('');
                   hoten = $(this).val();
               }
            }
       })

       $('#matkhau').on('input' , function(){
        if($(this).val() == ''){
           $('.matkhau-erro').show('fast');
           $('.matkhau-erro').html('Không được để trống!');
           matkhau = '';
        }
        else{
            $('.matkhau-erro').hide('fast');
            $('.matkhau-erro').html('');
            matkhau = $(this).val(); 
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

        

        $('#luuchinhsua').click(function(){
            var matkhauxacthuc = $('#matkhauxacthuc').val();
            if(hoten != '' && sdt !='' && matkhau !=''){
                $.ajax({
                    url : 'user/chinhsua',
                    type :'post',
                    data : {
                        hoten : hoten,
                        sdt : sdt,
                        matkhau : matkhau,
                        matkhauxacthuc : matkhauxacthuc
                    }
                }).done(function(res){
                    console.log(res)
                    if(res != 'false'){
                        $('section#load').css('display' , 'inline-block');
                        setTimeout(() => window.location.href = location.href , 1000)
                    }else{
                        alert('Mật khẩu không hợp lệ!');
                    }
                })
            }
        })

     })