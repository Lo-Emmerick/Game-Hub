
function trataBotao(valor){
    console.log(valor.innerText);
    $.ajax({
        url: 'controller/menu/action.php',
        type: 'post',
        data: valor.innerText,    
        success: function(data){
            $.ajax({
                url: 'index.php',
                type: 'post',
                data: data, 
                success: function(data){
                    location.reload();
                }
            })
            
        }
    })
    
}