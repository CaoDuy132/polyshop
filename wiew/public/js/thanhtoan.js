

   $(document).ready(function(){

        var idtp = 0;
        var idqh = 0;
        var tinhthanhpho = '';
        var quanhuyen = '';
        var phuongxa = '';
        var tongtien = 0;
        var hoten = '';
        var email = '';
        var sdt = '';
        var ghichu = '';
        var phivanchuyen = 0;
        var hinhthucthanhtoan = 'tienmat';
        var check_login = sessionStorage['check_login'];
        
       $('.radio').click(function(){
            $('#chuyenkhoan').slideToggle('fast');
            $('#text-tienmat').slideToggle('fast');    
            hinhthucthanhtoan = $(this).val();
            if(hinhthucthanhtoan == 'tienmat'){
                $('#form-thanhtoan').attr('onsubmit' , 'return false');
            }
            console.log(hinhthucthanhtoan)
       })
        function load_event(){

            $('.value-thanhpho').click(function(){
                idtp = $(this).attr('id');
                var value = $(this).html();
                tinhthanhpho = value;
                $('#thanhpho').html(value);
                $('.box-timkiem-tinhthanhpho > .content').css('display', 'none');
                $('#timkiem-tinhthanhpho').val('');
                $('#timkiem-quanhuyen').val('');
                $('#timkiem-phuongxa').val('');
                $('#quanhuyen').html('Vui lòng chọn quận/huyện');
                $('#phuongxa').html('Vui lòng chọn phường/xã');
                $('#vld-tinhthanhpho').html('');
                quanhuyen = '';
                phuongxa = '';
                idqh = 0;
                console.log(tinhthanhpho , quanhuyen , phuongxa)
            })

            $('.value-quanhuyen').click(function(){
                idqh = $(this).attr('id');
                var value = $(this).html();
                quanhuyen = value;
                $('#quanhuyen').html(value);
                $('.box-timkiem-quanhuyen > .content').css('display', 'none');
                $('#timkiem-quanhuyen').val('');
                $('#timkiem-phuongxa').val('');
                $('#phuongxa').html('Vui lòng chọn phường/xã');
                $('#vld-quanhuyen').html('');
                phuongxa = '';
                console.log(tinhthanhpho , quanhuyen , phuongxa)
            })


            $('.value-phuongxa').click(function(){
                idqh = $(this).attr('id');
                var value = $(this).html();
                phuongxa = value;
                var tamtinh = $('#TamTinhDonHang').data('price');
                console.log(tamtinh)
                $('#phuongxa').html(value);
                $('.box-timkiem-phuongxa > .content').css('display', 'none');
                $('#timkiem-phuongxa').val('');
                $('#vld-phuongxa').html('');
                if(tinhthanhpho != '' && quanhuyen != '' && phuongxa !=''){
                    $.ajax({
                        url : 'thanhtoan/show_phivanchuyen_api',
                        type : 'post',
                        data : {
                            tinhthanhpho : tinhthanhpho,
                            quanhuyen : quanhuyen ,
                            phuongxa : phuongxa,
                            tamtinh : tamtinh
                        }
                    }).done(function(res){
                        phivanchuyen = res;
                        $('#phivanchuyen').html(new Intl.NumberFormat().format(phivanchuyen) + ' VND')
                        var tamtinh = parseFloat($('#TamTinhDonHang').data('price'));
                        tongtien = tamtinh + parseInt(phivanchuyen);
                        $('#price-vnpay').val(tongtien);
                        $('#TongThanhTienDonHang').html(new Intl.NumberFormat().format(tongtien) + ' VND');
                    })
                }                
            })
        }

        load_event()

        $('#timkiem-tinhthanhpho').on('input', function(){
            var value = $(this).val();
            $.ajax({
                url : 'thanhtoan/show_tinhthanhpho_ajax',
                type : 'post',
                data : {
                    value : value
                }
            }).done(function(res){
                $('#list-thanhpho').html(res)
                load_event()
            })
        })

        $('#timkiem-quanhuyen').on('input', function(){
            var value = $(this).val();
            $.ajax({
                url : 'thanhtoan/show_quanhuyen_ajax',
                type : 'post',
                data : {
                    value : value,
                    idtp : idtp
                }
            }).done(function(res){
                $('#list-quanhuyen').html(res)
                load_event()
            })
        })


        $('#timkiem-phuongxa').on('input', function(){
            var value = $(this).val();
            $.ajax({
                url : 'thanhtoan/show_phuongxa_ajax',
                type : 'post',
                data : {
                    value : value,
                    idqh : idqh
                }
            }).done(function(res){
                $('#list-phuongxa').html(res)
                load_event()
            })
        })


        $('.show-tinhthanhpho').click(function(){
            $('.box-timkiem-tinhthanhpho > .content').toggle();
            $('.box-timkiem-quanhuyen > .content').hide();
            $('.box-timkiem-phuongxa > .content').hide();
            $('#timkiem-tinhthanhpho').val('');
            $.ajax({
                url : 'thanhtoan/show_tinhthanhpho_ajax',
                type : 'post',
                data : {
                    value : ''
                }
            }).done(function(res){
                $('#list-thanhpho').html(res)
                load_event()
            })
        })


        $('.show-quanhuyen').click(function(){
            $('.box-timkiem-tinhthanhpho > .content').hide();
            $('.box-timkiem-quanhuyen > .content').toggle();
            $('.box-timkiem-phuongxa > .content').hide();
            $('#timkiem-quanhuyen').val('');
            $.ajax({
                url : 'thanhtoan/show_quanhuyen_ajax',
                type : 'post',
                data : {
                    value : '',
                    idtp : idtp
                }
            }).done(function(res){
                $('#list-quanhuyen').html(res)
                load_event()
            })
        })


        $('.show-phuongxa').click(function(){
            $('.box-timkiem-phuongxa > .content').toggle();
            $('.box-timkiem-tinhthanhpho > .content').hide();
            $('.box-timkiem-quanhuyen > .content').hide();
            $('#timkiem-phuongxa').val('');
            $.ajax({
                url : 'thanhtoan/show_phuongxa_ajax',
                type : 'post',
                data : {
                    value : '',
                    idqh : idqh
                }
            }).done(function(res){
                $('#list-phuongxa').html(res)
                load_event()
            })
        })

        
        // validate
        $('#hoten').on('input' , function(){
             if(isNaN($(this).val()) == true){
                 hoten = $(this).val();
                 $('#vld-hoten').html('');
             }else{
                 hoten = '';
                 $('#vld-hoten').html('Họ tên phải là chữ!');
             }
             if($(this).val() == ''){
                hoten = '';
                $('#vld-hoten').html('Không được để trống!');
             }
        })

        $('#sdt').on('input' , function(){
             var value = $(this).val()
             if(isNaN(value) == true){
                $('#vld-sdt').html('Số điện thoại phải là số!')
                sdt = '';
             }else{
                if(value.length == 10){
                    var arr = value.split('');
                    if(arr[0] == 0){
                       sdt = value;    
                       $('#vld-sdt').html('');
                    }else{
                       $('#vld-sdt').html('Số điện thoại phải bắt đầu bằng số 0!')
                       sdt = '';
                    }
                }else{
                   $('#vld-sdt').html('Số điện thoại phải có 10 kí tự!')
                   sdt = '';
                }
             }
             if(value == ''){
                sdt = '';
                $('#vld-sdt').html('Không được để trống!')
             }
        })

        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        $('#email').on('input' , function(){
            if(validateEmail($(this).val()) == false){
                $('#vld-email').html('Sai định dạng email!');
                email = '';
            }else{
                email = $(this).val();
                $('#vld-email').html('');
            }

            if($(this).val() == ''){
                email = '';
                $('#vld-email').html('Không được để trống!');
            }
        })


            // var check_login  = '';

        $('#submit-thanhtoan').on('click' , function(){
                 if(tongtien != 0){
                    if(check_login == 'true'){
                        var ghichu = $('#ghichu').val();
                        var validate = true;
                        if(tinhthanhpho == ''){
                            $('#vld-tinhthanhpho').html('Bạn chưa chọn tỉnh / thành phố!');
                            validate = false;
                        }
                        if(quanhuyen == ''){
                            $('#vld-quanhuyen').html('Bạn chưa chọn quận / huyện!');
                            validate = false;
                        }
                        if(phuongxa == ''){
                            $('#vld-phuongxa').html('Bạn chưa chọn phường / xã!');
                            validate = false;
                        }
                    
                        if(validate = true && email != '' && sdt != '' && phuongxa != '' && hoten != ''){
                        console.log(hoten , email , sdt , tinhthanhpho , quanhuyen , phuongxa , ghichu , hinhthucthanhtoan);
                        $('section#load').fadeIn();            
                        $.ajax({
                            url : 'thanhtoan/tao_donhang',
                            type : 'post',
                            data : {
                                hoten : hoten,
                                email : email,
                                sdt : sdt,
                                tinhthanhpho : tinhthanhpho,
                                quanhuyen : quanhuyen,
                                phuongxa : phuongxa,
                                ghichu : ghichu,
                                hinhthucthanhtoan : hinhthucthanhtoan,
                                phivanchuyen : phivanchuyen
                            }
                        }).done(function(res){
                            console.log(res)
                            if(hinhthucthanhtoan == 'tienmat'){
                                window.location.href = "http://localhost/vnpay_php/vnpay_return.php";
                            }else{
                                 
                            }
                        })     
                        if(hinhthucthanhtoan == 'online'){
                            $('#form-thanhtoan').removeAttr('onsubmit');
                            $('#price-vnpay').val(tongtien);
                            //    $(this).unbind('submit').submit();
                        } 
                    
                    }
                 }else{
                     $('.form-login').css('display' , 'flex');
                  }
                }
        })
   })