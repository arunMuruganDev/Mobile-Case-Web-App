const btn = document.querySelector("#btn")

btn.addEventListener("click",e => {

    e.preventDefault()

    const name = document.getElementById("name").value 
    const mobile = document.getElementById("mobile").value 
    const address = document.getElementById("address").value 

    if(!name)
    {
        swal("OOPS!","Enter your name","error")
       
    }
    else if(mobile.length<10 || mobile.length>10)
    {
        swal("OOPS!","Enter a valid mobile number","error")
       
    }
    else if(!address)
    {
        swal("OOPS!","Enter your address","error")
       
    }
    else
    {

       
        // alert("hi")
        const pid = document.getElementById("pid").value;
        $.post("confirmOrder.php",{pid:pid,name:name,mobile:mobile,address:address},function(result){

            if(result=="success")
            {
                swal("Congrats!","Order Placed Successfully","success")
                setTimeout(()=>{
                    window.location.href = "account.php"
                },3000)
            }
            else if(result=="error")
            {
                swal("OOPS!","Order Not Placed","error")
            }
            else if(result=="none")
            {
                swal("OOPS!","Out Of Stock","error")
            }

        })
    }


})