/**
* email: diogenesdias@hotmail.com
* http://www.ipage.com.br
*
* Scritp auxiliar da p�gina index.php
*
* @author IPAGE - Di�genes Dias
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
    /**
     * index::handleForm()
     * M�TODO RESPONS�VEL PELO TRATAMENTO DO CEP
     */
    var handleForm = function(){
      $('form, input').blur(function(){
        // REMOVE A CLASSE QUE MUDA A COR DA CAIXA DE TEXTO
        if($(this).hasClass("ipage-result-cep")){
          $(this).removeClass("ipage-result-cep");
        }
      });
    }
    /**
     * index::handleCep()
     *
     */
    var handleCep = function () {
      var classCep = new IpageCep(), form = $("form input[type=text]"), id, text;
      // CEP
      $('#txt_cep').keyup(function(code){
        text = $(this).val();
        //
        if(parseInt(text.length, 10) < 8){
          // LIMPA O VALOR DE TODAS AS CAIXAS DE TEXTO ABAIXO DO CEP
          // SE O VALOR FOR MENOR QUE 8
          jQuery.each(form, function(index, item){
            id = $(item).attr("id");// PEGO O ID DE CADA CAIXA DE TEXTO
            $('#' + id).val('');// LIMPO A CAIXA DE TEXTO A CADA PASSADA PELO LOOP EACH
          });
        }else if(parseInt(text.length, 10) > 8){
          // LIMITA O N�MERO M�XIMO DE CARACETRES EM 8 PARA O CEP
          $(this).val(text.substr(0, 8));
        }
      });
      // EVENTO CLICK DO BOT�O
      $('#btn_cep').click(function(){
        var cep = $("#txt_cep").val();// PEGO O VALOR DO CEP
        // CHAMO O M�TODO DA CLASSE CEP EM: ipage-wscep.js
        // PARA VALIDAR O CEP
        if (classCep.validaCep(cep) === false) {
            alert('N�mero do CEP inv�lido ou inexistente, verifique!');
            $("#txt_cep").focus().select();
            return false;
        }
        // ATIVO A ANIMA��O DE AGUADE E ESPERO O M�TODO DA CLASSE CEP
        // TERMINAR A REQUISI��O AO WEBSERVICE
        index.wait(true, function(ret){
          if(classCep.getCep(cep, function(result){
              if(!result){
                $('#txt_cep').select().focus();
                jQuery.each($('.ipage-result-cep'), function(index, item){
                  $(this).removeClass("ipage-result-cep");
                });
              }else{
                jQuery.each(result, function(index, item){
                  if(typeof($('#' + index).val)!=='undefined'){
                    $('#' + index).val(item.toUpperCase()).addClass("ipage-result-cep");
                  }
                });
              }
            })
          );
        });
      })
      //
      $('.ipage-resultado-cep').blur(function(){
        $(this).removeClass("ipage-result-cep");
      });
    }
    return{
        //Fun��o principal inicializada na carga da p�gina
        init: function (par){
          handleForm();
          handleCep();
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