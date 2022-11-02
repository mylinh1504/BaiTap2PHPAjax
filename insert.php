<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <title>Post</title>
    <style>
      .has-error {
          color: red;
        }
    </style>

  </head>
  <body>
    <div class="container">
      <div class="row row-post">
        <div class="col-xl-6">
          <h3 style="text-align:center;">INSERT BÀI VIẾT</h3>
          <form action="" method="POST" id="form-post">
           
            <div class="form-group" id="title-group">
              <label for="title">Title Post:</label>
              <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                placeholder="enter title post"
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
              />
              <p id="err-date"></p>
            </div>
            <div class="form-group" id="content-group">
              <label for="content">Content Post:</label>
              <textarea class="form-control" id="content" name="content" rows="3"></textarea>
               <p id="err-content"></p>
            </div>
            <div class="form-group">
              <label>Status:</label>
              <div class="check">
               <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status" value="0" checked>
                    <label class="form-check-label" for="status">
                      normal
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status" value="1">
                    <label class="form-check-label" for="status">
                      Hide
                    </label>
                </div>
              </div>
            </div>
            <div class="form-group" >
                <button type="submit" class="btn btn-primary" id="load">Submit</button>
            </div>
          </form>
          
        </div>
      </div>
    </div>
    <script src="app.js"></script>
  </body>
</html>
