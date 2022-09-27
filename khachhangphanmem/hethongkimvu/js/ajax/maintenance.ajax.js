const app = new init();
const Url = "../ajax/maintenance.ajax.php";

$(document).ready(() => {

    // CN (contact)
    const btnAddCN = $('#btnAddCN');
    // theem
    btnAddCN.on('click', function (e) {
        e.preventDefault();
        let data = getData();
        app.hanldeAjax(Url, "post", data,insertTableCN);
    })
    // xóa
    $(document).on('click', '.btnDeleteContact', function () {
        console.log($(this));
        let id = $(this).attr("id");
        app.hanldeAjax(Url, "post", {idContact : id});
        deleteMainDOM(this);
        setIndex($('#bodyAddCN'));
    })
    // sửa
    $(document).on('click','.btnUpdateContact',function(){
            $('.btnOpenModalAddContact').click();
            $("#btnUpdateCN").show();
            $('#btnAddCN').hide();
            setValueModalCn(this);
            updateMainCn(this);
            updateCN(this);
    })


    // maintenance
    const btnAddTinhtrang = $("#btnAddTinhtrang");
    // theem
    btnAddTinhtrang.on('click', function (e) {
        e.preventDefault();
        let data = getDataTinhtrang();
        app.hanldeAjax(Url, "post", data, insertTableMaintenance);
    })
    setValueInputAuto();
    // xóa
    $(document).on('click', '.btnDeleteMaintenance', function () {
        let id = $(this).attr("id");
        app.hanldeAjax(Url, "post", {idMaintenance : id});
        deleteMainDOM(this);
        setIndex($('#bodyAddMaintenance'));
    })
    // sửa
    $(document).on('click', '.btnUpdateMaintenance', function(){
        handelTinhTrangClick(this);
    })
    // set option dvh
    $('#soCN').on('change',function(){
        let idCN = $(this).val();
        loadDvhNumber(idCN);
    })
    $("#nameEmployer").on('change',function(){
        let idEmployer = $(this).val();
        loadCnNumber(idEmployer);
        setTimeout(()=>{
            let idcn = $("#soCN").val();
            loadDvhNumber(idcn);
        },1000)
    })
    $("#btnCloseModalTTN").click(function(){
        setDefault();
    });
     // set option khach hàng
     $('#idCategory').on('change',function(){
        let idCategory = $(this).val();
        loadKhachHang(idCategory);
    })

});

async function loadCnNumber(id){
    let urlCategoryModule = "../ajax/addCategory.ajax.php";
    await app.hanldeAjax(urlCategoryModule, "post", {idEmployer : id}, insertSectionCN ,null,null);
}

function loadDvhNumber(id){
    let urlCategoryModule = "../ajax/addCategory.ajax.php";
    app.hanldeAjax(urlCategoryModule, "post", {idCN : id}, insertSectionDVH ,null,null);
}
function loadKhachHang(idCategory){
    let urlCategoryModule = "../ajax/Product.ajax.php";
    app.hanldeAjax(urlCategoryModule, "post", {idCategory : idCategory}, insertSectionKhachHang ,null,null);
}
function insertSectionCN(res) {
    let aCategoryList = JSON.parse(res);
    let template = '';
    aCategoryList.map( value => template+=`<option value="${value["id"]}">${value["machinenumber"]}</option>` );
    $('#soCN').html(template);
}
function insertSectionDVH(res) {
    let aCategoryList = JSON.parse(res);
    let template = '';
    aCategoryList.map( value => template+=`<option value="${value["seri_id"]}">${value["serinumber"]}</option>` );
    $('#soDVH').html(template);
}
function insertSectionKhachHang(res) {
    let aCategoryList = JSON.parse(res);
    let template = '';
    aCategoryList.map( value => template+=`<option value="${value["idProduct"]}">${value["nameProduct"]}</option>` );
    $('#product_name').html(template);
}
function handelTinhTrangClick(element){
    $('.btnOpenModalAddMain').click();
    $("#btnUpdateTinhtrang").show();
    $('#btnAddTinhtrang').hide();
    updateMain(element);
    setValueModal(element);
    $('#btnUpdateTinhtrang').on('click',function(e){
        e.preventDefault();
        let idMain = sessionStorage.getItem("idUpdate");
        let data = getDataTinhtrang();
        let dataPost = {
            idMaintenance : idMain,
            ...data
        }
        data = {
            ...data,
            nameEmployer : $("#nameEmployer option:selected").html(),
            id_nameEmployer :  $("#nameEmployer").val(),
            soCN : $("#soCN option:selected").html(),
            id_soCN :  $("#soCN").val(),
            soDVH : $("#soDVH option:selected").html(),
            id_soDVH :  $("#soDVH").val(),
            product_name : $("#product_name option:selected").html(),
            id_product_name :  $("#product_name").val(),
            typeBV : $("#typeBV option:selected").html(),
            id_typeBV :  $("#typeBV").val(),
            nameCategory : $("#idCategory option:selected").html(),
            idCategory :  $("#idCategory").val(),
        }
        app.hanldeAjax(Url, "post", dataPost,null,null,setDefault);
        setValueItemUpdateMain(`#${idMain}`,data);
        $("#btnCloseModalTTN").click(); 
    })
}

