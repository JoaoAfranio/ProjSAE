(function($) {
  'use strict';
  $(function() {
    var todoListItem = $('.todo-list');
    var todoListInput = $('.todo-list-input');

    var PrescricaoListItem = $('.prescricao-list');
    var PrescricaoListInput = $('.prescricao-list-input');

    var DiagnosticoListItem = $('.diagnostico-list');
    var DiagnosticoListInput = $('.diagnostico-list-input');


    $('.prescricao-list-add-btn').on("click", function(event) {
      event.preventDefault();

      var item = $(this).prevAll('.prescricao-list-input').val();

      if (item) {
        PrescricaoListItem.append(
          "<li><div class='form-check'><label class='form-check-label'><input class='checkbox' type='checkbox'/>"
           + item + 
           "<i class='input-helper'></i></label></div>"+
           "<label class='mleftAuto' for='selectRotina'>Rotina</label>" + 
           "<select class='form-control selectRotina form-control-sm' id='selectRotina'>" + 
             "<option>02 em 02 Horas</option>" + 
             "<option>04 em 04 Horas</option>" +
             "<option>06 em 06 Horas</option>" + 
           "</select>" + 
           "<i class='remove mdi mdi-close-circle-outline'></i></li>");
        PrescricaoListInput.val("");
      }

    });

    $('.diagnostico-list-add-btn').on("click", function(event) {
      event.preventDefault();

      var item = $(this).prevAll('.diagnostico-list-input').val();

      if (item) {
        DiagnosticoListItem.append("<li><div class='form-check'><label class='form-check-label'><input class='checkbox' type='checkbox'/>" + item + "<i class='input-helper'></i></label></div><i class='remove mdi mdi-close-circle-outline'></i></li>");
        DiagnosticoListInput.val("");
      }

    });
    
    $('.todo-list-add-btn').on("click", function(event) {
      event.preventDefault();

      var item = $(this).prevAll('.todo-list-input').val();

      if (item) {
        todoListItem.append(
        "<li><div class='form-check'><label class='form-check-label'><input class='checkbox' type='checkbox'/>"
        + item + 
        "<i class='input-helper'></i></label></div><i class='remove mdi mdi-close-circle-outline'></i></li>"
        );
        todoListInput.val("");
      }

    });

    todoListItem.on('change', '.checkbox', function() {
      if ($(this).attr('checked')) {
        $(this).removeAttr('checked');
      } else {
        $(this).attr('checked', 'checked');
      }

      $(this).closest("li").toggleClass('completed');

    });

    todoListItem.on('click', '.remove', function() {
      $(this).parent().remove();
    });

    DiagnosticoListItem.on('change', '.checkbox', function() {
      if ($(this).attr('checked')) {
        $(this).removeAttr('checked');
      } else {
        $(this).attr('checked', 'checked');
      }


    });

    DiagnosticoListItem.on('click', '.remove', function() {
      $(this).parent().remove();
    });

    PrescricaoListItem.on('change', '.checkbox', function() {
      if ($(this).attr('checked')) {
      $(this).removeAttr('checked');
    } else {
      $(this).attr('checked', 'checked');
    }


    });

    PrescricaoListItem.on('click', '.remove', function() {
      $(this).parent().remove();
    });


  });
})(jQuery);