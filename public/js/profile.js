var profile1 = document.getElementById("profile");
var sec = document.getElementById("sec");

function profile()
{
    profile1.classList.add("active");
    
}
window.onclick = function(event){
    if(event.target == sec)
    {
        profile1.classList.remove("active");
    }
}