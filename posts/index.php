
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="../js/postAjax.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>Show Post</title> 
    <style>
      .dataTables_length {
        padding:20px 0  !important;
      
      }
      .show-table{
        display:flex;
      }
    </style>
</head>
<body>
  <div class="container">
      <h1>Show Posts</h1>
       <div style="margin-right: 10px;"> 
                <a  href="/insert.php" type="button" class="btn btn-primary add">add</a>
        </div>
    <table class="table table-bordered row-border hover" style="text-align:center;" id="loadData"  width="100%">
        <div id="noti"></div>
         <thead >
            <tr>
                <th style=" width: 5%" scope="col">id</th>
                <th style=" width: 15%" scope="col">title</th>
                <th style=" width: 10%" scope="col">date</th>              
                <th style=" width: 50%" scope="col">Content</th>
                <th style=" width: 5%" scope="col">status</th>
                <th style=" width: 15%" scope="col">&nbsp;</th>
            </tr>
         </thead>
        <tbody id="load">
   <?php
            include('../mysql/connect.php');
            $sql = "SELECT * FROM posts order by id asc";
            $result = mysqli_query($conn,$sql);
            $stt = 0;
            while($row = mysqli_fetch_array($result)) {
                $stt += 1;
          ?>
            <tr id="id<?php echo $row['id'] ?>" >
                <td ><?php echo $stt?></td>
                <td data-target="title" ><?php echo $row['title']; ?></td>  
                <td data-target="date" ><?php echo $row['date']; ?></td>
                <td data-target="content" ><?php echo $row['content'];?></td>
                <td data-target="status" ><?php echo $row['status']; ?></td>
              
                <td class="btn-post" style="text-align:left; display:flex; "> 
                    <div style="margin-right: 10px;">
                      <button class ="btn btn-warning edit-post" 
                        id="<?php echo $row['id'];?>"
                        style="padding-left: 3px;">edit</button>
                    </div>
                    <div>
                        <button class ="btn btn-danger delete-post"  value="<?php echo $row['id']; ?>" >delete</button>
                    </div>
                </td>
            </tr>
        <?php 

        } mysqli_close($conn);
        
?>
        </tbody>
    </table>
  </div>

<!-- Modal edit -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Post Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="info-upload">
  
      </div>
     
    </div>
  </div>
</div>
   <script>
    $(document).ready(function(){
         $('#loadData').DataTable(

         );
         
    });
   </script>
</body>
</html>