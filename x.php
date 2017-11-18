<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Heart</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">

      <link rel="stylesheet" type="text/css" href="bootstrap-clockpicker.min.css">


  <!-- Template styles -->
  <style rel="stylesheet">
    /* TEMPLATE STYLES */

    main {
      padding-top: 3rem;
      padding-bottom: 2rem;
    }

    .widget-wrapper {
      padding-bottom: 2rem;
      border-bottom: 1px solid #e0e0e0;
      margin-bottom: 2rem;
    }


    .navbar {
      background-color: #53463d;
    }

    footer.page-footer {
      background-color: #53463d;
      margin-top: 2rem;
    }

    .list-group-item.active {
      background-color: #33b5e5;
      border-color: #33b5e5
    }

    .list-group-item:not(.active) {
      color: #222;
    }

    .list-group-item:not(.active):hover {
      color: #666;
    }
    .card {
      font-weight: 300;
    }
    .navbar .btn-group .dropdown-menu a:hover {
      color: #000 !important;
    }
    .navbar .btn-group .dropdown-menu a:active {
      color: #fff !important;
    }
  </style>

</head>

<body>


 <header>

  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

       <li class="nav-item ">
        <a class="nav-link" href="index.html">Home </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="insert.html">Insert </a>
      </li>                 
      <li class="nav-item ">
        <a class="nav-link" href="view_all.html">View </a>
      </li> 

           <li class="nav-item ">
                        <a class="nav-link" href="update_patient.html">Update  </a>
                    </li>
                        <li class="nav-item active">
                        <a class="nav-link" href="view_log.html">View Log <span class="sr-only">(current)</span></a>
                    </li>
                    

    </ul>

  </div>
</div>
</nav>
<!--/.Navbar-->

</header>


<main>

  <!--Main layout-->
  <div class="container">
    <div class="row">



      <!--Sidebar-->
      <div class="col-lg-8">





        <div class="widget-wrapper wow fadeIn" data-wow-delay="0.9s">
          <h4 class="font-bold">Search</h4>
          <br>
          <div class="card">
            <div class="card-body">


              <div class="md-form">
                <input type="text" id="contact" autocomplete="off" class="form-control">
                <label for="form2">Contact</label>
              </div>

              <button id="login" class="btn btn-info">Submit</button>







              <table id="records_table" class="table-responsive table table-striped">
                <tr>
                  <th align="center" width="">Date</th>
                  <th align="center" width="">Time</th>
                  <th align="center" width="">BPM</th>
                  <th align="center" width="">Suhu</th>
                </tr>
              </table>








            </div>
          </div>
        </div>

      </div>
      <!--/.Sidebar-->
    </div>
  </div>
  <!--/.Main layout-->

</main>




<!-- SCRIPTS -->

<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

<!-- Bootstrap dropdown -->
<script type="text/javascript" src="js/popper.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>



<script type="text/javascript" src="bootstrap-clockpicker.min.js"></script>


<script type="text/javascript">
    $('.clockpicker').clockpicker()
    .find('input').change(function(){
        console.log(this.value);
    });

</script>


<script>
  new WOW().init();
</script>



<script type="text/javascript">

  $(document).ready(function(){


    $("#login").click(function () {

      var contact = $('#contact').val();

      $('#records_table').empty();

      $('#records_table').append('<tr>    <th align="center" width="">Date</th><th align="center" width="">Time</th><th align="center" width="">BPM</th><th align="center" width="">Suhu</th></tr>');


      if(contact != ""){
        $.ajax({
         type: "POST",
         crossDomain: true,
         cache: false,
         url:"https://ritech-solution.000webhostapp.com/aridi/select_log.php",
         data: {
          contact:contact
        },
        success: function(response){


        var obj = jQuery.parseJSON(response);
                      localStorage.setItem("id", obj[0].id);


          var trHTML = '';
          $.each(obj, function (key,value) {
             trHTML += 
             '<tr><td>' + value.tarikh + 
             '</td><td>' + value.masa + 
             '</td><td>' + value.bpm + 
             '</td><td>' + value.suhu + 
             '</td></tr>';     
         });

          $('#records_table').append(trHTML);


        }
      });
      }
    });


  });


</script>







<script type="text/javascript">

 $(document).on('click', '.cancel', function() { 

  $.ajax({
   type: "POST",
   crossDomain: true,
   cache: false,
   url:"https://ritech-solution.000webhostapp.com/aridi/delete.php",
   data: {
    id:this.id
  },
  success: function(){

       // alert("Data has delete..");

       window.parent.location.href="index.html";
}



});
});

</script>






<script type="text/javascript">
    $(document).ready(function()
    {
     $("#insert").click(function(){

       var tarikh = $("#tarikh").val();
       var masa = $("#masa").val();
       var suhu = $("#suhu").val();
       var bpm = $("#bpm").val();
var id = localStorage.getItem("id");


  $.ajax({
     type: "POST",
     url:"https://ritech-solution.000webhostapp.com/aridi/update.php",
     data: {
      tarikh:tarikh,
      masa:masa,
      suhu:suhu,
      bpm:bpm,
      id:id
    },
    crossDomain: true,
    cache: false,
        dataType: 'text',
    complete: function(){


        alert("Success..");
   window.parent.location.href="index.html";


    }

  });

   });
 });
</script>



<script type="text/javascript">

  $(document).ready(function(){

   $(document).on('click', '.edit', function() { 
     window.parent.location.href="edit.html";
   });
 });


</script>


</body>

</html>
