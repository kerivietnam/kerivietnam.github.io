

class init {

    hanldeAjax(url, method, data, hanldeBefore = null, hanldeAfter = null) {
        $.ajax({
            url: url,
            method: method,
            data: data,
            beforeSend: function () {
                if (hanldeBefore) {
                    hanldeBefore();
                }
            },
            success: function (res) {
                console.log(res);
                if (res == 200) {
                    console.log("thanh cong");
                    return;
                }
                if (res == 400) {
                    console.log("thất bại");
                    return;
                }
            },
            fail: function (err) {
                alert("that bai");
                return;
            }
        }).always(function () {
            if (hanldeAfter) {
                hanldeAfter();
            }
        })
    }

}