function setDefault(){

    $("#btnUpdateTinhtrang").hide();
    $('#btnAddTinhtrang').show();
    $('#nameEmployer').val(0);
     $('#soCN').val(0);
    $('#soDVH').val(0);
    $('#status').val('');
    $('#product_name').val(0);
    $('#unit').val(0);
    $('#amount').val('');
    $('#typeBV').val(0);
    $('#embryo').val('');
    $('#gc').val('');
    $('#unit_price').val('');
    $('#into_money').val('');
    $('#vat').val('');
    $('#into_money_vat').val('');
    $('#pay').val('');
    $('#rest').val('');
}

function updateMain(element){
     let idCN = $(element).attr("id");
        window.sessionStorage.setItem("idUpdate",idCN);
}

function updateMainCn(element){
    let idCN = $(element).attr("id");
    window.sessionStorage.setItem("idUpdate",idCN);
}

function updateCN(){
    $('#btnUpdateCN').on('click',function(e){
        e.preventDefault();
        let data = getData();
        let idCN = sessionStorage.getItem("idUpdate");
        if(idCN){
            let dataPost = {
                idContact : idCN,
                ...data
            }
            app.hanldeAjax(Url, "post", dataPost,null,null,setDefault);
            data = {
                ...data,
                customerName : $("#customer_name option:selected").html(),
            }
            setValueItemUpdateCn(`#${idCN}`,data);
            $('#exit_modalCN').click();
            $("#btnUpdateCN").hide();
            $('#btnAddCN').show();
        }
    })
    function setDefault(){
        $("#customer_name").val(0);
        $("#cnNumberAddCN").val('');
        $("#dvhnumber").val('');
    }
}


function setValueItemUpdateMain(value,data){
    let parent = $(value).parent().parent().children();
    $(parent[1]).text(data["nameEmployer"]);
    $(parent[1]).attr("data-value",data["id_nameEmployer"]);
    $(parent[2]).text(data["soCN"]);
    $(parent[2]).attr("data-value",data["id_soCN"]);
    $(parent[3]).text(data["soDVH"]);
    $(parent[3]).attr("data-value",data["id_soDVH"]);
    $(parent[4]).text(data["status"]);
    $(parent[5]).text(data["nameCategory"]);
    $(parent[5]).attr("data-value",data["idCategory"]);
    $(parent[6]).text(data["product_name"]);
    $(parent[6]).attr("data-value",data["id_product_name"]);
    $(parent[7]).text(data["unit"]);
    $(parent[8]).text(data["typeBV"]);
    $(parent[8]).attr("data-value",data["id_typeBV"]);
    $(parent[9]).text(data["gc"]);
    $(parent[10]).text(data["embryo"]);
    $(parent[11]).text(data["amount"]);
    $(parent[12]).text(data["unit_price"]);
    $(parent[13]).text(data["into_money"]);
    $(parent[14]).text(data["vat"]);
    $(parent[15]).text(data["into_money_vat"]);
    $(parent[16]).text(data["pay"]);
    $(parent[17]).text(data["rest"]);
    return;
}

function setValueItemUpdateCn(value,data){
    let parent = $(value).parent().parent().children();
    $(parent[1]).text(data["customerName"]);
    $(parent[2]).text(data["cnNumber"]);
    $(parent[3]).text(data["dvhnumber"]);
    return;
}

