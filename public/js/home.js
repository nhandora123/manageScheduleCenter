
function showDetail() {
    document.getElementById("moreDetailSalary0").classList.toggle("moreDetailSalary");
}

function format() {
    var checking = document.getElementsByClassName('infor');

    for (let index = 0; index < checking.length; index++) {
        result = checking.item(index).getAttribute('checking');

        if (result == 1) {
            checking.item(index).style.backgroundColor = '#348feb';
            checking.item(index).style.color = 'white';
        } else if (result == 2) {
            checking.item(index).style.backgroundColor = '#fa6b6b';
            checking.item(index).style.color = 'white';
        } else {
            checking.item(index).style.backgroundColor = '#bbdafa';
        }
    }
}

getDayForSchedule($("#getDate").val());
startDate();

function startDate() {
    var d = new Date();
    var month = d.getMonth() == 12 ? 1 : d.getMonth() + 1;
    var day = d.getDate();
    month = month > 0 && month < 10 ? "0" + month : month;
    day = day > 0 && day < 10 ? "0" + day : day;
    document.getElementById("getDate").setAttribute("value", d.getFullYear() + "-" + month + '-' + day);
    takeDistrict();
    takeSummary();
    setTimeout(() => {
        takeSalary();
    }, 100);
    setTimeout(() => {
        lineStatus();
    }, 500);
    takeSubjectOfScheduleWeek($("#getDate").val());
}

function p_getDayForSchedule() {
    getDayForSchedule($("#getDate").val());
    takeDistrict();
    takeSummary();
    setTimeout(() => {
        takeSalary()
    }, 100);
    setTimeout(() => {
        lineStatus();
    }, 500);
    takeSubjectOfScheduleWeek($("#getDate").val());
}

function getDayForSchedule(p_getDate) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var person = JSON.parse(this.responseText);
            console.log("abc: " + JSON.stringify(person));
            showSchedule(person);
        }
    }
    xmlhttp.open("GET", "./home/getSchedule?getDate=" + p_getDate, true);
    xmlhttp.send();
}

function getMonthForSchedule() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            var person = JSON.parse(this.responseText);
            showSchedule(person);
        }
    }
    xmlhttp.open("GET", "./home/getScheduleOfMonth?month=" + _getMonth($("#getDate").val()), true);
    xmlhttp.send();
}

function cancel(element, data) {
    data.checking = 2;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {  
        if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "./home/cancel", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("data=" + JSON.stringify(data));
    getDayForSchedule($("#getDate").val());

}

function checking(element, data) {
    data.checking = 1;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "./home/cancel", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("data=" + JSON.stringify(data));
    getDayForSchedule($("#getDate").val());
}

function add() {
    var obj = {
        idClass: $("#idClass").val(),
        nameClass: $("#nameClass").val(),
        numberStudent: $("#numberStudent").val(),
        timeStartTeach: $("#timeStartTeach").val(),
        timeEndTeach: $("#timeEndTeach").val(),
        dateStart: $("#dateStart").val(),
        dateEnd: $("#dateEnd").val(),
        address: $("#address").val(),
        emailTeacher: $("#emailTeacher").val()
    }
    console.log(JSON.stringify(obj));
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "./home/add", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("data=" + JSON.stringify(obj));
    getDayForSchedule($("#getDate").val());

}
var tamp_data;

function deleteButtonClass(element, data) {
    tamp_data = JSON.stringify(data);
    document.getElementById("labelFromDate").innerText = data.dateTeach;
}

function methodDeleteClass() {
    console.log(tamp_data);
    var choose = document.forms["deleteClass"]["delete"].value;
    console.log(choose);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "./home/DeleteSchedule", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("data=" + tamp_data + "&choose=" + choose);
    getDayForSchedule($("#getDate").val());
}
//EDIT CLASS

function editButtonClass(element, data) {
    tamp_data = JSON.stringify(data);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            data = JSON.parse(xmlhttp.responseText);
            document.getElementById("editIdClass").setAttribute("value", data.idClass);
            document.getElementById("editNameClass").setAttribute("value", data.nameClass);
            document.getElementById("editNumberStudent").setAttribute("value", data.numberStudent);
            document.getElementById("editTimeStartTeach").setAttribute("value", data.timeStartTeach);
            document.getElementById("editTimeEndTeach").setAttribute("value", data.timeEndTeach);
            document.getElementById("editDateStart").setAttribute("value", data.dateStart);
            document.getElementById("editDateEnd").setAttribute("value", data.dateEnd);
            document.getElementById("editAddress").setAttribute("value", data.address);
            document.getElementById("editEmailTeacher").setAttribute("value", data.emailTeacher);
        
        }
    }
    xmlhttp.open("POST", "./home/ShowClassById", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("idClass="+ data.idClass);
}

