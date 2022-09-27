

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
                    alert("thanh cong");
                    return;
                }
                if (res == 400) {
                    alert("thanh cong");
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