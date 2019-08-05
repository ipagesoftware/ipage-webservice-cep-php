/**
* email: diogenesdias@hotmail.com
* http://www.ipage.com.br
*
* Scritp auxiliar da página index.php
*
* @author IPAGE - Diógenes Dias
* @copyright 2019
*
*/
$(document).ready(function(){
  index.wait(false, function(result){
    index.init();// INICIALIZO A CLASSE
    $("#txt_cep").focus();// PASSO O FOCO PARA A PRIMEIRA CAIXA DE TEXTO
  });
});
// CLASS INDEX
var index = function(){
    var handleForm = function(){
      //
      setTimeout(function(){
        $(".alert").fadeOut();
      }, 5000);

    }

    var handleInputMasks = function () {
        //
        //// INICIO A VARREDURA PELOS OBJETOS INPUT
        //////
        $('input').each(function(index, value){
          var id = $(this).attr('id');
          //
          if($(this).data('type')=='mask'){
            if(typeof(id)!='undefined'){
              var el = document.getElementById($(this).attr('id'));
              //// ARMAZENA A REPRESENTAÇÃO DE TODAS AS PROPRIEDADES DATA
              // DO OBJETO INPUT
              var data = getDataAttributes(el);
              //
              if(typeof(data['inputmaskInputformat'])!=='undefined'){
                // CAMPO MOEDA
                if(data['inputmask']=='currency'){
                  $(this).mask(data['inputmaskInputformat'], {
                      reverse: true,
                      maxlength: false
                  });
                }else{
                  $(this).mask(data['inputmaskInputformat']);
                }
                //                //
                $(this).blur(function(){
                    if(typeof(data['inputmaskInputformat'])!=='undefined'){
                      if($(this).val().trim()==''){
                        $(this).val(data['inputmaskDefaultvalue']);
                      }else{
                        if(data['inputmask']=='currency'){
                          var ret = replaceAll($(this).val().trim(), ',', '');
                          $(this).val(ret);
                        }
                      }
                    }
                });
              }
            }
          }
        });
        function replaceAll(string, token, newtoken) {
            try{
              while (string.indexOf(token) !== -1) {
                  string = string.replace(token, newtoken)
              }
            }catch(e){
              console.log(e);
            }
            return string
        }
        // THE MAGIC FUNCTION CREATED BY DIÓGENES DIAS
        function getDataAttributes(el) {
            var data = {};
            [].forEach.call(el.attributes, function(attr) {
                if (/^data-/.test(attr.name)) {
                    var camelCaseName = attr.name.substr(5).replace(/-(.)/g, function ($0, $1) {
                        return $1.toUpperCase();
                    });
                    data[camelCaseName] = attr.value;
                }
            });
            return data;
        }
        //
    }

    return{
        //Função principal inicializada na carga da página
        init: function (par){
          handleForm();
          handleInputMasks();
        },
        wait: function(value, callback) {
        if (value){
          $('#loader').show();
          setTimeout(function() {
                return callback?callback(1):null;
            }, 500);
        }else{
          setTimeout(function() {
              $('#loader').fadeOut("slow", function(){
                return callback?callback(1):null;
              });
            }, 500);
        }
      }
    };
}();
//
//  _______   _                ______               _
// |__   __| | |              |  ____|             | |
//    | |    | |__     ___    | |__     _ __     __| |
//    | |    | '_ \   / _ \   |  __|   | '_ \   / _` |
//    | |    | | | | |  __/   | |____  | | | | | (_| |
//    |_|    |_| |_|  \___|   |______| |_| |_|  \__,_|
//