  <?php
  include('../mysql/connect.php');
            $sql = "SELECT * FROM posts order by id asc";
            $result = mysqli_query($conn,$sql);
            $stt = 0;
            while($row = mysqli_fetch_array($result)) {
                $stt += 1;
               
          ?>
            <tr id="loadData<?php echo $row['id'] ?>" >
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

    echo json_encode($show);   
?>
   