
$(document).ready(function () {
 
      $("#userTable").jqGrid({
        url:'http://localhost:9090/codentretien/administration/loadusersdata',
        datatype: "json",
        colNames:['id',"Nom d'Utilisateur", "Prénom", "Nom", "Groupe", "Adresse Mail"],
        colModel:[
          {name:'user_id',index:'user_id', width:55},
          {name:'user_login',index:'user_login', width:90},
          {name:'user_firstName',index:'user_firstName', width:90},
          {name:'user_lastName',index:'user_lastName', width:90},
          {name:'labelGroup',index:'labelGroup', width:90},
          {name:'user_email',index:'user_email', width:90}
        ],
        rowNum:10,
        rowList:[10,20,30],
        sortname: 'user_id',
        viewrecords: true,
        sortorder: "desc",
        caption:"Table Gestion Utilisateur",
    });

});
 