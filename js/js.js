
//alert('holamundo');
function getSearch() {
    console.log('input', $('#searchInput').val())
    console.log('input type', typeof $('#searchInput').val())
   
    console.log('si voy a traerlo');
    $.ajax({
        type:'GET',
        url:'../anexo4/busquedaAjax.php',
        dataType: "json",
        data:{op:'getSearch', dato: $('#searchInput').val()},
        success:function(data){
                console.log(data);
            $('#ulsearch').empty();

            $('#ulsearch').html("");
            data.map(function(data){
               $('#ulsearch').append("<li onclick='selectUser(this)' data-id='"+data.id+"'>  "+data.primer_nombre+" " +data.primer_apellido+" </li> ");

            });
          
        }

    });
}

function selectUser(e) {
    console.log('e trae: ', $(e).text());

    $('#searchInput').val($(e).text());
    $('#usuarioId').val($(e).attr('data-id'));
    $('#ulsearch').html("");

}

