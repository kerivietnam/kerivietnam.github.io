const appPicture = new init();
const urlInsertModule = "../ajax/addPicture.ajax.php";
const urlCategoryModule = "../ajax/addCategory.ajax.php";
$(document).ready(function () {
    // theem
    $("#btnAddpicture").on('click', function () {
        let data = getData();
        appPicture.hanldeAjax(urlInsertModule, "post", data, insertTable, null, null, showErro);
        $("#formDetailPictureFree").empty();
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
        let value = $(this).val();
        let idProjectChange = $('#projectNames [value="' + value + '"]').attr('data-id');
        console.log(idProjectChange);
        window.sessionStorage.setItem("idProject",idProjectChange);
        appPicture.hanldeAjax(urlInsertModule, "post", { idProjectChange: idProjectChange },setPriceAndVatByProjectName);
    })

    $(document).on("change","#pictureFree",function(){
        //let idPictureFreeChange = $(this).val();
		let value = $(this).val();
		let idPictureFreeChange = $('#pictureFrees [value="' + value + '"]').attr('data-id');
		window.sessionStorage.setItem("idUpdatePictureFree",idPictureFreeChange);
        appPicture.hanldeAjax(urlInsertModule, "post", { idPictureFreeChange: idPictureFreeChange },insertDetailPicrureFree);
    })
	
	
	
})

function insertDetailPicrureFree(res){
    let data = JSON.parse(res);
    let html = data.map(item=>{
        return  ` <label class="col-sm-4 col-form-label fw-bold">Thông tin bản vẽ</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <div>
                                <p class="PictureFree">Tên gợi nhớ : <span > ${item["nicknamePicrureFree"]} </span> </p>
                                <p class="PictureFree">Tên file : <span > <a href="../uploadPicture/${item["namePicrureFree"]}"  target=blank>${item["namePicrureFree"]} </a></span> </p>
                                <p class="PictureFree">Bản vẽ : <span > ${item["typePictureFree"]} </span></p>
                                <p class="PictureFree">Phôi : <span > ${item["corePictureFree"]} </span></p>
                                <p class="PictureFree">MSBV : <span > ${item["msPicrureFree"]} </span></p>
                                <p class="PictureFree">version :<span > ${item["verPictureFree"]} </span></p>
                            </div>
                        </div>
                    </div>`;
    });
    $("#formDetailPictureFree").html(html);
}

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
		//alert(idPicture);
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
        console.log(dataUpdate);
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
    // let projectName = $(parent[2]).attr("data-value");
    let projectName = $(parent[2]).text();
    //let pictureFree = $(parent[3]).attr("data-value");
	let pictureFree = $(parent[3]).text();
    let quantityPicture = $(parent[4]).text();
    let pricePicture = $(parent[5]).text();
    let vatPicture = $(parent[6]).text();


    $("#customerName").val(customerName);
    $("#dvhNumber").val(dvhNumber);
    $("#projectName").val(projectName);
    $("#quantityPicture").val(quantityPicture);
    $("#pricePicture").val(pricePicture);
    $("#vatPicture").val(vatPicture);
    $("#pictureFree").val(pictureFree);


}

function setValueItemUpdate() {
	//alert(1);
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

function getData() {

    let customerID = $('#customerName').val();
    let projectID = window.sessionStorage.getItem("idProject");
    console.log(projectID);
    let dvhNumber = $('#dvhNumber').val();
    let quantityPicture = $('#quantityPicture').val();
    let pricePicture = $('#pricePicture').val();
    let vatPicture = $('#vatPicture').val();
    //let pictureFree = $('#pictureFree').val();

    let pictureFree = window.sessionStorage.getItem("idUpdatePictureFree");
		//alert(pictureFree);
    return {
        customerID: customerID,
        projectID: projectID,
        dvhNumber: dvhNumber,
        quantityPicture : quantityPicture,
        pricePicture : pricePicture,
        vatPicture : vatPicture,
        pictureFree : pictureFree
    }
}

function insertTable(res) {
    let aPictureList = JSON.parse(res);
    let bodyAddPicture = $('#bodyAddPicture');
    bodyAddPicture.html(aPictureList);
    $('#closeAddPicture').click();
}

