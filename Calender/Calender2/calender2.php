
<!DOCTYPE html>
<html>
 <head>
  <title>Calandar</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="../css/nav.css">
  <script type="text/javascript" src="../js/nav.js"></script>

  <!-- <link rel="stylesheet" href="../lib/fullcalender.css" />
  <script src="../lib/jquery.min.js"></script>
  <script src="../lib/jquery-ui.min.js"></script>
  <script src="../lib/moment.min.js"></script>
  <script src="../lib/fullcalendar.min.js"></script>
 -->

 <link rel="stylesheet" href="lib/fullcalender.css" />
  <script src="lib/jquery.min.js"></script>
  <script src="lib/jquery-ui.min.js"></script>
  <script src="lib/moment.min.js"></script>
  <script src="lib/fullcalendar.min.js"></script>



  <script>
   
  $(document).ready(function() {
   var calendar = $('#calendar2').fullCalendar({
    editable:true,
    header:{
     left:'',
     center:'title',
     right:''
    },
    events: 'load.php',
    selectable:true,
    displayEventTime: false,
    selectHelper:true,
    defaultDate: moment().add(-1, 'month'),
    showNonCurrentDates: false,
    select: function(start, end, allDay)
    {
     var title = prompt("Enter Holiday Type");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
       url:"insert.php",
       type:"POST",
       data:{title:title, start:start, end:end},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Holiday Update');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Holiday Updated");
      }
     });
    },

    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Holiday Removed");
       }
      })
     }
    },

   });
  });
   
  </script>

 </head>
 <body>



            <div id="calendar2"></div>


 </body>
</html>
