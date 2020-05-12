
<!DOCTYPE html>
<html>
 <head>
  <title>Calandar</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="../css/nav.css">
  
  <script type="text/javascript" src="../js/nav.js"></script>

  <link rel="stylesheet" href="lib/fullcalender.css" />
  <script src="lib/jquery.min.js"></script>
  <script src="lib/jquery-ui.min.js"></script>
  <script src="lib/moment.min.js"></script>
  <script src="lib/fullcalendar.min.js"></script>
  
  <script>
  
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
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


    eventClick:  function(event, jsEvent, view) {
            $('#modalTitle').html(event.title);
            $('#modalBody').html(event.description);
            $('#eventUrl').attr('href',event.url);
            $('#calendarModal').modal();
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

  <div>
      <?php include '../navigation.php';?>
    </div>


  <br />
  
  <br />
  <div class="container">

    <center>
      
      <?php if (isset($_SESSION['messageholi'])): ?>
      <div class="alert alert-success text-center" role="alert">
        <?php 
          echo $_SESSION['messageholi']; 
          unset($_SESSION['messageholi']);
        ?>
      </div>
    <?php endif ?>
    </center>

      <div class="row">
      

        <div class="col-md-4">
        <?php include 'Calender2/Calender2.php';?>
        </div>

        <div class="col-md-4">
        
        <div id="calendar"></div>
        <br>
        <center>
        <a href="../holidayAdder.php"  class="btn btn-primary btn1 float-right" >Add Holiday</a>
        <button type="button" id="my-prev-button" class="btn btn-light"><</button>
        <button type="button" id="my-next-button" class="btn btn-light">></button>
         </center>  
        </div>

        <div class="col-md-4">
        <?php include 'Calender3/Calender3.php';?>

       
           
        </div>
       
      </div>

      <div class="row">


<div class="col-md-4">
 
   </div>

   <div class="col-md-4">
   
 
      
   </div>

   <div class="col-md-4">
  <br>
 
  
  
      
   </div>

   
</div>

    

  </div>

  
<script >

  $('#my-prev-button').click(function() {
  $('#calendar').fullCalendar('prev');
  $('#calendar2').fullCalendar('prev');
  $('#calendar3').fullCalendar('prev');
});

  $('#my-next-button').click(function() {
  $('#calendar').fullCalendar('next');
  $('#calendar2').fullCalendar('next');
  $('#calendar3').fullCalendar('next');
});

</script>

 </body>
</html>
