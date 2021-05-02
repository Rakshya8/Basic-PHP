<html>
<head>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="js/form.js"></script>

</head>
<body>
<div class="container justify-content-center">
    <form data-toggle="validator" role="form"
          class="form-group has-error has-feedback justify-content-center"
          method="post" onsubmit="return validate()" action="addUser.php">
        <div class="container justify-content-center">
            <div class="row justify-content-center">
                <div class="col-sm-10 justify-content-center" style="top: 30%">
                    <h3 class='text-center' style="margin-top: 5%" >Register Now</h3>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-bottom: 5%">
                <div class="col-sm-5 justify-content-center" id="field">
                <span class="error"> <?php if(isset($ferror))
                        echo "*".$ferror;?> </span>
                    <input type="text" name="fname" placeholder="First Name" id="fname"
                           value="<?php if(isset($fname)){
                               echo $fname;
                           } ?>"
                           onchange="valid_fname()" size="25%"class="inline-fields" required>
                </div>
                <div class="col-sm-5" id="field">
                    <span class="error"><?php if(!empty($lerror))
                            echo "*".$lerror;?> </span>
                    <input type="text" name="lname" placeholder="Last Name" id="lname"
                           value="<?php if(isset($lname)){
                               echo $lname;
                           }?>"
                           onchange="valid_lname()" class="inline-fields" size="28" required>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-bottom: 5%">
                <div class="col-sm-5 justify-content-center" id="field">
                    <span class="input-group-append">
                        <input type="text" name="username" placeholder="Username"
                               size="25%" class="inline-fields" id="username"
                               value="<?php if(isset($username)){
                                   echo $username;
                               }?>"
                               onchange="return check_username()" required>
                <label class="float-right" for="Username">
                    <i class="bi bi-person-fill" id="icon"></i>
                </label>
                    </span>
                </div>
                <div class="col-sm-5 justify-content-center" id="field">
                    <small id="userText" class="text">Must of length greater then 6</small>
                    <span class="text-danger col-sm-4"><?php if(!empty($usere)){
                            echo'<small class="errorText">
    <label class="control-label" for="inputError">';
                            echo "*".$usere.'</label></small>';
                        } ?> </span>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-5 justify-content-center" id="field">
                <span class="input-group-append">
                    <input type="email" name="email" placeholder="Email ex:ex@ex.com"
                           onchange="validate_email()" id="email"
                           value="<?php if(isset($_POST['email'])){
                               echo $_POST['email'];
                           }?>"
                           class="inline-fields" size="25%" required>
                    <label for="Email">
                    <i class="bi bi-envelope-fill" id="icon"></i>
                </label>
                    </span>


                </div>
                <div class="col-sm-5 justify-content-center" id="field">
                    <small class="text" id="emailText">
                        Please enter a valid email address.
                        <br>We wont share with anyone.</small>
                    <span class="text-danger col-sm-4 "><?php if(!empty($eerror)){
                            echo'<small class="errorText">
    <label class="control-label" for="inputError">';
                            echo "*".$eerror.'</label></small>';
                        } ?> </span>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-5 justify-content-center"id="field">
                <span class="input-group-append">
                    <input type="password" name="password" placeholder="Password" id="pass"
                           onchange="check_password()"
                           class="inline-fields" id="confirmPassword" size="25%" required>
                    </span>
                </div>

                <div class="col-sm-5 justify-content-center"id="field">
                    <small class="text" style="color: #6c757d" id="passText">
                        Must be of length more than 8 containing at
                        least an upper case letter and a number</small>
                    <span class="text-danger col-sm-4"><?php if(!empty($passe)){
                            echo'<small class="errorText">
    <label class="control-label" for="inputError">';
                            echo "*".$passe.'</label></small>';
                        } ?> </span>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-5 justify-content-center" id="field">
                <span class="input-group-append">
                    <input type="password" placeholder="Retype Password" name="repassword"
                           size="25%" id="repass" onchange="check_pass()"
                           class="inline-fields" required>
                    </span>
                </div>
                <div class="col-sm-5 justify-content-center" id="field">
                    <small class="text" id="repassText">Must match the above typed password</small>
                    <span class="text-danger col-sm-4"><?php if(!empty($repass)){
                            echo'<small class="errorText">
    <label class="control-label" for="inputError">';
                            echo "*".$repass.'</label></small>';
                        } ?> </span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-5 justify-content-center" id="field">
                    <input type="date" onchange="checkAge()"
                           value="<?php if(isset($_POST['dob'])){
                               echo $_POST['dob'];
                           }?>"
                           class="finline-fields" id="dob"
                           name="dob" required>'
                </div>
                <div class="col-sm-5 justify-content-center" id="field">
                    <small class="text" id="dobText">You need to be above 18 to use the site</small>
                    <span class="text-danger col-sm-4"><?php if(!empty($dobe)){
                            echo'<small class="errorText">
    <label class="control-label" for="inputError">';
                            echo "*".$dobe.'</label></small>';
                        } ?> </span>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-bottom: 5%">
                <div class="col-sm-5 justify-content-center" id="field">
                    <p>Gender</p>
                </div>
                <div class="col-sm-5 justify-content-center" id="field">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" class="form-control form-control-sm"
                               name="gender" id="inlineRadio1"
                               <?php if(isset($gender)=="Female"){
                                   echo "checked";
                               }?>
                               value="Female" required>
                        <label class="form-check-label" for="inlineRadio1">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" class="form-control form-control-sm"
                               type="radio" name="gender" id="inlineRadio1"
                            <?php if(isset($gender)=="Male"){
                                echo "checked";
                            }?>
                               value="Male">
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                        <span class="text-danger col-sm-4"><?php if(!empty($gene)){
                                echo'<small class="errorText">
    <label class="control-label" for="inputError">';
                                echo "*".$gene.'</label></small>';
                            } ?> </span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-bottom: 5%">
                <div class="col-sm-5 justify-content-center" id="field">
                    <p>Age Range</p>
                </div>
                <div class="col-sm-5 justify-content-center" id="field">
                    <select name="range" class="form-select form-select-sm" required>

                        <option value="" selected disabled>Select Range</option>
                        <option value="18-25"
                            <?php if(isset($range)=="18-25"){
                                echo "selected";
                            }?>>18-25</option>
                        <option value="26-40"
                            <?php if(isset($range)=="26-40"){
                                echo "selected";
                            }?>
                        >26-40</option>
                        <option value="40+"
                            <?php if(isset($range)=="40+"){
                                echo "selected";
                            }?>
                        >40+</option>

                    </select>
                    <span class="text-danger col-sm-4"><?php if(!empty($gene)){
                            echo'<small class="errorText">
    <label class="control-label" for="inputError">';
                            echo "*".$gene.'</label></small>';
                        } ?> </span>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-bottom: 5%">
                <div class="col-sm-5 justify-content-center" id="field">
                    <p>Profile Picture</p>
                </div>
                <div class="col-sm-5 justify-content-center" id="field">
                   <input type="file" name="pro">
                    <span class="text-danger col-sm-4"><?php if(!empty($gene)){
                            echo'<small class="errorText">
    <label class="control-label" for="inputError">';
                            echo "*".$gene.'</label></small>';
                        } ?> </span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-5 justify-content-center" id="field">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="terms" value="Yes"
                               <?php if(!isset($terme)){
                                   echo "checked";
                               }?>
                               required>
                        <label class="form-check-label">Agree to Terms and Conditions</label>
                    </div>
                </div>
                <div class="col-sm-5 justify-content-center" id="field">
                    <small class="text" id="repassText">
                        You need to agree to the terms and conditions to proceed
                    </small>
                    <span class="text-danger col-sm-4"><?php if(!empty($terme)){
                            echo'<small class="errorText">
    <label class="control-label" for="inputError">';
                            echo "*".$terme.'</label></small>';
                        } ?> </span>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <input type="submit" onclick="valid()"
                           class="btn btn-success" name="reg-submit" value="Submit" id="button">

                </div>
        </div>
            <div class="row justify-content-center">
                <div class="col-sm-5 text-center">
                    <small style="font-size: small">Already a user? </small><a href="login.php" style="font-size: small; text-decoration: none; color: black">Log in</a>
                </div>
            </div>


    </form>
</div>
</body>
</html>
