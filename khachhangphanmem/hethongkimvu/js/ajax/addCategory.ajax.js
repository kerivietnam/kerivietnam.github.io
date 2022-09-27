const appCategory = new init();
const urlCategoryModule = "../ajax/addCategory.ajax.php";

$(document).ready(function () {
    // theem
    $("#btnAddCategory").on('click', function () {
        let data = getData();
        appCategory.hanldeAjax(urlCategoryModule, "post", data, handleSuccess, null, null, setButtonDefault);
    })

    $('#cnNumber').on('change', function () {
        let idCN = $(this).val();
        loadDvhNumber(idCN);
    })
    deleteCategory();
    // update
    updateCategory();

    $("#customerName").on('change', function () {
        let idEmployer = $(this).val();
        loadCnNumber(idEmployer);
        let idcn = $("#cnNumber").val();
        loadDvhNumber(idcn);
    })

    const arrCategory = document.querySelectorAll('#bodyAddCategory>tr');

    $(document).on('keyup', '#searchByCategory', function () {
        let key = $(this).val();
        let html = Array.from(arrCategory).filter(item => {
            return item.children[4].innerHTML.toUpperCase().includes(key.trim().toUpperCase());
        })
        
        $("#bodyAddCategory").html(html);
    })

})

async function loadCnNumber(id) {
    await appCategory.hanldeAjax(urlCategoryModule, "post", { idEmployer: id }, insertSectionCN, null, null);
}

function loadDvhNumber(id) {
    appCategory.hanldeAjax(urlCategoryModule, "post", { idCN: id }, insertSection, null, null);
}
function insertSectionCN(res) {
    let aCategoryList = JSON.parse(res);
    let template = '';
    aCategoryList.map(value => template += `<option value="${value["id"]}">${value["machinenumber"]}</option>`);
    $('#cnNumber').html(template);
}
function insertSection(res) {
    let aCategoryList = JSON.parse(res);
    let template = '';
    aCategoryList.map(value => template += `<option value="${value["seri_id"]}">${value["serinumber"]}</option>`);
    $('#dvhNumber').html(template);
}
function handleSuccess(res) {
    $("#bodyAddCategory").html(res);
    $('.close').click();
}



function deleteCategory() {
    $(document).on('click', '.btnDeleteCategory', function () {
        let idCategory = $(this).attr("id");
        appCategory.hanldeAjax(urlCategoryModule, "post", { idCategory: idCategory }, handleSuccess, null, null);
    })
}

function updateCategory() {
    $(document).on('click', '.btnUpdateCategory', function () {
        let id = $(this).attr("id");
        window.sessionStorage.setItem("idCategory", id);
        $("#btnAddCategory").hide();
        $("#btnUpdateCategory").show();
        setValueModal($(this))
    })
    $('#btnUpdateCategory').on('click', function () {
        let idCategory = window.sessionStorage.getItem("idCategory");
        let data = {
            ...getData(),
            idCategory: idCategory,
        }
        appCategory.hanldeAjax(urlCategoryModule, "post", data, handleSuccess, null, null, setButtonDefault);
        setDefaultModal();
    });
}

function setDefaultModal() {
    $("#btnAddCategory").show();
    $("#btnUpdateCategory").hide();
    $("#customerName").val(0);
    $("#cnNumber").val(0);
    $("#dvhNumber").val(0);
    $("#category").val("");
}

function setButtonDefault() {
    $("#btnUpdatepicture").hide();
    $("#btnAddpicture").show();
    $('#closeAddPicture').click();
}

function setValueModal(value) {

    let parent = $(value).parent().parent().children();
    let customerName = $(parent[1]).attr("data-value");
    let cnNumber = $(parent[2]).attr("data-value");

    loadDvhNumber(cnNumber);

    let dvhNumber = $(parent[3]).attr("data-value");
    let category = $(parent[4]).text();
    $("#customerName").val(customerName);
    $("#cnNumber").val(cnNumber);
    $("#dvhNumber").val(dvhNumber);
    $("#category").val(category);
}

function getData() {

    let idEmployer = $('#customerName').val();
    let idContact = $('#cnNumber').val();
    let idSeri = $('#dvhNumber').val();
    let categoryName = $('#category').val();
    return {
        idEmployer: idEmployer,
        idContact: idContact,
        idSeri: idSeri,
        categoryName: categoryName
    }
}


