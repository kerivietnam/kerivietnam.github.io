const InitEmployer = new init();
const url = "../ajax/addEmployer.ajax.php"
$(document).ready(function(){

    addEmployer();
    deleteEmployer();
    updateEmployer();
    $(document).on("click","#closeAddEmployer",handleAfter);
    $(document).on("click",".close",handleAfter);
})

const getDataEmployer = ()=>{
    let arrItem = ["nameEmployer"];
    let data = InitEmployer.getData(arrItem);
    return data;
}

const addEmployer = ()=>{
    $(document).on("click","#btnAddEmployer",function(){
        let data = getDataEmployer();
        InitEmployer.hanldeAjax(url,"post",data,handelSuccess);
    })
}

const deleteEmployer = ()=>{
    $(document).on("click","#btnDeleteEmployer",function(){
		var r = confirm("Bạn có chắc muốn xóa không?");
		if (r == true) {
		} else {
			return;
		}
        let idEmployer = $(this).attr("data-id_delete_employer");
        InitEmployer.hanldeAjax(url,"post",{idEmployer : idEmployer},handelSuccess);
    })
}
const handelSuccess = (res)=>{
    let data = JSON.parse(res);
    if(data == "204"){
        alert("Khách hàng đã tồn tại trong hệ thống !!!");
    }else{
        $("#bodyEmployer").html(data);
        $("#closeAddEmployer").click();
    }
 }
 const updateEmployer = ()=>{
     $(document).on("click","#btnUpdate",function(){
          let idEmployer = $(this).attr("data-id_update_employer");
          window.sessionStorage.setItem("idEmployer",idEmployer);
          let nameEmployer = $($(this).parent().parent().children()[0]).text();
          showValue(nameEmployer,idEmployer);
     })
     $(document).on("click","#btnUpdateEmployer",function(){
         let idEmployer  = window.sessionStorage.getItem("idEmployer");
         let data = getDataEmployer();
         let dataUpdate = {
             ...data,
             idEmployer : idEmployer
         }
         InitEmployer.hanldeAjax(url,"post",dataUpdate,handelSuccess,null,handleAfter,null);
     })
 }
 const showValue = (nameEmployer)=>{
        $("#exampleModalLongTitle").text("Sửa khách hàng")
       $("#nameEmployer").val(nameEmployer);
       setButton();
 }
 const setButton = ()=>{
     $("#btnAddEmployer").hide();
     $("#btnUpdateEmployer").show();
 }
 const handleAfter = ()=>{
    $("#btnAddEmployer").show();
    $("#btnUpdateEmployer").hide();
    $("#nameEmployer").val("");
    $("#exampleModalLongTitle").text("Thêm khách hàng")
 }