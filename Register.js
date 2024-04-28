//calendar
current_date=new Date();
var date=current_date.getDate();
var month=current_date.getMonth()+1;
var year=current_date.getFullYear();
if(date<10){
    date='0'+date;
}
if(month<10){
    month='0'+month;
    }
var min_Date=year+ "-" +month+ "-" +date;
document.getElementById("dob").setAttribute('max',min_Date);
