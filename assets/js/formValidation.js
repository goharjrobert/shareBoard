function validate(){
    var valid = false;
    var form = document.forms["registerForm"];
    var name = form['name'].value;
    alert(name);
    var email = form['email'].value;
    var password = form['password'].value;
    var passwordConfirm = form['confirm-password'].value;

    if (name === "" || email === "" || password === "" || passwordConfirm === "") {
        alert("Please make sure all fields are filled out");
    } else{
        if(password === passwordConfirm){
            valid = true;
        }
        else{
            alert('Please make sure passwords are the same');
        }
    }

    return valid;
}