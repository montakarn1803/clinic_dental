$(document).ready(function () {
    const urlSearchParams = new URLSearchParams(window.location.search);
    const params = Object.fromEntries(urlSearchParams.entries()).id;
    fetch("./backend/admin_shift_booking.php?id=" + params)
        .then(response => response.text())
        .then(result => JSON.parse(result)).then(value => { 
            value=value[0]
            let date = value.queue_date
            $("#dateinput").html(`
            <label class="form-label" for="date">วันที่&nbsp;</label>
            <input type="date" name="date" class="form-control" id="date" value='${date}' required>
            `)
            let start = value.queue_time_start.split(':')
            $("#start").val(start[0]+':'+start[1])
            let end = value.queue_time_end.split(':')
            $("#end").val(end[0]+':'+end[1])
            $('.bs-timepicker').timepicker()
        })
})

$("form").submit(function(e){
    e.preventDefault()
    const urlSearchParams = new URLSearchParams(window.location.search);
    const params = Object.fromEntries(urlSearchParams.entries()).id;
    const U = Object.fromEntries(urlSearchParams.entries()).uid;
    var formdata = new FormData();
            formdata.append("id",params);
            formdata.append("uid",U)
            formdata.append("queue_date", $("#date").val());
            formdata.append("queue_time_start", $("#start").val()+':00');
            formdata.append("queue_time_end", $("#end").val()+':00');
            var requestOptions = {
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };

            fetch("./backend/admin_queue_shift.php", requestOptions)
                .then(value => {
                    console.log(value.text())
                    if(value.status===200){
                        Swal.fire({
                            title: "การบันทึกข้อมูล",
                            text: "การบันทึกข้อมูลเสร็จสิ้น",
                            icon: "success",
                            timer:3000
                        }).then(function () {
                            window.location="admin_queue_today.php"
                        })
                    }
                
                })


})

