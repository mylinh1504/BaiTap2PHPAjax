<?php
  include('../mysql/connect.php');

  

  if(isset($_POST["id"])){

    $postid = $conn->real_escape_string($_POST["id"]);
    $sql = "SELECT *FROM posts WHERE `id` = ".$postid;
    $result = mysqli_query($conn,$sql);
      while($rows = mysqli_fetch_array($result)){
        ?>
          <form action="" method="POST" id="edit-form">
              <div class="form-group" id="title-group">
                <label for="title">Title Post:</label>

                <input
                  type="text"
                  class="form-control"
                  id="title"
                  name="title"  
                  placeholder="enter title post"
                  value="<?php echo $rows['title'] ?>"
            />

              <p id="err-title"></p>
              </div>
              <div class="form-group" id="date-group">
                <label for="date">Date Post:</label>
                <input
                  type="date"
                  class="form-control"
                  id="date"
                  name="date"
                  placeholder="year-mouth-day"
                  value="<?php echo $rows['date'] ?>"
                />
                <p id="err-date"></p>
              </div>
              <div class="form-group" id="content-group">
                <label for="content">Content Post:</label>
                <textarea class="form-control" id="content" name="content" rows="3" ><?php echo $rows['content'] ?></textarea>
                <p id="err-content"></p>
              </div>
              <div class="form-group">
                <label>Status:</label>
                <div class="check">
                <div class="form-check">

                      <input class="form-check-input" type="radio" name="status" id="status" value="0"  <?php if ($rows['status'] == 0 ){
                    echo "checked";}?>  >
                      <label class="form-check-label" for="status">
                        normal
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="status" value="1"<?php if ($rows['status'] == 1 ){
                    echo "checked";} false?> >
                      <label class="form-check-label" for="status">
                        Hide
                      </label>
                  </div>
                </div>
              </div>
          <div class="modal-footer">
            <input type="hidden" id="postId" value="<?php echo ($rows['id'])?>" >
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary save-upload" value="submit">Save edit</button>
          </div>
          </form> 
  
    <?php }
  }
  
  //upload
  if( isset( $_POST["submit"] ) ){
        $title = isset($_POST["title"]) ? $_POST["title"] : '';
        $content = isset($_POST["content"]) ? $_POST["content"] : '';
        $status = isset($_POST["status"]) ? $_POST["status"] : '' ; 
        $date = isset($_POST["date"]) ? $_POST["date"] : '';
        // var_dump($title,$content, $status, $date);
        $sqlupdate = " UPDATE `posts` SET `title`='$title',`content`='$content',`status`='$status', `date`='$date' WHERE `id` = ".$_POST["postId"];
        if (mysqli_query($conn, $sqlupdate)) {
          echo ("update ok");
        } 
        else {
          echo ("fail");
        }
  }

mysqli_close($conn);





    
     
 