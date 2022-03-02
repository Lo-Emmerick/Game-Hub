$("#formLogin").submit(function(){
    console.log(this);
    $.ajax({
        url: 'controller/login/loginController.php',
        type: 'post',
        data: $(this).serialize(),    
        success: function(data){
            var obj = JSON.parse(data);
            if (obj.logado) {
               location.reload();
            } else {
                alert(obj.msg);
            }
            console.log(obj);
        }
    })
    return false;
}) 