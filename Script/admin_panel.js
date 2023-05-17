const first = () =>{
    document.querySelector(".first").style.display="block"
    document.querySelector(".second").style.display="none"
    document.querySelector(".third").style.display="none"
    document.querySelector(".fourth").style.display="none"
}

// Second
const second = () =>{
    document.querySelector(".first").style.display="none"
    document.querySelector(".second").style.display="block"
    document.querySelector(".third").style.display="none"
    document.querySelector(".fourth").style.display="none"
}

// Third
const third = () =>{
    document.querySelector(".first").style.display="none"
    document.querySelector(".second").style.display="none"
    document.querySelector(".third").style.display="block"
    document.querySelector(".fourth").style.display="none"
}

// fourth
const fourth = () =>{
    document.querySelector(".first").style.display="none"
    document.querySelector(".second").style.display="none"
    document.querySelector(".third").style.display="none"
    document.querySelector(".fourth").style.display="block"
}

// alert("hi")
const btn = document.getElementById("btn")

btn.addEventListener("submit",e=>{

    e.preventDefault()

    alert("Hello ")

})