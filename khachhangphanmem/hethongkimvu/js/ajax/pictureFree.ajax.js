const InitPictureFree = new init();
const url = "../ajax/addPictureFree.ajax.php";
const urlUpload = '../ajax/uploadFile.php';
const D2 = "11-000000"; 
const D3 = "22-000000"; 
const CNC = "33-000000"; 
$(document).ready(function(){

    addPictureFree();
    deletePictureFree();
    updatePictureFree();
    $(document).on("click","#closeAddPictureFree",handleAfter);
    $(document).on("click",".close",handleAfter);
})

const getDataPictureFree = ()=>{
    let arrItem = ["typePictureFree","msPicrureFree","corePictureFree","nicknamePictureFree"];
    let namePictureFree = $("#namePictureFreeLabel").text();

    let data = {
        ...InitPictureFree.getData(arrItem),
        namePictureFree : namePictureFree
    };
    return data;
}

const addPictureFree = ()=>{
    $(document).on("click","#btnAddpictureFree",function(){
        uploadFile();
        let data = getDataPictureFree();
        console.log(data);
        InitPictureFree.hanldeAjax(url,"post",data,handelSuccess);
    })
}

const deletePictureFree = ()=>{
    $(document).on("click",".btnDeletePictureFree",function(){
        let idPictureFree = $(this).attr("id");
        InitPictureFree.hanldeAjax(url,"post",{idPictureFree : idPictureFree},handelSuccess);
    })
}
const handelSuccess = (res)=>{
    let data = JSON.parse(res);
    if(data == "204"){
        alert("Bản vẽ đã tồn tại trong hệ thống !!!");
    }else{
        $("#bodyPictureFree").html(data);
        $("#closeAddPictureFree").click();
    }
 }
 const updatePictureFree = ()=>{
     $(document).on("click",".btnUpdatePictureFree",function(){
          let idPictureFree = $(this).attr("id");
          window.sessionStorage.setItem("idPictureFree",idPictureFree);
          showValue(this);
     })
     $(document).on("click","#btnUpdatepictureFree",function(){
         let idPictureFree  = window.sessionStorage.getItem("idPictureFree");
		 uploadFile();
         let data = getDataPictureFree();
         let dataUpdate = {
             ...data,
             idPictureFree : idPictureFree
         }
         InitPictureFree.hanldeAjax(url,"post",dataUpdate,handelSuccess,null,handleAfter,null);
     })
 }
 const showValue = (value)=>{
        $("#exampleModalLongTitle").text("Sửa bản vẽ")
       let parent = $(value).parent().parent().children();

       let namePictureFreeLabel = $(parent[0]).text();
       let nicknamePicture = $(parent[1]).text();
       let typePictureFree = $(parent[2]).text();
       let corePictureFree = $(parent[3]).text();
       let msPicrureFree = $(parent[4]).text();
        $("#nicknamePictureFree").val(nicknamePicture);
       $("#namePictureFreeLabel").text(namePictureFreeLabel);
       $("#typePictureFree").val(typePictureFree);
       $("#corePictureFree").val(corePictureFree);
       $("#msPicrureFree").val(msPicrureFree);
       setButton();
 }
 const setButton = ()=>{
     $("#btnAddpictureFree").hide();
     $("#btnUpdatepictureFree").show();
 }
 const handleAfter = ()=>{
    $("#btnAddpictureFree").show();
    $("#btnUpdatepictureFree").hide();
    $("#namePictureFree").val("");
    $("#exampleModalLongTitle").text("Thêm bản vẽ")
 }

 function uploadFile() {
    const img = $('#namePictureFree')[0].files[0];
    let formData = new FormData();
    formData.append("fileupload", img);
    InitPictureFree.handleUploadfile(urlUpload, "post", formData);
}