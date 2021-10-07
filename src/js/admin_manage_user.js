var tabeldata = document.getElementById("content")

$(document).ready(function () {
    init()
})

function nonull(e) {
    if (!e) {
        return "-"
    } else {
        return e
    }
}

function del(id) {
    Swal.fire({
        title: `คุณต้องการลบข้อมูลของ ${id} หรือไม่`,
        icon: "warning",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'ใช่',
        denyButtonText: 'ไม่',
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`./backend/delete_user.php?id=${id}`).then(() => {
                Swal.fire({
                    title: "การลบข้อมูล",
                    text: "การลบข้อมูลเสร็จสิ้น",
                    icon: "success",
                    timer: 3000
                }).then(function () {
                    location.reload()
                })
            })
        }
    })
}


function make_table(value) {
    var textHTML = ""
    var i = 1
    value.forEach(element => {
        let gender = element.patient_gender === "M" ? "ชาย" : "หญิง"
        textHTML += '<tr>'
        textHTML += '<th scope="row">' + (i).toString() + "</th>"
        textHTML += '<td class="w-auto">' + element.patient_id + '</td>'
        textHTML += '<td class="w-auto">' + element.patient_firstname + ' ' + element.patient_lastname + '</td>'
        textHTML += '<td class="w-auto">' + gender + '</td>'
        textHTML += '<td class="w-auto">' + nonull(element.patient_birthday) + '</td>'
        textHTML += '<td class="w-auto">' + nonull(element.patient_age) + '</td>'
        textHTML += '<td class="w-auto">' + nonull(element.patient_drug_allergy) + '</td>'
        textHTML += '<td class="w-auto">' + nonull(element.patient_phone) + '</td>'
        textHTML += '<td class="w-auto">' + nonull(element.patient_address) + '</td>'
        textHTML += `<td style="text-align: center;"><a class="btn btn-warning text-white" href="user_manage_edit.php?id=${element.patient_id}"><i class="fas fa-user-edit"></i></a><a class="btn btn-danger text-white" onclick="del('${element.patient_id}')"><i class="fas fa-trash"></i></a></td>`
        textHTML += '</tr>'
        i++
    })
    tabeldata.innerHTML = textHTML
}

$("form").submit(function (e) {
    e.preventDefault();
    if ($('#keyword').val()) {
        fetch("./backend/admin_search_user.php?keyword="+$('#keyword').val())
            .catch(tabeldata.innerText = "ไม่พบข้อมูล")
            .then(response => response.text())
            .then(result => JSON.parse(result)).then(value => {
                make_table(value)
            });
    }else{
        init()
    }


})

function init(){
    fetch("./backend/admin_manage_user.php")
        .catch(tabeldata.innerText = "ไม่พบข้อมูล")
        .then(response => response.text())
        .then(result => JSON.parse(result)).then(value => {
            make_table(value)
        });
}