function setValueModal(value){
    let parent = $(value).parent().parent().children();
    let nameEmployer = $(parent[1]).attr("data-value");
    let soCN = $(parent[2]).attr("data-value");

    loadDvhNumber(soCN);

    let soDVH =  $(parent[3]).attr("data-value");
    let status = $(parent[4]).text();
    let idCategory = $(parent[5]).attr("data-value");

    loadKhachHang(idCategory);

    let product_name = $(parent[6]).attr("data-value");
    let unit = $(parent[7]).text();
    let typeBV = $(parent[8]).attr("data-value");
    let gc = $(parent[9]).text();
    let embryo = $(parent[10]).text();
    let amount = $(parent[11]).text();
    let unit_price = $(parent[12]).text();
    let into_money = $(parent[13]).text();
    let vat = $(parent[14]).text();
    let into_money_vat = $(parent[15]).text();
    let pay =  $(parent[16]).text();
    let rest =  $(parent[17]).text();

    $('#nameEmployer').val(nameEmployer);
    $('#soCN').val(soCN);
    $('#soDVH').val(soDVH);
    $('#status').val(status);
    $('#idCategory').val(idCategory);
    $('#product_name').val(product_name);
    $('#unit').val(unit);
    $('#amount').val(amount);
    $('#typeBV').val(typeBV);
    $('#embryo').val(embryo);
    $('#gc').val(gc);
    $('#unit_price').val(unit_price);
    $('#into_money').val(into_money);
    $('#vat').val(vat);
    $('#into_money_vat').val(into_money_vat);
    $('#pay').val(pay);
    $('#rest').val(rest);
}

function setValueModalCn(value){
    let parent = $(value).parent().parent().children();
    let customer_name = $(parent[1]).attr("id");
    let cnNumber =  $(parent[2]).text();
    // let dvhnumber = $(parent[3]).text();
    $('#customer_name').val(customer_name);
    $('#cnNumberAddCN').val(cnNumber);
    // $('#dvhnumber').val(dvhnumber);
}

function deleteMainDOM(Element){
    let parent = $(Element).parent();
    let rowSpan = $(parent).attr('rowspan');
    if(rowSpan){
        let i = 1;
        while (i<rowSpan) {
            $(parent).parent().next().remove();
            i++;
        }
    }
    $(parent).parent().remove();
}

function setIndex(elementJquery) {
    elementJquery.find(".t-center").each((index, value) => {
        $($(value).children()[0]).text(index + 1)
    })
}


function getData() {
    const customerName = $("#customer_name").val();
    const cnNumber = $("#cnNumberAddCN").val();
    // const dvhnumber = $("#dvhnumber").val();

    let data = {
        customerName: customerName,
        cnNumber: cnNumber,
        // dvhnumber: dvhnumber
    }

    return data;
}


function getDataTinhtrang() {
    let nameEmployer = $('#nameEmployer').val();
    let soCN = $('#soCN').val();
    let soDVH = $('#soDVH').val();
    let status = $('#status').val();
    let product_name = $('#product_name').val();
    let unit = $('#unit').val();
    let amount = $('#amount').val();
    let typeBV = $('#typeBV').val();
    let embryo = $('#embryo').val();
    let gc = $('#gc').val();
    let unit_price = $('#unit_price').val();
    let into_money = $('#into_money').val();
    let vat = $('#vat').val().split("%")[0];
    console.log(vat);
    let into_money_vat = $('#into_money_vat').val();
    let pay = $('#pay').val();
    let rest = $('#rest').val();
    let idCategory = $('#idCategory').val();
    return {
        nameEmployer : nameEmployer,
        soCN: soCN,
        soDVH: soDVH,
        status: status,
        product_name: product_name,
        unit: unit,
        amount: amount,
        typeBV: typeBV,
        embryo: embryo,
        gc: gc,
        unit_price: unit_price,
        into_money: into_money,
        vat: vat,
        into_money_vat: into_money_vat,
        pay: pay,
        rest: rest,
        idCategory : idCategory
    }

}


function setValueInputAuto() {
    let unit_price = $('#unit_price');
    let amount = $('#amount');
    let into_money = $('#into_money');
    let vat = $('#vat');
    let into_money_vat = $('#into_money_vat');
    amount.on('keyup', () => {
        autoSet(unit_price, amount, into_money);
            let a = vat.val();
            let b = into_money.val();
            into_money_vat.val(() => {
                return parseInt(a) * parseInt(b) / 100;
            });
        } );
}

function autoSet(element1, element2, element3) {
    let a = element1.val();
    let b = element2.val();
    element3.val(() => {
        return parseInt(a) * parseInt(b);
    });
}

