<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['submit']))
    {
        $v_username = $_POST['username'];
        $v_email = $_POST['email'];
        $v_password = $_POST['password'];
        $v_city = (isset($_POST['city']))?($_POST['city']):'';
        $v_gender = (isset($_POST['gender']))?($_POST['gender']):'';
        $v_term = (isset($_POST['term']))?($_POST['term']):'';

        function validation($form_data)
        {
            $form_data= trim(stripcslashes(htmlspecialchars($form_data)));
            return $form_data;
        }
        $username= validation($v_username);
        $email= validation($v_email);
        $password= validation($v_password);
        $username_error = $email_error = $password_error = $city_error = $gender_error = $term_error = $file_error = "";
        if(!preg_match("/^[a-zA-Z ]*$/",$username))
        {
            $username_error = "Invalid Username";
        }
        if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email))
        {
            $email_error="Invalid Email Address";
        }
        /*if(!preg_match("(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}"),$password)
        {
            $password_error = "Invalid Password";
        }*/
        if(!$city == 'selected')
        {
            $city_error = "Please Select City";
        }
        if(!$gender == 'checked')
        {
            $gender_error = "Please Select Gender";
        }
        if(!empty($username) &&!empty($email) && !empty($password) && !empty($city) && !empty($gender) && !empty($term))
        {
            $msg="Validation is completed";
        }
    }
}
global $city,$gender,$term;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register User</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    </style>

<body>
<div class="container .text-light">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-12 col-lg-5 box-set mt-3">
            <h1 class="text-center mb-3">Register Now</h1>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                 <label>User Name *</label>
                 <input type="text" name="username" placeholder="Enter Name" class="form-control" value="<?php echo @$_POST['username']; ?>">
                 <span style="color:red;"><?php echo @$username_error; ?></span>
                </div>

                <div class="form-group">
                 <label>User Email *</label>
                 <input type="Email" name="email" placeholder="Enter Email" class="form-control" value="<?php echo @$_POST['email']; ?>"> 
                 <span style="color:red;"><?php echo @$email_error; ?></span>
                </div>

                <div class="form-group">
                 <label>User Password *</label>
                 <input type="Password " name="password" placeholder="********" class="form-control" value="<?php echo @$_POST['password']; ?>">
                 <span style="color:red;"><?php echo @$password_error; ?></span>
                </div>

                <div class="form-group">
                <label>City *</label>
                <select class="form-control" name="city">
                    <option value="" <?php if($city == ""){echo "selected";} ?> >Select</option>
                    <option value="Mumbai" <?php if($city == "Mumbai"){echo "selected";} ?> >Mumbai</option>
                    <option value="Pune" <?php if($city == "Pune"){echo "selected";} ?> >Pune</option>
                    <option value="Kolhapur" <?php if($city == "Kolhapur"){echo "selected";} ?> >Kolhapur</option>
                    <option value="Surat" <?php if($city == "Surat"){echo "selected";} ?> >Surat</option>
                    <option value="Rajkot" <?php if($city == "Rajkot"){echo "selected";} ?> >Rajkot</option>
                    </select>
                    <span style="color:red;"><?php echo @$city_error; ?></span>
                </div>

                <div class="form-group">
                <label>Gender:-</label>
                <input type="radio" name="gender" value="Male" <?php if($gender == "Male"){echo "checked";} ?> >Male
                <input type="radio" name="gender" value="Female" <?php if($gender == "Female"){echo "checked";} ?> >Female
                <input type="radio" name="gender" value="Other" <?php if($gender == "Other"){echo "checked";} ?> >Other<br>
                <span style="color:red;"><?php echo @$gender_error; ?></span>
                </div>


<div class="form-group">
    <label>Profile picture:-</label>
    <input type="file" name="file"><br>
    <span style="color: red;"><?php echo @$file_error; ?></span>
</div>

<input type="checkbox" name="term" value="agree" <?php if($term=="agree"){ echo "checked";} ?> > I Follow All Term And Condition<br>
<span style="color:red;"><?php echo @$term_error; ?></span>
<h3 style="color:green; text-align:center; margin-top:5px;"><?php echo @$msg; ?></h3>
    <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-danger mt-3 w-100"><br>
    </form>
    </div>
    </div>
    </div>
    


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</head>
</html>