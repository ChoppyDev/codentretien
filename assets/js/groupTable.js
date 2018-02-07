
$(document).ready(function () {
  data = $({labelgroup: $( "#labelgroup" ).val()});
  $("#userTable").jqGrid({
      url:'http://localhost:9090/codentretien/groupmanagement/groupList',
    datatype: "json",
      colNames:['id',"Nom du groupe"],
      colModel:[
        {name:'idGroup',index:'id', width:55},
        {name:'labelGroup',index:'user_login', width:90},
      ],
      rowNum:10,
      rowList:[10,20,30],
      pager: '#pager2',
      sortname: 'idGroup',
      viewrecords: true,
      sortorder: "desc",
      caption:"Table Gestion Utilisateur",
      onSelectRow:function(id){
        $("#groupDialog").dialog("open");
        $("#labelgroup").val(jQuery("#userTable").jqGrid('getCell', id, "labelGroup"));
        $("#groupDialog").dialog({ 
          title:"Modification - "+ jQuery("#userTable").jqGrid('getCell', id, "labelGroup"),
          width:'auto',
          height: 'auto',
          resizable: false,
          buttons:{
            "Enregistrer": function(){
              console.log(data);
            },
            "Annuler": function(){
              $( this ).dialog( "close" );
              $('input:checkbox').removeAttr('checked');
            }
          },
          close: function(){
            $('input:checkbox').removeAttr('checked');
            }
        });
        // Get permissions for the group and check the checkboxes
        $.get("http://localhost:9090/codentretien/groupmanagement/permissionsByGroup?group=" + jQuery("#userTable").jqGrid('getCell', id, "idGroup"),
          function(data){
            map = jQuery.parseJSON(data);
            $.each(map, function(id, perms){
              $.each(perms, function(name, idPerm){
                $('input[name='+ idPerm +']').prop('checked', true);
              })
            })
        });
      }
  });
});