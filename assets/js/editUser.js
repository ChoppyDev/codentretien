$(function(){
	button = false;
  valid = true;
	tips = $('.validateTips');
	emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
	username = $('#edit-username');
	newPassword = $('#edit-newPassword');
  newPasswordConfirm = $('#edit-newPasswordConfirmation');
	firstName = $('#edit-firstName');
	lastName = $('#edit-lastName');
	email = $('#edit-email');
	numberphone = $('#edit-numberphone');
	
  url = 'http://localhost:9090/codentretien/';

	$.get( url + "settings/getUserInfos",
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
      $("#edit-username").prop('disabled', true);
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
        updateTips( "La longueur de votre " + n + " doit être entre " +
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
    /**
    * Function passwordMatch
    *
    */
    function passwordMatch(newpass, newconfirm){
      if(newpass.val() == newconfirm.val()){
        return true;
      }
      newpass.addClass("ui-state-error");
      newconfirm.addClass("ui-state-error");
      updateTips("Les mots de passe ne correspondent pas");
      return false;
    }

    function passwordEmpty(newpass, newconfirm){
      if(newpass.val() == "" && newconfirm.val() == ""){
        return true;
      }
      return checkRegexp( newpass, /^([0-9A-Za-z_\s])+$/, "Le mot de passe doit contenir uniquement des  : a-z 0-9" );

    }
    
    function editUser(){
      data = {newPassword: newPassword.val(), firstName: firstName.val(), lastName: lastName.val(), email: email.val(), numberphone: numberphone.val()};
    	
      valid = valid && passwordMatch(newPassword, newPasswordConfirm);

      valid = valid && checkLength(firstName, "Prénom", 1, 50);
      valid = valid && checkLength(lastName, "Nom", 1, 50);
      valid = valid && checkLength(email, "email", 6, 64);
      valid = valid && checkLength(numberphone, "numéro de téléphone", 4, 20);

      valid = valid && passwordEmpty(newPassword, newPasswordConfirm); // si les deux champs sont vides, on ne modifie pas le password
      valid = valid && checkRegexp( firstName, /^([a-zA-Z])+$/, "Votre prénom ne doit contenir que des lettres");
      valid = valid && checkRegexp( lastName, /^([a-zA-Z])+$/, "Votre nom ne doit contenir que des lettres");
      valid = valid && checkRegexp( email, emailRegex, "Email invalide! Exemple: administrateur@manita.fr" );
      valid = valid && checkRegexp( numberphone, /^([0-9])+$/, "Votre numéro de téléphone doit comporter que des nombres");
      console.log(data);

      if(valid){
        $.ajax({
          type: 'POST',
          url: 'http://localhost:9090/codentretien/settings/updateInfos',
          data: data,
          success: function(){
            updateTips("Vos paramètres ont étés modifiés");
            $("input").prop('disabled', true);

          },
          error: function(data){
            console.log(data.status);
            alert('non');
          }
        });
      }
    }


    $('#edit-save').click(function(){
    	editUser();
    });

});