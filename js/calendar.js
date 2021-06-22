function day_title(day_name){
    document.write("<td class='text-center' style='width:13%'>"+day_name+"</td>");
}
function fill_table(month,month_length)
{ 
    day=1;
    code_month = new Date().getMonth() + 1;
    document.write("<div class='table-responsive'><table class='table table-bordered'><tr>");
    document.write("<td colspan='7' class='text-center'><h2>"+month+" "+year+"</h2><tr>");
    day_title("Понедельник");
    day_title("Вторник");
    day_title("Среда");
    day_title("Четверг");
    day_title("Пятница");
    day_title("Суббота");
    day_title("Воскресенье");
    document.write("</tr><tr>");
    var tt = 0;
    for (var i=1;i<start_day;i++){
        document.write("<td>");
    }
    for (var i=start_day;i<8;i++){
        document.write("<td class='text-center'>"+'<a href="date.php?month='+code_month+'&day='+day+'&year='+year+'">'+day+"</a></td>");
        day++;
    }
    tt++;
    document.write("<tr>");
    while (day <= month_length) {
        for (var i=1;i<=7 && day<=month_length;i++){
            document.write("<td class='text-center'>"+'<a href="date.php?month='+code_month+'&day='+day+'&year='+year+'">'+day+"</a></td>");
            day++;
        }
        document.write("</tr><tr>");
        tt++;
        start_day=i;
    }
    document.write("</tr></table></div><br />");
}
year= new Date().getFullYear();
today= new Date("Январь 1, "+year);
month = new Date().getMonth() + 1;
ex_date = new Date(year, month-1, 1);
start_day = ex_date.getDay();
if (month == 1) {
    fill_table("Январь",31);
} else if (month == 2) {
    fill_table("Февраль",28);
} else if (month == 3) {
    fill_table("Март",31);
} else if (month == 4) {
    fill_table("Апрель",30);
} else if (month == 5) {
    fill_table("Май",31);
} else if (month == 6) {
    fill_table("Июнь",30);
} else if (month == 7) {
    fill_table("Июль",31);
} else if (month == 8) {
    fill_table("Август",31);
} else if (month == 9) {
    fill_table("Сентябрь",30);
} else if (month == 10) {
    fill_table("Октябрь",31);
} else if (month == 11) {
    fill_table("Ноябрь",30);
} else if (month == 12) {
    fill_table("Декабрь",31);
}