const mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

const btn = document.getElementById("btn")

btn.addEventListener("click",e =>{

    e.preventDefault()

    const name = document.getElementById("name").value
    const email = document.getElementById("email").value
    const password = document.getElementById("password").value


    if(name.length<5)
    {
        swal("OOPS!","Username must have atleast 5 characters!","error")
    }
    else if(!email.match(mailformat))
    {
        swal("OOPS!","Invalid email address!","error")
    }
    else if(password.length<6)
    {
        swal("OOPS!","Password must have atleast 6 characters!","error")
    
    }
    else{

        $.post("PHP/signup.php",{name:name,email:email,password:password},function(result){

            if(result=="success")
            {
                swal("Congrats!","Registration successfully completed","success")
                setTimeout(()=>{
                    window.location.href = "login.html"
                },3000)
            }
            else if(result=="error")
            {
                swal("OOPS!","Email address already exist","error")
            }

        })
    }
    


})