function methodEditClass() {
    var obj = {
        idClass: $("#editIdClass").val(),
        nameClass: $("#editNameClass").val(),
        numberStudent: $("#editNumberStudent").val(),
        timeStartTeach: $("#editTimeStartTeach").val(),
        timeEndTeach: $("#editTimeEndTeach").val(),
        dateStart: $("#editDateStart").val(),
        dateEnd: $("#editDateEnd").val(),
        address: $("#editAddress").val(),
        emailTeacher: $("#editEmailTeacher").val()
    }
    console.log(JSON.stringify(obj));
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "./home/editClass", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("data=" + JSON.stringify(obj));
    getDayForSchedule($("#getDate").val());

}
var manyDistrict;
var manySummary;

function takeDistrict() {
    var d = new Date($("#getDate").val());
    var month = d.getMonth() == 12 ? 1 : d.getMonth() + 1;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function (p_obj) {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp.responseText);
            if (xmlhttp.responseText!="error" ) {
                //console.log();
                manyDistrict = JSON.parse(xmlhttp.responseText);
            }
            else manyDistrict = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "./home/GetScheduleAccordingAddress", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("month=" + month);
}

function takeSummary() {
    var d = new Date($("#getDate").val());
    var month = d.getMonth() == 12 ? 1 : d.getMonth() + 1;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function (p_obj) {
        if (this.readyState == 4 && this.status == 200) {
            if (xmlhttp.responseText != "error")
                manySummary = JSON.parse(xmlhttp.responseText);
            else manySummary = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "./home/GetSalaryAccordingAddress", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("month=" + month);
}
var gl_sumCurrent;

function takeSalary() {
    var outputHtml = "";
    sumCurrent = 0;
    for (i in manyDistrict) {
        sum = 0;
        outputHtml +=
            "<div class='district'>" +
            "<h1>" + manyDistrict[i] + "</h1>" +
            "<div class='content'>";
        for (y in manySummary) {
            if (manyDistrict[i] == manySummary[y].address) {
                manyStudent = manySummary[y].numberStudent;
                salaryClass = manyStudent == 1 ? 70000 : (manyStudent == 2 ? 80000 : (manyStudent == 3 ? 90000 : 100000));
                sum += manySummary[y].numberDateTeach * salaryClass;
                outputHtml +=
                    "<div class='detailClass'>" +
                    "<div class='nameClass'>" + manySummary[y].nameClass + "</div>" +
                    "<div class='numberStudent'>" + manySummary[y].numberStudent + "</div>" +
                    "<div class='numberDateTeach'>" + manySummary[y].numberDateTeach + "</div>" +
                    "<div class='salaryClass'>" + manySummary[y].numberDateTeach * salaryClass + "</div>" +
                    "</div>";
            }
        }
        sumCurrent += sum;
        outputHtml +=
            "</div>" +
            "<h2>" + sum + "</h2>" +
            "</div>";
    }
    gl_sumCurrent = sumCurrent*2;
    console.log("takeSalary: " + gl_sumCurrent);
    document.getElementById("nowSalary").innerHTML = new Intl.NumberFormat('en').format(gl_sumCurrent);
    document.getElementById("containerDistrict").innerHTML = outputHtml;
}

function _getMonth(p_getDate) {
    var d = new Date(p_getDate);
    var month = d.getMonth() == 12 ? 1 : d.getMonth() + 1;
    return month;
}


let person;
var gl_sumAll;

function takeSubjectOfScheduleWeek(p_getDate) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var sum = 0;
            person = JSON.parse(this.responseText);

            Object.keys(person).forEach(key => {
                if (person[key][0] != null) {
                    y = 0;
                    while (person[key][y] != null) {
                        if (_getMonth(person[key][y].dateTeach) == _getMonth($("#getDate").val())) {
                            manyStudent = person[key][y].numberStudent;
                            salaryClass = manyStudent == 1 ? 70000 : (manyStudent == 2 ? 80000 : (manyStudent == 3 ? 90000 :
                                100000));
                            sum += 2 * salaryClass;
                        }
                        y++;
                    }
                }
            })
            
            document.getElementById("intendedSalary").innerHTML = new Intl.NumberFormat('en').format(sum);
            document.getElementById("taxSalary").innerHTML = new Intl.NumberFormat('en').format(sum * 0.1);
            document.getElementById("taxExtSalary").innerHTML = new Intl.NumberFormat('en').format(sum * 0.9);
            gl_sumAll = sum;

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function (p_obj) {
                if (this.readyState == 4 && this.status == 200) {
                    manySummary = xmlhttp.responseText;
                    console.log("abc" + manySummary);
                }
            }
            xmlhttp.open("POST", "./Salary/UpdateSalary", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("monthSalary=" +  _getMonth(p_getDate) +"&yearSalary=" +new Date(p_getDate).getFullYear()  +"&salary="+ sum);
        }
    }
    xmlhttp.open("GET", "./home/getScheduleOfMonth?month=" + _getMonth(p_getDate), true);
    xmlhttp.send();
}

function lineStatus() {
    ratio = gl_sumCurrent / gl_sumAll * 100;
    width = $("#line").css("width").substring(0, 3);
    document.getElementById("nowLine").style.width = ratio * width / 100 + "px";
    document.getElementById("persent").innerHTML = Math.ceil(ratio) + "<span>%<span>"
}