const appDVH = new init();
const urlDVHModule = "../ajax/addDVH.ajax.php";
const urlCategoryModule = "../ajax/addCategory.ajax.php";
$(document).ready(function () {
    // theem
    $("#btnAddDVH").on('click', function () {
        let data = getDataDO();
        appDVH.hanldeAjax(urlDVHModule, "post", data, handleSuccess, null, null, setButtonDefault);
    })


    btnDeleteDVH();
    // update
    UpdateDVH();


    const arrCategory = document.querySelectorAll('#bodyAddDvh>tr');

    $(document).on('keyup', '#searchBySocn', function () {
        let key = $(this).val();
        let html = Array.from(arrCategory).filter(item => {
            return item.children[1].innerHTML.toUpperCase().includes(key.trim().toUpperCase()) || item.children[2].innerHTML.toUpperCase().includes(key.trim().toUpperCase());
        })
        
        $("#bodyAddDvh").html(html);
    })

    $("#customerName").on('change', function () {
        let idEmployer = $(this).val();
        loadCnNumberDvh(idEmployer);

    })

    $(document).on("click","#closeAddDVH",function(){
        setButtonDefault();
        setDefaultModal();
    });
    $(document).on("click",".close",function(){
        setButtonDefault();
        setDefaultModal();
    });

})
async function loadCnNumberDvh(id) {
    await appDVH.hanldeAjax(urlCategoryModule, "post", { idEmployer: id }, insertSectionCNDvh, null, null);
}
function insertSectionCNDvh(res) {
    let aCategoryList = JSON.parse(res);
    let template = '';
    aCategoryList.map(value => template += `<option value="${value["id"]}">${value["machinenumber"]}</option>`);
    $('#cnNumber').html(template);
}
function handleSuccess(res) {
    let data = JSON.parse(res);
    if(data == "204"){
        alert("Số DO đã tồn tại");
    }else if(data == "301"){
        $("#dvhnumber").css({
            "border" : "1px solid red"
        });
        alert("số dvh đã tồn tại");
    }else{
        $("#bodyAddDvh").html(data);
        $("#dvhnumber").css({
            "border" : "1px solid #e3e3e3"
        });
        $('.close').click();
    }
}

function btnDeleteDVH() {
    $(document).on('click', '.btnDeleteDVH', function () {
        let idDvh = $(this).attr("id");
        appDVH.hanldeAjax(urlDVHModule, "post", { idDvh: idDvh }, handleSuccess, null, null);
    })
}

function UpdateDVH() {
    $(document).on('click', '.btnUpdateDVH', function () {
        let id = $(this).attr("id");
        window.sessionStorage.setItem("idDvh", id);
        $("#btnAddDVH").hide();
        $("#btnUpdateDVH").show();
        setValueModal(this)
    })
    $('#btnUpdateDVH').on('click', function () {
        let idDvh = window.sessionStorage.getItem("idDvh");
        let data = {
            ...getDataDO(),
            idDvh: idDvh,
        }
        appDVH.hanldeAjax(urlDVHModule, "post", data, handleSuccess, null, null, setButtonDefault);
        setDefaultModal();
    });
}

function setDefaultModal() {
    $("#btnAddDVH").show();
    $("#btnUpdateDVH").hide();
    $("#dvhnumber").val("");
    $("#customerName").val(0);
    $("#exampleModalLongTitle").text("Thêm số DO")
}

function setButtonDefault() {
    $("#btnUpdateDVH").hide();
    $("#btnAddDVH").show();
    
}

function setValueModal(value) {

    let parent = $(value).parent().parent().children();
    let employer = $(parent[0]).attr("id");
    let dvhnumber = $(parent[1]).text();
    $("#customerName").val(employer);
    $("#dvhnumber").val(dvhnumber);
    $("#exampleModalLongTitle").text("Sửa số DO")
}

function getDataDO() {
    let arr = ["customerName","dvhnumber"];
    let data = appDVH.getData(arr);
    return data;
}


