/* [Function] ส่วนสำหรับเด้ง Popup เวลากดปุ่ม */

var modal = document.getElementById('myModal');
var btn2 = document.getElementById("myBtn2");

var span = document.getElementsByClassName("close")[0];
btn2.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

