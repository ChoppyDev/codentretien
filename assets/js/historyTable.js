
$(document).ready(function () {
 
      $("#historyTable").jqGrid({
        url:'http://localhost:9090/codentretien/history/getTicketsGrid',
        datatype: "json",
        colNames:['id',"Titre", "Description", "Prénom", "Nom" ,"Date de Creation", "Status"],
        colModel:[
          {name:'ticket_id',            index:'ticket_id',              width:30,     template: "integerStr"},
          {name:'ticket_title',         index:'ticket_title',         width:150,    sortable:true},
          {name:'ticket_description',   index:'ticket_description',   width:150,    sortable:true},
          {name:'user_firstName',       index:'user_firstName',       width:150,    sortable:true},
          {name:'user_lastName',        index:'user_lastName',        width:100,    sortable:true},
          {name:'ticket_creation',      index:'ticket_creation',      width:100,    sortable:true},
          {name:'user_email',           index:'user_email',           width:200,    sortable:true, formatter: formattertest}
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

        caption:"Historique",
    });
      function formattertest(cellvalue, option, rowobject){
        return '<p style="color: blue">'+cellvalue + 'caca'+'</p>';
      }
     
});
 
