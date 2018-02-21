
$(document).ready(function () {
 
      $("#userTable").jqGrid({
        url:'http://localhost:9090/codentretien/administration/loadusersdata',
        datatype: "json",
        colNames:['id',"Nom d'Utilisateur", "Prénom", "Nom", "Groupe", "Adresse Mail"],
        colModel:[
          {name:'user_id',          index:'user_id',          width:30,     template: "integerStr"},
          {name:'user_login',       index:'user_login',       width:150,    sortable:true},
          {name:'user_firstName',   index:'user_firstName',   width:150,    sortable:true},
          {name:'user_lastName',    index:'user_lastName',    width:150,    sortable:true},
          {name:'labelGroup',       index:'labelGroup',       width:100,    sortable:true},
          {name:'user_email',       index:'user_email',       width:200,    sortable:true}
        ],
        rowNum:10,
        rowList:[10,20,30],
        sortname: 'user_id',
        viewrecords: true,
        sortorder: "asc",
        pager : '#gridpager',
        height: "auto",
        width: "auto",
        loadonce: true,

        caption:"Table Gestion Utilisateur",
        onSelectRow: function(id){
          idUser = $('#userTable').jqGrid('getCell', id, 'user_id');
          url = "http://localhost:9090/codentretien/administration/setusergroup";

          $.get('http://localhost:9090/codentretien/administration/userinfos?idUser=' + jQuery("#userTable").jqGrid('getCell', id, 'user_id'),
            function(data){
              dataparse = jQuery.parseJSON(data);
              $("#edit_groupList").val(dataparse[0]['user_idGroup']);
              $('#info_firstName').text(dataparse[0]['user_firstName']);
              $('#info_lastName').text(dataparse[0]['user_lastName']);
              $('#info_email').text(dataparse[0]['user_email']);
              $('#info_birthday').text(dataparse[0]['user_birthday']);
              $('#info_numberphone').text(dataparse[0]['user_numberphone']);
              $('#info_createdOn').text(dataparse[0]['user_createdOn']);   
            }
          );
          $("#edit_form").dialog({
              autoOpen: false,
              title: "Editer un Utilisateur",
              modal: true,
              width: 'auto',
              hide: 'fold',
              show: 'fold',
              buttons:{
                "Enregistrer": function(){
                  data = {idUser: idUser , idGroup: $('#edit_groupList').val()};
                  $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    success: function(){ 
                      $('#edit_form').dialog("close");
                      $('#userTable').trigger("reloadGrid");
                    }
                  });
                },
                "Annuler": function(){
                  $('#edit_form').dialog("close");
                },
              },
            });
          $("#edit_form").dialog("open");
        }
    });
    jQuery("#userTable").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false});   
});
 