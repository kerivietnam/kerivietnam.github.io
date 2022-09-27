

class init {

    hanldeAjax(url, method, data, handleSuccess = null, hanldeBefore = null, hanldeAfter = null , handleErro = null) {
        $.ajax({
            url: url,
            method: method,
            data: data,
            async : false,
            beforeSend: function () {
                if (hanldeBefore) {
                    hanldeBefore();
                }
            },
            success: function (res) {
                
                if (res == '400') {
                    if(handleErro != null){
                        handleErro();
                    }
                    return;
                }else if (handleSuccess !== null) {
                    handleSuccess(res);
                    return "200";
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
    handleUploadfile(url, method, data) {
        $.ajax({
            url: url,
            method: method,
            data: data,
            processData: false,
            contentType: false,
            success: function (res) {
                console.log(res);
                if (res == 200) {
                    console.log("thanh cong");
                    return "200";
                }
                if (res == 400) {
                    console.log("thất bại");
                    return;
                }
            },
            fail: function (err) {
                alert("that bai ", err);
                return;
            }
        })
    }
    getData(arrayFiel){
       return arrayFiel.reduce( (accument , item)=>{
                return {
                    ...accument,
                    [item] : $(`#${item}`).val(),
                }
        },{})
    }

}