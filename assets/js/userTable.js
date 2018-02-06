
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
        $( "#groupDialog" ).dialog("open");
        $( "#groupDialog" ).dialog({ 
          title:"Modification - "+ jQuery("#userTable").jqGrid('getCell', id, "labelGroup"),
          width:'auto',
          modal: true,
        });
      }
  });
  jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false});
});