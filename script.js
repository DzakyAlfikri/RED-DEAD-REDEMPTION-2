let yuser = document.getElementById("yuser");
let karakterr = document.getElementById("karakterr");
let misyen = document.getElementById("misyen");
let loggg = document.getElementById("loggg");

yuser.addEventListener("click",function(){
    window.location.href = 'dashboard.php';
});

karakterr.addEventListener("click",function(){
    window.location.href = 'dashboardkarakter.php';
});

misyen.addEventListener("click",function(){
    window.location.href = 'dashboardstory.php';
});

loggg.addEventListener("click",function(){
    window.location.href = 'logout.php';
});