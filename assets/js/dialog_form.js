$( function() {
    var dialog, form,
 
     
      emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      username = $( "#username" ),
      password = $( "#password" ),
      password_confirmation = $("#password_confirmation"),
      email = $("#email"),
      birthdate = $("#datepicker"),
      gender = $('input[name=gender]:checked').val(), //not working, use the $()
      numberphone = $("#numberPhone"),
      firstname = $("#firstName"),
      lastname = $("#lastName"),
      group = $("#groupList" ).val(),
      allFields =  $([]).add(username).add(password).add(password_confirmation).add(email).add(birthdate).add(gender).add(numberphone).add(firstname).add(lastname).add(group)
      tips = $( ".validateTips" ),
      data = {username: $( "#username" ).val(), password: $("#password").val(), email: $("#email").val(), birthdate: $("#datepicker").val(),
      gender : $('input[name=gender]:checked').val(), numberphone: $("#numberPhone").val(), firstname: $("#firstName").val(),lastname: $("#lastName").val(),group: $("#groupList" ).val()}


      

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
 
    function addUser() {
      data = {username: $( "#username" ).val(), password: $("#password").val(), email: $("#email").val(), birthdate: $("#datepicker").val(),
      gender : $('input[name=gender]:checked').val(), numberphone: $("#numberPhone").val(), firstname: $("#firstName").val(),lastname: $("#lastName").val(),group: $("#groupList" ).val()};
      var valid = true;
      url = "http://localhost:9090/codentretien/administration/newUser";
      

      allFields.removeClass( "ui-state-error" );
 
      valid = valid && checkLength( username, "Nom d'utilisteur", 3, 32 );
      valid = valid && checkLength( password, "Mot de passe", 5, 16 );
      if(password.val() == password_confirmation.val()){
        valid = valid && true;
      }else{
        valid = valid && false;
        updateTips('Les mots de passe de correspondent pas');
      }
      valid = valid && checkLength( email, "email", 6, 64 );
      if($('input[name=gender]:checked').val() === undefined){
      valid = valid && false;
        updateTips("Veuillez selectionner votre sexe");
      }
      valid = valid && checkLength( numberphone, "Numéro de téléphone", 4, 20 );
      valid = valid && checkLength( firstname, "Prénom", 1, 50);
      valid = valid && checkLength( lastname, "Nom", 1, 50);

      valid = valid && checkRegexp( username, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
      valid = valid && checkRegexp( email, emailRegex, "Email invalide! Exemple" );
      valid = valid && checkRegexp( numberphone, /^([0-9])+$/, "Votre numéro de téléphone doit comporter que des nombres");
      valid = valid && checkRegexp( firstname, /^([a-zA-Z])+$/, "Votre prénom ne doit contenir que des lettres");
      valid = valid && checkRegexp( lastname, /^([a-zA-Z])+$/, "Votre nom ne doit contenir que des lettres");
      if ( valid ) {
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: 'json',
            success: function(data){
              alert("Compte créé");
               diag.dialog("close");
               },
            error: function(data, status){
              alert("Erreur dans le requete ajax, veuillez contacter un admnistrateur");
              console.log(data);
              console.log(status);
                },  
            });     
      }
      return valid;
    }
 
    dialog = $( "#newUserForm" ).dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      buttons: {
        "Créer un compte": addUser,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $( "#create-user" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });
  } );