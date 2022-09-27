const appPicture = new init();
const urlUpload = '../ajax/uploadFile.php';
const urlInsertModule = "../ajax/addPicture.ajax.php";
const urlCategoryModule = "../ajax/addCategory.ajax.php";
$(document).ready(function () {
    // theem
    $("#btnAddpicture").on('click', function () {
        uploadFile();
        let data = getData();
        appPicture.hanldeAjax(urlInsertModule, "post", data, insertTable, null, null, showErro);
    })

    function showErro() {
        alert("Version đã tồn tại");
        $('#verPicture').css({
            border: '1px solid red',
            transition: '0.35s all ease'
        })
    }
    // delete
    deletePicture();
    // update
    updatePicture();

    $(document).on("click","#closeAddPicture",function(){
        setValueItemUpdate();
    });
    $(document).on("click",".close",function(){
        setValueItemUpdate();
    });

    $(document).on("change","#customerName",function(){
        let idCustomerChange = $(this).val();
        appPicture.hanldeAjax(urlInsertModule, "post", { idCustomerChange: idCustomerChange },setDoByIdCustomer);
    })

    $(document).on("change","#projectName",function(){
        let idProjectChange = $(this).val();
        appPicture.hanldeAjax(urlInsertModule, "post", { idProjectChange: idProjectChange },setPriceAndVatByProjectName);
    })
})


function setDoByIdCustomer(res){
    let data = JSON.parse(res);
    let html = data.map(item=>{
        return `<option value="${item["seri_id"]}">${item["serinumber"]}</option>`;
    });
    $("#dvhNumber").html(html);
}

function setPriceAndVatByProjectName(res){
    let data = JSON.parse(res)[0];
   $("#pricePicture").val(data["priceProduct"]);
   $("#vatPicture").val(data["vatProduct"]);
}
function updatePicture() {
    $(document).on("click",".btnUpdatePicture",function(){
        let idPicture = $(this).attr("id");
        window.sessionStorage.setItem("idUpdate", idPicture);
        ItemOnClickUpdate(this);
    })
}

function deletePicture() {

    $(document).on("click",'.btnDeletePicture',function(){
        ItemOnClick(this);
    })
}

function ItemOnClick(value) {
    let paren = $(value).parent().parent();
    $(paren).remove();
    let id = $(value).attr("id");
    appPicture.hanldeAjax(urlInsertModule, "post", { idPicture: id });
}

function ItemOnClickUpdate(value) {
    setValueModal(value);
    $("#btnUpdatepicture").show();
    $("#btnAddpicture").hide();
}
$("#btnUpdatepicture").on('click', function () {
    let data = getData();

    let idImg = sessionStorage.getItem("idUpdate");
    if (idImg) {
        let dataUpdate = {
            idPicture: idImg,
            ...data
        }
        setValueItemUpdate();
        appPicture.hanldeAjax(urlInsertModule, "post", dataUpdate, insertTable, null, setButtonDefault);
    }
})
function setButtonDefault() {
    $("#btnUpdatepicture").hide();
    $("#btnAddpicture").show();
    $('#closeAddPicture').click();
}

function setValueModal(value) {

    let parent = $(value).parent().parent().children();
    let customerName = $(parent[0]).attr("data-value");
    let dvhNumber = $(parent[0]).attr("data-dvhnumber");
    
   
    let projectName = $(parent[2]).attr("data-value");
    let imgName = $(parent[3]).text();
    let quantityPicture = $(parent[4]).text();
    let pricePicture = $(parent[5]).text();
    let vatPicture = $(parent[6]).text();
    let typePictureName = $(parent[7]).text().split(' ')[2];
    let verPicture = $(parent[8]).attr("data-value");
    let msPicture = $(parent[9]).text();

    $('#customerName').val(customerName);
    $('#projectName').val(projectName);
    $('#typePictureName').val(typePictureName);
    $(".custom-file-label").html(imgName);
    $("#verPicture").val(verPicture);
    $("#msPicture").val(msPicture);
    $("#dvhNumber").val(dvhNumber);
    $("#quantityPicture").val(quantityPicture);
    $("#pricePicture").val(pricePicture);
    $("#vatPicture").val(vatPicture);
    $("#exampleModalLongTitle").text("Sửa bản vẽ")
}

function setValueItemUpdate() {
    $('#customerName').val(0);
    $('#dvhNumber').val(0);
    $('#projectName').val(0);
    $('#typePictureName').val(0);
    $('#verPicture').val('');
    $('#msPicture').val('');
    $('.custom-file-label').text('Choose file');
    $("#btnUpdatepicture").hide();
    $("#btnAddpicture").show();
    $("#exampleModalLongTitle").text("Thêm bản vẽ");
}

function uploadFile() {
    const img = $('#customFile')[0].files[0];
    let formData = new FormData();
    formData.append("fileupload", img);
    appPicture.handleUploadfile(urlUpload, "post", formData);
}

function getData() {

    let customerID = $('#customerName').val();
    let projectID = $('#projectName').val();
    let typePictureName = $('#typePictureName').val();
    let msPicture = $('#msPicture').val();
    let customerName = $('#customerName').val();
    let dvhNumber = $('#dvhNumber').val();
    let quantityPicture = $('#quantityPicture').val();
    let pricePicture = $('#pricePicture').val();
    let vatPicture = $('#vatPicture').val();
    if ($('#customFile')[0].files[0]) {
        let imgName = $('#customFile')[0].files[0].name;
        return {
            customerID: customerID,
            projectID: projectID,
            typePictureName: typePictureName,
            imgName: imgName,
            msPicture: msPicture,
            customerName: customerName,
            dvhNumber: dvhNumber,
            quantityPicture : quantityPicture,
            pricePicture : pricePicture,
            vatPicture : vatPicture,
        }
    } else {
        return {
            customerID: customerID,
            projectID: projectID,
            typePictureName: typePictureName,
            msPicture: msPicture,
            customerName: customerName,
            dvhNumber: dvhNumber,
            quantityPicture : quantityPicture,
            pricePicture : pricePicture,
            vatPicture : vatPicture,
        }
    }
}

function insertTable(res) {
    let aPictureList = JSON.parse(res);
    let bodyAddPicture = $('#bodyAddPicture');
    bodyAddPicture.html(aPictureList);
    $('#closeAddPicture').click();
}

