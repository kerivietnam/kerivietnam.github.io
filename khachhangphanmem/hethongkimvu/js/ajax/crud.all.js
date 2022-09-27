	function getURLParameter(name) {
        return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
    }
    function readData()
    {
		//alert($('#cusid').val() + ' ; ' + $('#workStatus').val());
        $.ajax({
            url:"../module/readmainternance.module.all.php",
            method:"POST",
			data:{
                employer:$('#cusid').val(),
                workStatus:$('#workStatus').val(),
            },
            success:function(data)
           {
            $('#load_data_mainternance').html(data);
           }
        });
    }
	
	
	function doUpdateInprogress(workStatus, dvhNumber, idProject)
    {
		//alert(workStatus + ' ; ' + dvhNumber + ' ; ' + idProject);
        $.ajax({
            url:"../module/updatemainternance.module.php",
            method:"POST",
			data:{
                workStatus:workStatus,
                dvhNumber:dvhNumber,
                idProject:idProject,
            },
            success:function(data)
           {
            readData();
           }
        });
    }
	
	function updateFinishQuantaty(idProduct)
    {
		//alert(document.getElementById(idProduct).innerText);
        $.ajax({
            url:"../module/updatemainternancequantaty.module.php",
            method:"POST",
			data:{
                idProductValue:document.getElementById(idProduct).innerText,
                idProduct:idProduct
            },
            success:function(data)
           {
            readData();
           }
        });
    }
	