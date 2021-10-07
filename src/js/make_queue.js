$(document).ready(function () {
    $('.bs-timepicker').timepicker()
})
$("form").submit(function (e) {
    e.preventDefault()
    var formdata = new FormData();
    formdata.append("id", $("#id").val());
    formdata.append("date", $('#date').val());
    formdata.append("time_start", $("#time_start").val() + ":00");
    formdata.append("time_end", $("#time_end").val() + ":00");
    var requestOptions = {
        method: 'POST',
        body: formdata,
        redirect: 'follow'
    };
    fetch("./backend/make_queue.php", requestOptions)
    .then(async (response) =>  {
       let code = response.status
        if(code===200){
            Swal.fire({
                title: "การบันทึกข้อมูล",
                text: "การบันทึกข้อมูลเสร็จสิ้น",
                icon: "success",
                timer:3000
            }).then(async function () {
                await html2canvas(document.querySelector("#list")).then( (canvas) => {
                    var link = document.getElementById('link')
                    var rightNow = new Date();
                     var res = rightNow.toISOString().match(/\d/g).join("")
                    link.setAttribute('download', res+'.png')
                    link.setAttribute('href', canvas.toDataURL("image/png").replace("image/png", "image/octet-stream"))
                    link.click()
                    window.open("admin_queue_today.php","_self")
                })
            })

        }else{
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                timer: 3000
            })
        }
    })
        
})