$(document).ready(function () {
 
  $("#groupTable").jqGrid({
      url:'http://localhost:9090/codentretien/groupmanagement/groupList',
    datatype: "json",
      colNames:['id',"Nom du groupe"],
      colModel:[
        {name:'idGroup',      index:'idGroup',      width:55,   template: "integerStr"},
        {name:'labelGroup',   index:'labelGroup',   width:90},
      ],
      rowNum:10,
      rowList:[10,20,30],
      sortname: 'idGroup',
      viewrecords: true,
      sortorder: "asc",
      loadonce: true,
      pager : '#gridpager',
      width: 200,
      height: "auto",
      caption:"Table Gestion Groupes",
      onSelectRow:function(id){
        $("#groupDialog").dialog("open");
        $("#labelgroup").val(jQuery("#groupTable").jqGrid('getCell', id, "labelGroup"));
        $("#groupDialog").dialog({ 
          title:"Modification - "+ jQuery("#groupTable").jqGrid('getCell', id, "labelGroup"),
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
              data = {idGroup: jQuery("#groupTable").jqGrid('getCell', id, "idGroup"), 
                     newlabelgroup: $('#labelgroup').val(), permissions: permList};
              url = 'http://localhost:9090/codentretien/groupmanagement/savePermissions';
              $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(){
                   $("#groupDialog").dialog("close");
                   $('#groupTable').trigger( "reloadGrid" );
                }
               });

            },
            "Annuler": function(){
              $( this ).dialog( "close" );
              $(this).dialog("option", "title", "");
              $('input:checkbox').removeAttr('checked');
            }
          },
            close: function(){
              $('input:checkbox').removeAttr('checked');
            }
        });
        // Get permissions for the group and check the checkboxes
        $.get("http://localhost:9090/codentretien/groupmanagement/permissionsByGroup?group=" + jQuery("#groupTable").jqGrid('getCell', id, "idGroup"),
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
 