function insertTableMaintenance(res) {
    let aMain = JSON.parse(res);
    let bodyAddMaintenance = $('#bodyAddMaintenance');
    let c = bodyAddMaintenance.find(".t-center").length;
    let template = `<tr class="t-center">
                        <td rowspan="">${c + 1}</td>
                        <td data-value="${aMain["idEmployer"]}" rowspan="">${aMain["nameEmployer"]}</td>
                        <td data-value="${aMain["idcnNumber"]}" rowspan="">${aMain["machinenumber"]}</td>
                        <td data-value="${aMain["iddvhNumber"]}" rowspan="">${aMain["serinumber"]}</td>
                        <td rowspan="">${aMain["status"]}</td>
                        <td data-value="${aMain["idCategory"]}" rowspan="">${aMain["categoryName"]}</td>
                        <td data-value="${aMain["idProduct"]}" rowspan="">${aMain["nameProduct"]}</td>
                        <td rowspan="">${aMain["unit"]}</td>
                        <td  data-value="${aMain["idPicture"]}">${aMain["pictureName"]}</td>
                        <td rowspan="">${aMain["gc"]}</td>
                        <td rowspan="">${aMain["embryo"]}</td>
                        <td rowspan="">${aMain["amount"]}</td>
                        <td rowspan="">${aMain["unit_price"]}</td>
                        <td rowspan="">${aMain["into_money"]}</td>
                        <td rowspan="">${aMain["vat"]}</td>
                        <td rowspan="">${aMain["into_money_vat"]}</td>
                        <td rowspan="">${aMain["pay"]}</td>
                        <td rowspan="">${aMain["rest"]}</td>
                        <td rowspan="">
                            <button class="btn btn-danger btnDeleteMaintenance" id="${aMain["idMaintenance"]}">Xóa</button>
                            <button class="btn btn-dark btnUpdateMaintenance" id="${aMain["idMaintenance"]}" onclick="handelTinhTrangClick(this)" >sửa</button>
                        </td>
                    </tr>
                    `;
    bodyAddMaintenance.append(template);
    $('#exit_modalDS').click();
}

function insertTableCN(res) {
    let aMain = JSON.parse(res);
    if(aMain == "301"){
        alert("Số CN đã tồn tại trong hệ thống !!!");
    }else{
        let aMain = JSON.parse(res);
        let bodyAddCN = $('#bodyAddCN');
        let c = bodyAddCN.find(".t-center").length;
        let template = `<tr class="t-center">
                            <td>${c + 1}</td>
                            <td id="${aMain["idEmployer"]}">${aMain["nameEmployer"]}</td>
                            <td >${aMain["machinenumber"]}</td>
                            <td>${aMain["machineid"]}</td>
                            <td>
                                <button class="btn btn-danger btnDeleteContact" id="${aMain["id"]}">Xóa</button>
                                <button class="btn btn-dark btnUpdateContact" id="${aMain["id"]}">sửa</button>
                            </td>
                        </tr>
                       `;
        bodyAddCN.append(template);
    }
    $('#exit_modalCN').click();
}




// tự động hiển thị đơn vị tính và giá sản phẩm


$('#product_name').on('change',function(){
    let urlProducts = "../ajax/Product.ajax.php";
    let idProduct = $(this).val();
    app.hanldeAjax(urlProducts,'post',{idProduct : idProduct},autoSet);
 
    function autoSet(res){
        let dataSet = JSON.parse(res);
        
        $('#unit').val(dataSet[0]["dvtProduct"]);
        $('#unit_price').val(dataSet[0]["priceProduct"]);
        $('#vat').val(dataSet[0]["vatProduct"]);
    }

})

$("#pay").on('keyup',function(){
    let pay = $(this).val();
    let into_money = $('#into_money').val();
    let into_money_vat = $('#into_money_vat').val();
    $("#rest").val(()=>{
        return  parseFloat(into_money) + parseFloat(into_money_vat) - parseFloat(pay);
    })
});



const arrSerach = document.querySelectorAll("#bodyAddCN>tr");
$(document).on('keyup','#searchBySocn',function(){
     let key =   $(this).val();
    let html = Array.from(arrSerach).filter( item =>{
        return item.children[2].innerHTML.toUpperCase().includes(key.toUpperCase());
    } )
    $("#bodyAddCN").html(html);
})