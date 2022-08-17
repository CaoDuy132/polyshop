


     $(document).ready(function(){

        var validate_anhdaidien = false;
        var validate_tieude = false;
          
        $('#tieude').on('input' , function(){
            if($(this).val() == ''){
                $('#tieude-erro').show('fast');
                $('#tieude-erro').html('Không được để trống trường này!');
                validate_tieude = false;
            }else if(isNaN($(this).val()) == false){
                $('#tieude-erro').show('fast');
                $('#tieude-erro').html('Tiêu đề phải có kí tự là chữ!');
                validate_tieude = false ;
            }else{
                $('#tieude-erro').hide('fast');
                validate_tieude = true;
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
                newImg.style.width = '350px';
                newImg.style.height = '240px';
                var fileReader = new FileReader();
                fileReader.onload = function(e){
                   src = e.target.result;
                   newImg.src = src;
                }
                fileReader.readAsDataURL(anhdaidien)
                $(this).next().children().first().html(newImg);
            }
         })

          $('#submit-them').click(function(){
              var tieude = $('#tieude').val();
              var anhdaidien = $('#anhdaidien').prop('files')[0];
              var noidung = CKEDITOR.instances['noidung'].getData()

              if(noidung != '' && validate_anhdaidien != false && validate_tieude != false){
                    var formData = new FormData();
                    if($('#checkbox').prop( "checked") == false){
                        formData.append('tieude' , tieude);
                        formData.append('anhdaidien' , anhdaidien);
                        formData.append('noidung' , noidung);
                        formData.append('noibat' , 0);
                    }else{
                        formData.append('tieude' , tieude);
                        formData.append('anhdaidien' , anhdaidien);
                        formData.append('noidung' , noidung);
                        formData.append('noibat' , 1);
                    }
                    $.ajax({
                        url: 'admin/thembaiviet',
                        type :'post',
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data : formData
                    }).done(function(res){
                        console.log(res)
                        setTimeout(()=> window.location.href = 'admin/baiviet' , 500);
                    })
              }
          })
     })