
$(document).ready(function(){
    $(document).on('click','.btnUpdateStatus',function()
    {
        var workStatus = $(this).closest('.load_data_user_io').find('td:nth-child(2)').text();
		//alert(workStatus);
        $('#workStatus').val(workStatus);
      
        var id_workStatus = $(this).attr('data-id_update_status');
        //alert(id_workStatus);
        let data = {
            id_workStatus:id_workStatus,
			workStatus:workStatus
        }
        $.ajax({
            url:"../module/status/editstatus.module.php",
            method:"POST",
            data:data,
            success:function()
            {
               //console.log(data);
                readData();
                
            }
        });
       

    });
  
    readData();
    
});


function readData()
{
    $.ajax({
        url:"../module/status/readstatus.module.php",
        method:"POST",
        success:function(data)
       {
        $('#load_data_user').html(data);
       }
    });
}