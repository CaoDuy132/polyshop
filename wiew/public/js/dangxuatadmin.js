 

  
      $(document).ready(function(){
          $('#dangxuat').click(function(){
               $('section#load').fadeIn();
               $.ajax({
                   url : 'admin/dangxuat',
                   type : 'post'
               }).done(function(res){
                   console.log(res)
                   setTimeout(()=> window.location.href = location.href , 500);
               })
          })
      })