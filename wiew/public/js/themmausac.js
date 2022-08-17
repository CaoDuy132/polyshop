



     $(document).ready(function(){
        var validate_tenmau = false;
        var validate_anhdaidien = false;
        var validate_size = false;


        $('.tenmau').on('input' , function(){
            if($(this).val() == ''){
                $(this).next().show('fast');
                $(this).next().html('Không được để trống trường này!');
                validate_tenmau = false;
            }else if(isNaN($(this).val()) == false){
                $(this).next().show('fast');
                $(this).next().html('Hãy nhập chữ!');
                validate_tenmau = false;
            }else{
                $(this).next().hide('fast');
                validate_tenmau = true;
            }
        })


          $('.input-anhdaidien').change(function(){
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


                $('.anhmota').change(function(){
                    var box_listimgmota = $(this).next();
                    var list_anhmota =  $(this).prop('files'); 
                    if(list_anhmota.length != 0){
                        for(var i =0;i<list_anhmota.length; i++){
                            if(list_anhmota[i].type != 'image/jpeg' && list_anhmota[i].type != 'image/png' && list_anhmota[i].type != 'image/gif'){
                                $(this).parent().children().last().show('fast');
                                $(this).parent().children().last().html('Chỉ được tải ảnh!');
                                validate_anhmota = false;
                                return;
                            }
                        }     
                    }
                })

                $('.size').on('input' , function(){
                    if(isNaN($(this).val()) == true){
                        $(this).parent().next().show();
                        $(this).parent().next().html('Hãy nhập số!');
                        validate_size = false;
                    }else{
                        $(this).parent().next().hide();
                        validate_size = true;
                    }
                })


            $('#submit-them').click(function(){
                if(validate_tenmau != false && validate_anhdaidien != false &&  validate_size != false){
                    $('section#load').fadeIn();         
                    var formData = new FormData();
                    var idSP = sessionStorage['idSP'];
                    var tenmau = $('.tenmau')[0].value;
                    var mamau = $('.mamau')[0].value;
                    var anhdaidien = $('.input-anhdaidien')[0].files[0]; 
                    var SizeS = $('.SizeS')[0].value;
                    var SizeM = $('.SizeM')[0].value;
                    var SizeL = $('.SizeL')[0].value;
                    var SizeXL = $('.SizeXL')[0].value;
                    var list_anhmota = $('.anhmota')[0].files;  
                    // 
                    formData.append('idSP' , idSP);
                    formData.append('tenmau' , tenmau);
                    formData.append('mamau' , mamau);
                    formData.append('SizeS' , SizeS);
                    formData.append('SizeM' , SizeM);
                    formData.append('SizeL' , SizeL);
                    formData.append('SizeXL' , SizeXL);
                    formData.append('anhdaidien' , anhdaidien);
                    for(var i=0; i<list_anhmota.length; i++){
                        formData.append('anhmota[]' , list_anhmota[i])
                    }
                    $.ajax({
                        url: 'admin/them_mausac',
                        type :'post',
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data : formData
                    }).done(function(res){
                        console.log(res)
                        setTimeout( ()=> window.location.href = '/admin/quanlysanpham/chinhsua/' + idSP , 1000)
                    })
                }
            })

     })