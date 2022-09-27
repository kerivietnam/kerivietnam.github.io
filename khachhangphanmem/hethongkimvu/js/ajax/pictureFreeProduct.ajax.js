const InitPictureFree = new init();
const url = "../ajax/addPictureFreeProduct.ajax.php";
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
    let arrItem = ["customerName","dvhNumber","nameProduct","priceProduct","nicknamePictureFree","dvtProduct","vatProduct","typePictureFree","msPicrureFree","corePictureFree"];
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
		var r = confirm("Bạn có chắc muốn xóa không?");
		if (r == true) {
		} else {
			return;
		}
        let idProduct = $(this).attr("data-id_delete_employer");
        InitPictureFree.hanldeAjax(url,"post",{idProduct : idProduct},handelSuccess);
    })
}
const handelSuccess = (res)=>{
    //let data = JSON.parse(res);
    let data = res;
    if(data == "204"){
        alert("SP đã tồn tại trong hệ thống !!!");
    }else{
        $("#bodyPictureFree").html(data);
        $("#closeAddPictureFree").click();
    }
 }
 const updatePictureFree = ()=>{
     $(document).on("click",".btnUpdatePictureFree",function(){
          let idProduct = $(this).attr("data-id_update_employer");
          window.sessionStorage.setItem("idProduct",idProduct);
          showValue(this);
     })
     $(document).on("click","#btnUpdatepictureFree",function(){
         let idProduct  = window.sessionStorage.getItem("idProduct");
		  uploadFile();
         let data = getDataPictureFree();
         let dataUpdate = {
             ...data,
             idProduct : idProduct
         }
         InitPictureFree.hanldeAjax(url,"post",dataUpdate,handelSuccess,null,handleAfter,null);
		
     })
 }
 const showValue = (value)=>{
        $("#exampleModalLongTitle").text("Sửa SP")
       let parent = $(value).parent().parent().children();
	   
	   let customerName = $(parent[0]).text();
	   let dvhNumber = $(parent[1]).text();
	   //alert(customerName);
	  // alert(customerName);
	   $('option:contains("'+customerName+'")', '#customerName')[0].selected = true;
	   $('option:contains("'+dvhNumber+'")', '#dvhNumber')[0].selected = true;

	   //$( "#customerName" ).find( 'option[value="' + customerName + '"]' ).prop( "selected", true );


	   // Phải set selected ở đây
	   
       let nameProduct = $(parent[2]).text();
       let priceProduct = $(parent[3]).text();
       let nicknamePicture = $(parent[4]).text();
       let dvtProduct = $(parent[5]).text();
       let vatProduct = $(parent[6]).text();
       $("#nameProduct").val(nameProduct);
       $("#priceProduct").val(priceProduct);
	   $("#nicknamePictureFree").val(nicknamePicture);
       $("#dvtProduct").val(dvtProduct);
       $("#vatProduct").val(vatProduct);

       let namePictureFreeLabel = $(parent[7]).text();
       let typePictureFree = $(parent[8]).text();
       let corePictureFree = $(parent[9]).text();
       let msPicrureFree = $(parent[10]).text();
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
    $("#exampleModalLongTitle").text("Thêm SP")
 }

 function uploadFile() {
	//alert('upload file: '+$('#namePictureFree')[0].files[0]);
    const img = $('#namePictureFree')[0].files[0];
    let formData = new FormData();
    formData.append("fileupload", img);
    InitPictureFree.handleUploadfile(urlUpload, "post", formData);
}