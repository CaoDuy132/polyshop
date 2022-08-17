

        $(document).ready(function(){

            var validate_tensp = false;
            var validate_giasp = false;
            var validate_danhmuc = false;
            var validate_anhdaidien = false;
            var validate_anhmota = true;
            var validate_size= false;
            var validate_tenmau= false;
            var box_mausac = $('.box-mausac').clone();


            $('#themmausac').click(function(){
                var item_clone = box_mausac.clone();
                $('#wrapper-box-mausac').append(item_clone);
                load_event();
               
            })
            function load_event(){
 
    
                $('.close-box-mausac').click(function(){
                    $(this).parent().remove();
                })

                $('.close-anhmota').click(function(){
                    $(this).parent().remove();
                })
                
                $('#tensp').on('input' , function(){
                    if($(this).val() == ''){
                        $('#tensp-erro').show('fast');
                        $('#tensp-erro').html('Không được để trống trường này!');
                        validate_tensp = false;
                    }else if(isNaN($(this).val()) == false){
                        $('#tensp-erro').show('fast');
                        $('#tensp-erro').html('Tên sản phẩm phải có kí tự là chữ!');
                        validate_tensp = false;
                    }else{
                        $('#tensp-erro').hide('fast');
                        validate_tensp = true;
                    }
                })
    
                $('#gia').on('input' , function(){
                    if($(this).val() == ''){
                        $('#gia-erro').show('fast');
                        $('#gia-erro').html('Không được để trống trường này!');
                        validate_giasp = false;
                    }else if(isNaN($(this).val()) == true){
                        $('#gia-erro').show('fast');
                        $('#gia-erro').html('Giá có định dạng là số!');
                        validate_giasp = false;
                    }else{
                        $('#gia-erro').hide('fast');
                        validate_giasp = true;
                    }
                })

                
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
            }

            load_event();
            $('#danhmuc').change(function(){
                 validate_danhmuc = true;
            })  


            $('#submit-them').click(function(){
                var mota = CKEDITOR.instances['mota'].getData()
                tensp =  $('#tensp').val();
                giasp = $('#gia').val();
                danhmuc = $('#danhmuc').val();
                console.log(validate_tensp , validate_giasp , validate_danhmuc ,validate_anhdaidien , validate_anhmota , validate_size)
                  if(validate_tensp != false && validate_giasp != false && validate_danhmuc != false  && validate_anhdaidien != false && validate_anhmota != false
                   && validate_size != false && validate_tenmau != false){
                      $.ajax({
                          url : 'admin/them_sanpham',
                          type : 'post',
                          data : {
                              tensp : tensp,
                              giasp : giasp,
                              danhmuc : danhmuc,
                              mota : mota
                          }
                      }).done(function(res){
                           console.log(res)
                           if(res != 'false'){
                               $('section#load').fadeIn();         
                               them_mausac(res)
                               setTimeout(()=> window.location.href = 'admin' , 1000)
                           }else{
                               alert('Tên sản phẩm đã tồn tại');
                           }
                        
                      })
                  }
            })


            function them_mausac(idSP){

                 $('.tenmau').each(function(i){
                    var formData = new FormData();
                    var tenmau = $('.tenmau')[i].value;
                    var anhdaidien = $('.input-anhdaidien')[i].files[0];
                    var mamau = $('.mamau')[i].value;
                    var sizeS = $('.SizeS')[i].value;
                    var SizeM = $('.SizeM')[i].value;
                    var SizeL = $('.SizeL')[i].value;
                    var SizeXL = $('.SizeXL')[i].value;
                    var list_anhmota = $('.anhmota')[i].files;
                   
                    // 
                    formData.append('idSP' , idSP);
                    formData.append('tenmau' , tenmau);
                    formData.append('mamau' , mamau);
                    formData.append('SizeS' , sizeS);
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
                    })

                 })
            }

         

        })