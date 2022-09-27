
const app = new init();
const Url = "../ajax/authentication.ajax.php";
$(document).ready(function(){

    const btnConfirmAuthen = $('#confirmAuthen');

    btnConfirmAuthen.on('click',  async function(e){
        // get value
        let data = getValue();
        // handle ajax
        await app.hanldeAjax(Url,"post",data, handleOpenLoading,handleCloseLoading);
    })

})


function getValue(){
    let nameScreen = $('#nameScreen').val();
    let urlScreen = $('#url').val();
    let userId = $('#userId').val();
    let listAuthen = [];

    $('.authenCheckvalue:checked').each( (index,value)=>{
        let v = $(value).val();
        listAuthen.push(v);
    } )

    return {
        nameScreen : nameScreen,
        urlScreen : urlScreen,
        userId : userId,
        listAuthen : JSON.stringify(listAuthen)
    }

}

function handleOpenLoading(){
    console.log("loading")
}
function handleCloseLoading(){
    window.location.reload();
}

