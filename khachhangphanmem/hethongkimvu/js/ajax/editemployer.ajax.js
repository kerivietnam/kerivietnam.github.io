
$(document).ready(function(){
    $(document).on('click','.update_employer',function()
    {
        var nameEmployer = $(this).closest('.load_data_employer_io').find('td:nth-child(2)').text();
        $('#name_employer').val(nameEmployer);
        var addressEmployer = $(this).closest('.load_data_employer_io').find('td:nth-child(3)').text();
        $('#address_employer').val(addressEmployer);
        var phoneEmployer = $(this).closest('.load_data_employer_io').find('td:nth-child(4)').text();
        $('#phone_employer').val(phoneEmployer);
        var idEmployer = $(this).attr('data-id_update_employer');


        let data = {
            idEmployer:idEmployer,
            nameEmployer:nameEmployer,
            addressEmployer:addressEmployer,
            phoneEmployer:phoneEmployer
        }

       

        $.ajax({
            url:"../module/editemployer.module.php",
            method:"POST",
            data:data,
            success:function()
            {
                alert('Sửa thành công');
                readData();
            }
        });
       

    });
    
    setTimeout(()=>{
        const arrKh = document.querySelectorAll('#load_data>tr');
        $(document).on('keyup','#searchByKH',function(){
            let key =  $(this).val();
            let html = Array.from(arrKh).filter( item => {
                return item.children[1].innerHTML.toUpperCase().includes( key.toUpperCase() );
            } )
            $("#load_data").html(html);
        })
    },1000)
   
    readData();

});


function readData()
{
    $.ajax({
        url:"../module/reademployer.module.php",
        method:"POST",
        success:function(data)
       {
        $('#load_data_employer').html(data);
       }
    });
}