$(document).ready(function () {
  $("#userTable").jqGrid({
      url:'http://localhost:9090/codentretien/administration/loadUsersData',
    datatype: "json",
      colNames:['id',"Nom d'utilisateur", 'Groupe','Prénom', 'Nom'],
      colModel:[
        {name:'user_id',index:'id', width:55},
        {name:'user_login',index:'user_login', width:90},
        {name:'labelGroup',index:'user_idGroup', width:80, align:"right"},
        {name:'user_firstName',index:'user_firtname', width:100},
        {name:'user_lastName',index:'user_lastname', width:100}   
      ],
      rowNum:10,
      rowList:[10,20,30],
      pager: '#pager2',
      sortname: 'id',
      viewrecords: true,
      sortorder: "desc",
      caption:"Table Gestin Utilisateur"
  });
  jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false});
});