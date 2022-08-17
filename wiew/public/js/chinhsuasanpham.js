

   $(document).ready(function(){

        var validate_tensp = true;
        var validate_gia = true;
        var validate_size = true;

        function load_event(){
            $('.close-anhmota').click(function(){
                var idCTSP = $(this).data('id');
                var src_delete = $(this).attr('src-delete');
                Swal.fire({
                    title: 'Xóa ảnh này?',
                    text: "Ảnh mô tả của sản phẩm này sẽ bị xóa!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire(
                        'Xóa thành công!',
                        '',
                        'success'
                      )
                      $.ajax({
                          url :'admin/xoa_anhmota',
                          type : 'post',
                          data : {
                             idCTSP: idCTSP,
                             src_delete : src_delete
                          }
                      }).done(function(res){
                          console.log(res);
                          $('.box-listanhmota[data-id=' + idCTSP + ']').html(res);
                          load_event();
                      })
                    }
                })
            })
        }

        load_event();
          
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
                validate_gia = false;
            }else if(isNaN($(this).val()) == true){
                $('#gia-erro').show('fast');
                $('#gia-erro').html('Giá có định dạng là số!');
                validate_gia = false;
            }else{
                $('#gia-erro').hide('fast');
                validate_gia = true;
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
      
        
        // xóa ảnh mô tả
      

        $('.them-anh').change(function(){
             var idCTSP = $(this).data('id');
             var hinhanh = $(this).prop('files')[0];
             if(hinhanh.type != 'image/jpeg' && hinhanh.type != 'image/png' && hinhanh.type != 'image/gif'){
                alert('Chỉ được tải ảnh!');
             }else{
                var formData = new FormData();
                formData.append('idCTSP' , idCTSP);          
                formData.append('hinhanh' , hinhanh);          
                $.ajax({
                    url: 'admin/them_anhmota',
                    type :'post',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data : formData
                }).done(function(res){
                   $('.box-listanhmota[data-id=' + idCTSP + ']').html(res);
                   load_event();
               })
             }

            
        })  


        $('.input-anhdaidien').change(function(){
            var idCTSP = $(this).data('id');
            var hinhanh = $(this).prop('files')[0];
            if(hinhanh.type != 'image/jpeg' && hinhanh.type != 'image/png' && hinhanh.type != 'image/gif'){
                alert('Chỉ được tải ảnh!');
            }else{
                var formData = new FormData();
                formData.append('idCTSP' , idCTSP);          
                formData.append('hinhanh' , hinhanh);          
                $.ajax({
                    url: 'admin/upload_anhdaidien',
                    type :'post',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data : formData
                }).done(function(res){
                   $('.img-anhdaidien[data-id=' + idCTSP + ']').attr('src', res);
                   load_event();
               })
            }
        })


        $('#submit-them').click(function(){
             if(validate_tensp == true && validate_gia == true && validate_size == true){
                $('section#load').fadeIn();         
                 update_tenmau();
                 update_mamau();
                 update_size();
                 var tensp = $('#tensp').val();
                 var gia = $('#gia').val(); 
                 var mota = CKEDITOR.instances['mota'].getData()
                 $.ajax({
                     url : 'admin/update_sanpham',
                     type : 'post',
                     data : {
                        tensp : tensp,
                        gia : gia,
                        mota : mota
                     }
                 }).done(function(res){
                     console.log(res)
                     setTimeout( ()=> window.location.href = location.href, 1000)
                 })
             }
        })

        function update_tenmau(){
            $('.tenmau').each(function(){
                var id = $(this).data('id');
                var tenmau = $(this).val();
                $.ajax({
                    url : 'admin/update_chitietsanpham_tenmau',
                    type : 'post',
                    data : {
                        id : id,
                        tenmau : tenmau,
                    }
                }).done(function(res){
                    console.log(res)
                })
            }) 
        }

        function update_mamau(){
            $('.mamau').each(function(){
                var id = $(this).data('id');
                var mamau = $(this).val();
                console.log(mamau)
                $.ajax({
                    url : 'admin/update_chitietsanpham_mamau',
                    type : 'post',
                    data : {
                        id : id,
                        mamau : mamau
                    }
                }).done(function(res){
                    console.log(res)
                })
            }) 
        }

        function update_size(){
            $('.size').each(function(){
                var idSize = $(this).data('id');
                var soluong = $(this).val();
                if(soluong == ''){
                    soluong = 0;
                }
                $.ajax({
                    url : 'admin/update_size',
                    type : 'post',
                    data : {
                        idSize : idSize,
                        soluong : soluong
                    }
                }).done(function(res){
                    console.log(res)
                })
            }) 
        }

        $('.close-box-mausac').click(function(){
            var id = $(this).data('id');
            Swal.fire({
                title: 'Xác nhận xóa màu sắc này?',
                text: "Tất cả thông tin liên quan đến màu sắc này sẽ bị xóa!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
              }).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire(
                    'Xóa thành công!',
                    '',
                    'success'
                  )
                  $.ajax({
                      url :'admin/xoa_mausac',
                      type : 'post',
                      data : {
                         id: id
                      }
                  }).done(function(res){
                      console.log(res);
                      $('.box-mausac[data-id=' + id + ']').remove();
                  })
                }
            })
        })

   })