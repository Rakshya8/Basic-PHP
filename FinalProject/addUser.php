<?php
Include "connection.php";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['reg-submit'])){
            if(isset($_POST['username'])&&!empty($_POST['username'])){
                if(preg_match('/^[a-zA-Z\s]{6,}$/',$_POST['username'])){
                    $uname=$_POST['username'];
                    $sql="select * from users where username='$uname'";
                    $result=mysqli_query($connection, $sql);
                    $row=mysqli_fetch_assoc($result);
                    if($row>0){
                        $_SESSION['usere']="The username is already taken please enter another email";
                    }
                    else{
                        $username=$_POST['username'];
                    }
                }
                else{
                    $_SESSION['error']="Please enter a username of length more than 6 and contains letters";
                }
            }
            else{
                $usere="Please enter a username";
            }
            if(isset($_POST['fname'])&&!empty($_POST['fname'])){
                $fname=htmlspecialchars($_POST['fname']);
            }
            else{
                $ferror="Please enter your first name";
            }
            if(isset($_POST['lname'])&&!empty($_POST['lname'])){
                $lname=htmlspecialchars($_POST['lname']);
            }
            else{
                $lerror="Please enter your last name";
            }
            if(isset($_POST['email'])&&!empty($_POST['email'])){
                if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                    $mail=htmlspecialchars($_POST['email']);
                    $query="select * from users where email='$mail'";
                    $result=mysqli_query($connection, $query);
                    if($row=mysqli_fetch_assoc($result)){
                        $eerror="The email is already taken please enter another email";
                    }
                    else{
                        $email=$_POST['email'];
                    }
                }
                else{
                    $eerror="Please enter a valid email";
                }
            }
            else{
                $eerror="Enter your email";
            }
            if(isset($_POST['password'])&&!empty($_POST['password'])){

                $uppercase = preg_match('@[A-Z]@', $_POST['password']);
                $lowercase = preg_match('@[a-z]@', $_POST['password']);
                $number    = preg_match('@[0-9]@', $_POST['password']);
                if(!$uppercase || !$lowercase || !$number || strlen($_POST['password'])<8){
                    $passe="Please enter a password of length more than 8 containing at least an upper case letter, a number";
                }
                else{
                    $password=htmlspecialchars($_POST['password']);
                    $fpassword=sha1(htmlspecialchars($_POST['password']));
                }
            }
            else{
                $passe="Please enter a password";
            }
            if(isset($_POST['repassword'])&&!empty($_POST['repassword'])){
                if($_POST['repassword']!=$password){
                    $repass="The passwords do not match";
                }
            }
            else{
                $repass="You need to enter the password twice";
                exit();
            }
            if(isset($_POST['dob'])&&!empty($_POST['dob'])){
                $birthDate = explode("-", $_POST['dob']);
                //get age from date or birthdate
                $age = date("Y")-$birthDate[0];
                if($age>18){
                    $dob=$_POST['dob'];
                }
                else{
                    $dobe="You need to be more than 18 to use the site";
                }
            }
            else{
                $dobe="Please enter your date of birth";
            }
            if(isset($_POST['gender'])&&!empty($_POST['gender'])){
                $gender=$_POST['gender'];
            }
            else{
                $gene="Please specify a gender";
            }
            if(isset($_POST['range'])&&!empty($_POST['range'])){
                $range=$_POST['range'];
            }
            else{
                $agee="Please specify an age range";
            }
            if(!isset($_POST['terms'])){
                $terme=$_POST['terms'];
            }
            if(!isset($_POST['pro'])){
                $proe="Please enter a profile picture";
            }
            else{
                $pro=$_POST['pro'];
            }
            if(isset($username)&&isset($fname)&&isset($lname)&&isset($email)&&isset($fpassword)&&isset($dob)&&isset($gender)&&isset($range)&&isset($_POST['terms'])&&isset($_POST['pro'])){
                insert($username,$fname,$lname,$email,$fpassword,$dob,$gender,$range,$pro,$connection);
            }
        }
    }
    else{
        $serve="Bad Request";
        exit();
    }
    function insert($username,$fname,$lname,$email,$fpassword,$dob,$gender,$range,$pro,$connection){
        $mdcode=rand(1,9999);
        $sql="Insert into users(username, fname,lname, email, password, dob, gender, ranges, mdcode,profile_pic) values('$username','$fname','$lname','$email','$fpassword','$dob','$gender','$range','$mdcode','$pro') ";
        header('location: OTPConfirmation.php');
        if(mysqli_query($connection,$sql)){
            $message="Your OTP code is $mdcode";
            $_SESSION['email']=$email;
            $header="Welcome to Commerce Stop";
            sendmail($email,$message,$header);
        }
        else{
            $_SESSION['msg']="Unable to process the data at the moment";
        }
    }
function sendmail($email,$message,$subject)
{

    require_once('PHPMailer-master/src/PHPMailer.php');
    require_once('PHPMailer-master/src/SMTP.php');
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug  = 2;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "tls";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 587;
    $mail->isHTML(true);
    $mail->AddAddress($email);
    $mail->Username="restrictemode@gmail.com";
    $mail->Password="rheyanmoktan123";
    $mail->SetFrom('rakshyaps01@gmail.com','Commerce Stop');
    $mail->Subject    = $subject;
    $mail->MsgHTML($message);
    if(!$mail->Send())
    {
        $_SESSION['merror']= "Mailer Error: " . $mail->ErrorInfo;


    }
    else{
        $_SESSION['merror']= "Mail sent";
    }

}
