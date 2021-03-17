(function($){
    
    $.fn.atualiza_vtotal = function(cont){

        var soma = 0;
        var i = 1;
        while(i <= cont){
            if($('#subtprod'+i).val() != null){
                soma += parseFloat($('#subtprod'+i).val());
            }
            i++;
        }

        $('#vtotal').val(soma);

    };

    $.fn.atualiza_subtotal = function(inputid, cont){

        var codigosplit = $('#prod'+inputid).val().split('#');
        var id = codigosplit[1];
        $.ajax({
            url: '/ajax/products/'+id,
            success: function (response) {

                $('#subtprod'+inputid).val($('#amountprod'+inputid).val()*response);

                $(this).atualiza_vtotal(cont);

            }
        });
    };

    $.fn.atualiza_cpf = function(){

        var codigosplit = $(this).val().split('#');
        var id = codigosplit[1];

        $.ajax({
            url: '/ajax/clients/'+id,
            success: function (response) {
                
              $('#cpf').val(response);
            },
            error: function(e) {
              alert(e.responseText);
            }
        });

    };

})(jQuery);

$(document).ready(function(){
    
    $('#client').change(function(){
        
        $(this).atualiza_cpf();
        
    });


    //////////////////adiciona e remove campos d produtos

    var cont = 1;

    $( ".form-sale-products" ).on( "click", "#add-campo", function() {
        cont++;
        $('.form-sale-products').append(
            "<div class='form-group campo-product' id='campo"+ cont +"'><input type='text' autocomplete='off' required list='products' class='form-control prod' id='prod"+ cont +"' name='prods[]'><label>x</label><input type='number' required class='form-control amountprod' value='1' id='amountprod"+ cont +"' name='amountprods[]'><label>= (R$)</label><input type='number' step='.01' required class='form-control subtprod' value='0.00' id='subtprod"+ cont +"' name='subtprods[]'><button type='button' class='btn btn-primary btn-create btn-sm' id='add-campo'><ion-icon name='add'></ion-icon></button><button type='button' class='btn btn-primary btn-create btn-sm remove-campo' id='"+ cont +"'><ion-icon name='remove'></ion-icon></button></div>");
    });

    $( ".form-sale-products" ).on( "click", ".remove-campo", function() {
        var button_id = $( this ).attr( "id" );
        $( "#campo"+ button_id +"" ).remove();
        $(this).atualiza_vtotal(cont);
    });
    
    
    
    ///////////////////////////atualização de subtotal e total das vendas
    
    $( ".form-sale-products" ).on( "change", ".prod", function() {
        var id = $( this ).attr( "id" );
        var splitid = id.split('d');
        id = splitid[1];
        $(this).atualiza_subtotal(id, cont);
    });

    $( ".form-sale-products" ).on( "change", ".amountprod", function() {
        var id = $( this ).attr( "id" );
        var splitid = id.split('d');
        id = splitid[1];
        $(this).atualiza_subtotal(id, cont);
    });

    $( ".form-sale-products" ).on( "change", ".subtprod", function() {
        var id = $( this ).attr( "id" );
        var splitid = id.split('d');
        id = splitid[1];
        $(this).atualiza_vtotal(cont);
    });
    
    //////////////////////////////////////////////////////////////////////////////
            
});