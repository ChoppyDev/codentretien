
$(document).ready(function () {
      url = "http://localhost:9090/codentretien/"
      $("#historyTable").jqGrid({
        url:'http://localhost:9090/codentretien/history/getTicketsGrid',
        datatype: "json",
        colNames:['id',"Titre", "Description", "Prénom", "Nom" ,"Date de Creation", "Status"],
        colModel:[
          {name:'ticket_id',            index:'ticket_id',              width:30,     template: "integerStr"},
          {name:'ticket_title',         index:'ticket_title',         width:150,    sortable:true},
          {name:'ticket_description',   index:'ticket_description',   width:150,    sortable:true},
          {name:'user_firstName',       index:'user_firstName',       width:100,    sortable:true},
          {name:'user_lastName',        index:'user_lastName',        width:100,    sortable:true},
          {name:'ticket_creation',      index:'ticket_creation',      width:100,    sortable:true},
          {name:'status_label',         index:'status_label',           width:200,    sortable:true, formatter: statusFormatter}
        ],
        rowNum: 30,
        rowList:[10,20,30],
        sortname: 'user_id',
        viewrecords: true,
        sortorder: "desc",
        pager : '#pagerHistory',
        height: "auto",
        width: "auto",
        loadonce: true,
        caption:"Historique",
        onSelectRow: function(id){
            $.get(url+"history/getticketdetail?ticketID=" + $("#historyTable").jqGrid('getCell', id, "ticket_id"),
              function(data){
              data = jQuery.parseJSON(data);
              $("#ticket-title").text(data[0]['ticket_title']);
              $("#ticket-description").val(data[0]['ticket_description']);
              $('#ticket-creator').text(data[0]['user_firstName'] + " " + data[0]['user_lastName']);
              $("#ticket-createdOn").text(data[0]['ticket_creation']);
              $("#ticket-status").text(data[0]['status_label']);
            })
            
            dialog.dialog('open');
            dialog.dialog({
              title: "Détails - " + $("#historyTable").jqGrid('getCell', id, "ticket_title"),

            })
          
        }


    });
      function statusFormatter(celldata, option, rowObject){
        var color = "";
        switch(celldata){
          case 'Accepté':
            color =  'green';
            break
          case 'Refusé':
            color =  'red';
            break;
          case 'Nouveau':
            color = "blue";
            break;
          case 'Non traité':
            color = 'yellow';
          break;
        }
        return '<span style="color:' + color +'" >' + celldata + "</span>";
      };
      dialog = $('#ticket-dialog').dialog({
            title: "Détails",
            autoOpen: false,
            width: 'auto',
            height: 'auto'
        });
});
 
