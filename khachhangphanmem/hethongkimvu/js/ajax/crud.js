	function getURLParameter(name) {
        return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
    }
    function readData()
    {
		//alert(getURLParameter('employer') + ' ; ' + getURLParameter('workStatus'));
        $.ajax({
            url:"../module/readmainternance.module.php",
            method:"POST",
			data:{
                employer:getURLParameter('employer'),
                workStatus:getURLParameter('workStatus'),
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