<?php
include('connection.php');
 $query = "SELECT OloshoID, Firstname,Lastname,images FROM olosho";
 $result1 = mysqli_query($conn, $query);

?>
<html>
    <head>
        <title>DataTable </title>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script type="text/javascript"  src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  
    </head>
<body>
    <br><br>
    <div class="table-responsive">
<table id="dataTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Image</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th></th>
        </tr>
    </thead>
    <?php 
      $rows = array();
      while($olosho = mysqli_fetch_array($result1))
      {
            echo'
            <tr>
           <td>'.$olosho["images"].'</td>
           <td>'.$olosho["Firstname"].'</td>
           <td>'.$olosho["Lastname"].'</td>
        
                   ';
      }
     
      
      ?>
</table>
    </div>

      <script type="text/javascript">
$(document).ready(function()
{
  $("#dataTable").DataTable();
  });
</script>
</body>
</html>