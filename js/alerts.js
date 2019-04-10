(function($) {
  showSwal = function(type) {
    'use strict';
    if (type === 'basic') {
      swal({
        text: 'Any fool can use a computer',
        button: {
          text: "OK",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })

    } else if (type === 'title-and-text') {
      swal({
        title: 'Read the alert!',
        text: 'Click OK to close this alert',
        button: {
          text: "OK",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })

    } else if (type === 'success-message') {
      swal({
        title: 'Cadastro efetuado!',
        text: 'Dados salvos com sucesso',
        icon: 'success',
        button: {
          text: "Continuar",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })

    } else if (type === 'error-message') {
      swal({
        title: 'Erro ao cadastrar!',
        text: 'Desculpe, não foi possível salvar os dados',
        icon: 'error',
        button: {
          text: "Continuar",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })

    }else if (type === 'delete-success-message') {
      swal({
        title: 'Dado deletado!',
        text: 'Dados deletados com sucesso',
        icon: 'success',
        button: {
          text: "Continuar",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })

    } else if (type === 'delete-error-message') {
      swal({
        title: 'Erro ao deletar!',
        text: 'Desculpe, não foi possível deletar os dados',
        icon: 'error',
        button: {
          text: "Continuar",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })

    } else if (type === 'auto-close') {
      swal({
        title: 'Auto close alert!',
        text: 'I will close in 2 seconds.',
        timer: 2000,
        button: false
      }).then(
        function() {},
        // handling the promise rejection
        function(dismiss) {
          if (dismiss === 'timer') {
            console.log('I was closed by the timer')
          }
        }
      )
    } else if (type === 'warning-message-and-cancel') {
      swal({
        title: 'Erro ao cadastrar!',
        text: "Desculpe, não foi possível salvar os dados",
        icon: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#3f51b5',
        cancelButtonColor: '#ff4081',
        confirmButtonText: 'Great ',
        buttons: {
          cancel: {
            text: "Cancel",
            value: null,
            visible: true,
            className: "btn btn-danger",
            closeModal: true,
          },
          confirm: {
            text: "OK",
            value: true,
            visible: true,
            className: "btn btn-primary",
            closeModal: true
          }
        }
      })

    } else if (type === 'custom-html') {
      swal({
        content: {
          element: "input",
          attributes: {
            placeholder: "Type your password",
            type: "password",
            class: 'form-control'
          },
        },
        button: {
          text: "OK",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })
    }
  }

})(jQuery);

function validaCampo()
{
if(document.login.user.value=="")
{
alert("Insira seu nome de usuário.");
return false;
}
else
if(document.login.pass.value=="")
{
alert("Insira sua senha.");
return false;
}
else
return true;
}

function deleteCookie(nome){
    var exdate = new Date();
    exdate.setTime(exdate.getTime() + (-1 * 24 * 3600 
       * 1000));
    document.cookie = nome + "=" + escape("")+ ((-1 
       == null) ? "" : "; expires=" + exdate);
  } 

function login(){
  
  alert("Olá, Bem Vindo!");

}

function inserirNum(num){
  document.getElementById("numeracao").value = "" +num;
}
