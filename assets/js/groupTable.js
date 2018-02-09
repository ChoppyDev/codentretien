
$(document).ready(function () {
 
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
              permList = [];
              $('input[type=checkbox]').each(function(){
                if(this.checked){
                  permList.push($(this).attr('name'));
                }
              });
              
              data = {idGroup: jQuery("#userTable").jqGrid('getCell', id, "idGroup"), 
                     newlabelgroup: $('#labelgroup').val(), permissions: permList};
              url = 'http://localhost:9090/codentretien/groupmanagement/savePermissions';
               console.log(JSON.stringify(data));
               console.log(data);
              $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(){
                   $("#groupDialog").dialog("close");
                   $('#userTable').trigger( "reloadGrid" );
                }
               });

            },
            "Annuler": function(){
              $( this ).dialog( "close" );
              $('input:checkbox').removeAttr('checked');

            }
          },
          close: function(){
            $('input:checkbox').removeAttr('checked');
            //$(this).find('form')[0].reset();
            }
        });
        // Get permissions for the group and check the checkboxes
        $.get("http://localhost:9090/codentretien/groupmanagement/permissionsByGroup?group=" + jQuery("#userTable").jqGrid('getCell', id, "idGroup"),
          function(data){
            map = jQuery.parseJSON(data); //parsing String Data to JSON
            $.each(map, function(id, perms){ 
              $.each(perms, function(name, idPerm){
                $('input[name='+ idPerm +']').prop('checked', true);
              })
            })
        });
      }
  });
});
