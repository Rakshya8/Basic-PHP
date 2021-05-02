var eno;
function check_username(){
    var g=document.getElementById("username").value;
    if(g.length<6){
        document.getElementById("username").
            style.borderBottomColor= "red";
        document.getElementById("username").
            style.borderBottomWidth="3px";
        document.getElementById("userText").style.color="red";
        eno++;
    }
    else{
        document.getElementById("username").style.borderBottomColor="green";
        document.getElementById("username").
            style.borderBottomWidth="3px";
        document.getElementById("userText").style.color="green";
    }

}
function check_password(){
    var p=document.getElementById("pass").value;
    var containsDigits = /[0-9]/.test(p)
    var containsUpper = /[A-Z]/.test(p)
    var containsLower = /[a-z]/.test(p)
    if(p.length>8 && containsDigits&&containsLower&&containsUpper){
        document.getElementById("pass").style.borderBottomColor="green";
        document.getElementById("pass").
            style.borderBottomWidth="3px";
        document.getElementById("passText").style.color="green";

    }
    else{
        document.getElementById("pass").style.borderBottomColor="red";
        document.getElementById("pass").
            style.borderBottomWidth="3px";
        document.getElementById("passText").style.color="red";
        eno++;
    }


}
function check_pass(){
    var pwd=document.getElementById("pass").value;
    var rpwd=document.getElementById("repass").value;
    if(pwd==rpwd){
        document.getElementById("repass").style.borderBottomColor="green";
        document.getElementById("repass").
            style.borderBottomWidth="3px";
        document.getElementById("repassText").style.color="green";
    }
    else{
        document.getElementById("repass").style.borderBottomColor="red";
        document.getElementById("repass").
            style.borderBottomWidth="3px";
        document.getElementById("repassText").style.color="red";
        eno++;
    }
}
function checkAge(){
    var userDate=document.getElementById("dob").value;
    var eDate=new Date(userDate);
    var year=eDate.getFullYear();
    var date=new Date();
    var yearDate=date.getFullYear()
    age=yearDate-year;
    console.log(age);
    if(age>18){
        document.getElementById("dob").style.borderBottomColor="green";
        document.getElementById("dob").
            style.borderBottomWidth="3px";
        document.getElementById("dobText").style.color="green";
    }
    else{
        document.getElementById("dob").style.borderBottomColor="red";
        document.getElementById("dob").
            style.borderBottomWidth="3px";
        document.getElementById("dobText").style.color="red";
        eno++;
        console.log(eno);
    }
}
function validate_email(){
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var e=document.getElementById("email").value;
    if(e.match(mailformat)){
        document.getElementById("email").style.borderBottomColor="green";
        document.getElementById("email").
            style.borderBottomWidth="3px";
        document.getElementById("emailText").style.color="green";
    }
    else{
        document.getElementById("email").style.borderBottomColor="red";
        document.getElementById("email").
            style.borderBottomWidth="3px";
        document.getElementById("emailText").style.color="red";
        eno++;

    }
}
function valid_fname(){
    var f=document.getElementById("fname").value;
    if(fname!=null){
        document.getElementById("fname").style.borderBottomColor="green";
        document.getElementById("fname").
            style.borderBottomWidth="3px";
    }
    else{
        document.getElementById("fname").style.borderBottomColor="red";
        document.getElementById("fname").
            style.borderBottomWidth="3px";
        eno++;
    }
}
function valid_lname(){
    var f=document.getElementById("lname").value;
    if(fname!=null){
        document.getElementById("lname").style.borderBottomColor="green";
        document.getElementById("lname").
            style.borderBottomWidth="3px";
    }
    else{
        document.getElementById("lname").style.borderBottomColor="red";
        document.getElementById("lname").
            style.borderBottomWidth="3px";
        eno++;
    }
}
function valid(){
    if(eno>0){
        alert("Please check the errors");
        return false;
    }
    else{
        return true;
    }

}