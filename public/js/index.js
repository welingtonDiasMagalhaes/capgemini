$(document).ready( function () {
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': _token
        }
    });

    $(".load").hide();
    $("#retorno").hide();
    $("#erro-js").hide();
    
});

function limpar(){
    $("#conta").val("");  
}

function procurarConta(){
    var conta = $("#conta").val();    
    
    $("#dados_retorno").html("");
    $("#retorno").hide();

    if(!conta){
        $("#erro-js").show();
        $("#erro-js").html("Informe a conta!");
    }
    else{
        $(".load").show();
        $("#erro-js").html("");
        $("#erro-js").hide();
        $.ajax({
            url : '/conta/procurar/' + conta,		        
            dataType: 'json',
            success: function(data)
            {                                 
                $(".load").hide();
                var html =  "";
                html += "<tr>";
                html += "<td align='center' >" + data.conta[0].id + "</td>";
                html += "<td align='center' >" + data.conta[0].nome + "</td>";
                html += "<td align='center' >" + data.conta[0].conta + "</td>";
                html += "<td align='center' id='saldo'>" + data.conta[0].saldo + "</td>";
                html += "<td align='center' >";
                html += " <a class='btn btn-success btn-sm' onclick=\"depositar('"+ data.conta[0].id +"')\" >Depositar</a>";
                html += " <a class='btn btn-secondary btn-sm' onclick=\"sacar('"+ data.conta[0].id +"')\" >Sacar</a>";
                html += "</td>";;

                $("#dados_retorno").html(html);
                $("#retorno").show();
                

            },
            error: function (data)
            {
                $(".load").hide();
                $("#erro-js").show();
                $("#erro-js").html("Error from ajax 1");
            }
        });
    }
}

function depositar(id){    
    $("#modal-validacao").hide();
    $('#modal_form').modal('show');
    $('.modal-title').text('Depositar');
    $('#form')[0].reset();  
    $('#id-conta').val(id);
    $('#operacao').val('d');
}

function sacar(id){    
    $("#modal-validacao").hide();
    $('#modal_form').modal('show');
    $('.modal-title').text('Sacar');
    $('#form')[0].reset();  
    $('#id-conta').val(id);
    $('#operacao').val('s');
}


function save(){
    if(!$('#valor').val()){
        $("#modal-validacao").html("Digite o valor");
        $("#modal-validacao").show();
    }
    else{
        $("#modal-validacao").html("");       

        if($('#operacao').val() == 'd'){
            var op = 'depositar';
        }
        if($('#operacao').val() == 's'){
            var op = 'sacar';
        }

        $.ajax({
            url : '/conta/' + op,
            type:'POST',		        
            dataType: 'json',
            data:{
                id: $('#id-conta').val(),
                valor:  $('#valor').val() ,
            },
            success: function(data)
            {                        
                $(".load").hide();                 
                

                $('#saldo').html(data.saldo);

                if(data.msg == 0){
                    $("#modal-validacao").html("Erro: saldo insuficiente!");
                    $("#modal-validacao").show();
                }
                else{
                    $('#modal_form').modal('hide');
                }

            },
            error: function(data)
            {                       
                $(".load").hide();                
                $("#modal-validacao").html("Erro ao "+ op );
                $("#modal-validacao").show();
            }
        });

         

    }
}