
<?php
if(isset($_POST["email"]))
{
    require "connect.php";
    $name =$_POST["name"];
    $email =$_POST["email"];
    $gender =$_POST["gender"];
    $course =$_POST["course"];
    $phone =$_POST["phone"];


    $target_dir = "photos/";
    $random =rand(1000000,5000000);
    $target_file = $target_dir . $random . basename($_FILES["photo"]["name"]);
    if (move_uploaded_file($_FILES["photo"]["tmp_name"],$target_file))
    {
//        save in db

        $stm=$pdo->prepare("INSERT INTO `students`(`id`, `name`, `email`, `phone`, `photo`, `course`, `gender`, `reg_date`) VALUES (?,?,?,?,?,?,?,?)");
        $reg_date = date("y-m-d");
        $stm -> execute([null,$name,$email,$phone,$target_file,$course,$gender,$reg_date]);

    }

    else{

        die("it failed");
    }


}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>register</title>
</head>
<body>

        <?php require "navbar.php"?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-5">
            <div class="card">

              <div class="card-body">

                  <form action="index.php"method="post"enctype="multipart/form-data">

                      <div class="form-group">
                          <label for="full names">full names</label>
                          <input type="text" class="form-control" required name="name"placeholder="full name">
                      </div>


                      <div class="form-group">
                          <label for="email">email</label>
                          <input type="email" class="form-control" required name="email"placeholder="email">
                      </div>


                      <div class="form-group">
                          <label for="phone number">phone number</label>
                          <input type="tel" class="form-control" required name="phone"placeholder="phone number">
                      </div>



                      <div class="form-group">
                          <label for="your photo">your photo</label>
                          <input type="file"accept="image/*" class="form-control-file border" required name="photo"placeholder="photo">
                      </div>

                      <div class="form-group">
                          <label for="">select course</label>
                          <select name="course" id="" class="form-control">
                              <option value="python">python</option>
                              <option value="android">android</option>
                              <option value="PHP">PHP</option>
                              <option value="Kotlin">kotlin</option>
                              <option value="data science">data science</option>

                          </select>
                      </div>
                      <div class="form-check">
                          <label class="form-check-label">
                              <input type="radio" class="form-check-input" value="male" name="gender">male
                          </label>
                      </div>
                      <div class="form-check">
                          <label class="form-check-label">
                              <input type="radio" class="form-check-input" value="female" name="gender">female
                          </label>
                      </div>

                      <button class="btn btn-success">Register</button>

                  </form>
              </div>

            </div>
        </div>

    </div>
</div>





</body>
</html>