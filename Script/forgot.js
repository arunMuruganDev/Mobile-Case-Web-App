const btn = document.getElementById("btn")

btn.addEventListener("click",e =>{

    e.preventDefault()

    const email = document.getElementById("email").value
    const password = document.getElementById("password").value
    const cpassword = document.getElementById("cpassword").value


    if(!email)
    {
        swal("OOPS!","Enter your email!","error")
    }
    
    else if(password.length<6)
    {
        swal("OOPS!","Password must have atleast 6 characters!","error")
    
    }
    else if(password!=cpassword)
    {
        swal("OOPS!","Confirm password not matched!","error")
    }
    else{

        $.post("PHP/forgot.php",{email:email,cpassword:cpassword},function(result){

            // alert(result)
            if(result=="success")
            {
                swal("Congrats!","Password Updated Successfully","success")
                setTimeout(()=>{
                    window.location.href = "login.html"
                },3000)
            }
            else if(result=="error")
            {
                swal("OOPS!","Email id does not exist!","error")
            }

        })
    }
    


})