
var type = ""
var i = 1
var ID = []
var Price = []
$(document).ready(function () {
    const urlSearchParams = new URLSearchParams(window.location.search);
    const params = Object.fromEntries(urlSearchParams.entries()).user_id;
    fetch("./backend/get_user_id.php?id=" + params)
        .then(response => response.text())
        .then(result => JSON.parse(result)).then(value => {
            value = value[0]
            $("#first_name").text("ชื่อ " + value.patient_firstname)
            $("#last_name").text("นามสกุล " + value.patient_lastname)
        })


    fetch("./backend/get_type.php")
        .then(response => response.text())
        .then(result => JSON.parse(result)).then(value => {
            value.forEach((element, index) => {
                type += `<option  value="${element.type_price}">${element.type_name}</option>`
                ID[index] = element.type_id
                Price[index] = element.type_price
            });
        })
})
function addrow() {
    let srow = `<select style="font-size:1rem;" id="${i}" onchange="getval(this);">${type} </select>`
    let row = `<tr id="r${i}">
        <th  scope="col">${i}</th>
        <th  scope="col" id="id${i}">${ID[0]}</th>
        <th scope="col">${srow}</th>
        <th scope="col" id="p${i}">500</th>
    </tr>`
    $("#content").append(row)
    i++
    $("#price").text("รวม: " + sum() + " บาท")
}

function getval(sel) {
    let id = sel.id
    let indexID = Price.indexOf(sel.value)
    $(`#p${id}`).text(numberWithCommas(sel.value))
    $(`#id${id}`).text(ID[indexID])
    $("#price").text("รวม: " + sum() + " บาท")

}

function sum() {
    let price = 0;
    for (let k = 1; k <= i; k++) {
        let p = $(`#p${k}`).text().replace(',', "")
        price += Number(p)
    }
    return numberWithCommas(price)
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function add_history() {
    Swal.fire({
        title: 'คุณต้องการบันทึกข้อมูลนี้หรือไม่',
        icon: "warning",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'ใช่',
        denyButtonText: 'ไม่',
    }).then((result) => {
        if (result.isConfirmed) {
            if (i == 1) {
                Swal.fire({
                    title: "เกิดข้อผิดพลาด",
                    text: "กรุณาเพิ่มรายการ",
                    icon: "error",
                    timer: 3000
                })
            } else {
                const urlSearchParams = new URLSearchParams(window.location.search);
                const params = Object.fromEntries(urlSearchParams.entries()).user_id;
                const QID = Object.fromEntries(urlSearchParams.entries()).id;
                for (let k = 1; k < i; k++) {
                    var formdata = new FormData();
                    formdata.append("type_id", $(`#id${k}`).text());
                    formdata.append("user_id", params);
                    var requestOptions = {
                        method: 'POST',
                        body: formdata,
                        redirect: 'follow'
                    };
                    fetch("./backend/save_history.php", requestOptions).catch(() => {
                        Swal.fire({
                            icon: 'error',
                            title: 'เกิดข้อผิดพลาด',
                            text: 'กรุณาติดต่อผู้ดูแลระบบ',
                            timer: 3000
                        }).then(() => {
                            location.reload()
                        })
                    })
                }
                Swal.fire({
                    title: "การการบันทึกข้อมูล",
                    text: "การการบันทึกข้อมูลเสร็จสิ้น",
                    icon: "success",
                    timer: 3000
                }).then(function () {
                    fetch("./backend/user_change_status.php?status=finish&id=" + QID, requestOptions).catch(() => {
                        Swal.fire({
                            icon: 'error',
                            title: 'เกิดข้อผิดพลาด',
                            text: 'กรุณาติดต่อผู้ดูแลระบบ',
                            timer: 3000
                        }).then(() => {
                            location.reload()
                        })
                    }).then(() => {
                        html2canvas(document.querySelector("#list")).then(async (canvas) => {
                            var link = document.getElementById('link')
                            var rightNow = new Date();
                             var res = rightNow.toISOString().match(/\d/g).join("")
                            link.setAttribute('download', res+'.png')
                            link.setAttribute('href', canvas.toDataURL("image/png").replace("image/png", "image/octet-stream"))
                            link.click()
                            window.open("admin_queue_today.php","_self")
                        })

                    })

                })

            }
        }
    })

}
