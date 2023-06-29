var today = new Date();
var dd = today.getDate();
var mm = today.getMonth();
var yyyy = today.getFullYear();
var tomorrow = new Date();
var tdd = today.getDate();
var maxdate = new Date();
var maxmm = today.getMonth();
var maxdd = today.getDate();

if (dd < 10) {
    dd = '0'+dd;
}

if (mm < 10) {
    mm = '0'+ mm;
}

tdd = tdd + 1;

if (tdd < 10) {
    tdd = '0'+tdd;
}

maxmm = maxmm + 6;

if (maxmm <10) {
    maxmm = '0'+maxmm;
}

maxdd = maxdd + 1;



today = yyyy + '-' + mm + '-' + dd;
tomorrow = yyyy + '-' + mm + '-' + tdd;
maxdate = yyyy + '-' + maxmm + '-' + maxdd;
document.getElementById("arrival_date").setAttribute("min", today);
document.getElementById("departure_date").setAttribute("min", tomorrow);
document.getElementById("arrival_date").setAttribute("max", maxdate);
document.getElementById("departure_date").setAttribute("max", maxdate);
if(document.getElementById("arrival_date").value == '') {
    document.getElementById("arrival_date").setAttribute("value", today);
}
if(document.getElementById("departure_date").value == '') {
    document.getElementById("departure_date").setAttribute("value", tomorrow);
}
