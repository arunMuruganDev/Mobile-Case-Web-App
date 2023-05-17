const btn = document.getElementById("btn")

btn.addEventListener("click",e =>{

    e.preventDefault()

    const name = document.getElementById("name").value
    const password = document.getElementById("password").value


    if(!name)
    {
        swal("OOPS!","Enter your username!","error")
    }
    
    else if(!password)
    {
        swal("OOPS!","Enter your password!","error")
    
    }
    else{

        $.post("PHP/login.php",{name:name,password:password},function(result){

            if(result=="success")
            {
                swal("Congrats!","Login Successfully completed","success")
                setTimeout(()=>{
                    window.location.href = "index.php"
                },3000)
            }
            else if(result=="error")
            {
                swal("OOPS!","Username or password is incorrect!","error")
            }

        })
    }
    


})