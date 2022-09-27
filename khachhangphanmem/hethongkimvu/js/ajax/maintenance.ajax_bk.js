const app = new init();
const Url = "../ajax/maintenance.ajax.php";

$(document).ready(()=>{

    const btnAddCN = $('#btnAddCN');

    btnAddCN.on('click',function(e){

        let data = getData();
        app.hanldeAjax(Url,"post",data);
        
    })

});


function getData(){
    const customerName = $("#customer_name").val();
    const cnNumber = $("#cnNumber").val();
    const dvhnumber = $("#dvhnumber").val();

    let data = {
        customerName : customerName,
        cnNumber : cnNumber,
        dvhnumber: dvhnumber
    }

    return data;
}