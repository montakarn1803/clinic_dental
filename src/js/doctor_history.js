$(document).ready(function () {
    var tabeldata = document.getElementById("content")
    fetch("./backend/doctor_history.php")
        .catch(tabeldata.innerText = "ไม่พบข้อมูล")
        .then(response => response.text())
        .then(result => JSON.parse(result)).then(value => {
            var textHTML = ""
            var i = 1
            value.forEach(element => {
                textHTML += '<tr>'
                textHTML += '<th scope="row">' + (i).toString() + "</th>"
                textHTML+='<td>'+'<img class="imgshow" src="./src/images/doctors/'+element.doctor_img+'"/></td>'
                textHTML += '<td>' + element.doctor_firstname+' '+ element.doctor_lastname+ '</td>'
                textHTML += '<td>' + element.doctor_phone+ '</td>'
                textHTML += '<td>' + element.doctor_license+ '</td>'
                textHTML += '</tr>'
                i++
            });
            tabeldata.innerHTML = textHTML
        })


});
