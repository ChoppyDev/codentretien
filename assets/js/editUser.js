$(function(){
	button = false;
	tips = $('.validateTips');
	emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
	username = $('#edit-username');
	newPassword = $('#edit-newPassword');
	firstName = $('#edit-firstName');
	lastName = $('#edit-lastName');
	email = $('#edit-email');
	numberphone = $('#edit-numberphone');
	data = { username: username.val(), newPassword: newPassword.val(), firstName: firstName.val(), lastName: lastName.val(), email: email.val()};

	$.get('http://localhost:9090/codentretien/settings/getUserInfos',
		function(data){
			dataparse = jQuery.parseJSON(data);
			$('#edit-username').val(dataparse[0]['user_login']);
			//$('#edit-oldPassword').val(dataparse[0]['user_password']);
			$('#edit-firstName').val(dataparse[0]['user_firstName']);
			$('#edit-lastName').val(dataparse[0]['user_lastName']);
			$('#edit-email').val(dataparse[0]['user_email']);
			$('#edit-numberphone').val(dataparse[0]['user_numberPhone']);
			$('#createdOn').text(dataparse[0]['user_createdOn']);
		}
		);

	$('#edit-button').click(function(){
		if(button == false) {
			$("input").prop('disabled', false);
			$('#edit-button').text("Annuler");
			button = true;
		}else{
			$("input").prop('disabled', true);
			$('#edit-button').text("Editer");
			button = false;
		}			
	});

	 /**
    * Function for updating error tips
    * @param    String    t
    */
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
    /**
    * Function CheckLength
    * @param      String  o       Field you need to check
    * @param      String  n       Display name of the field for the tips
    * @param      int     min     Minimum of caracter of the field
    * @param      int     max     Maximum caraters of the field
    */
    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "La longueur du " + n + " doit être entre " +
          min + " et " + max + "." );
        return false;
      } else {
        return true;
      }
    }

    /**
    * Function CheckRegexp TODO: recommenter cette méthode
    * @param String the field you want to check
    * @param String the regex
    * @param String n
    */
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
    function usernameAlreadyExists(){
    	var output;
        $.ajax({
         type: 'POST',
         url:  "http://localhost:9090/codentretien/administration/useralreadyexist",
         data: {username: $("#edit-username").val()},
         dataType: 'json',
         async: false,
         success: function(data){
           output = data;
         },
         error: function(data){
          alert("[Edition du compte] Une erreur est survenue, veuillez contacter un administrateur.");
         }
       });
        if(output == true){
        	updateTips("Le nom d'utilisateur "+ $("#edit-username").val() + " est déjà pris");
        }
        return output;
    }
    function editUser(){
    	valid = true;
    	valid = 
        console.log(valid);
    }

    $('#edit-save').click(function(){
    	editUser();
    });

});