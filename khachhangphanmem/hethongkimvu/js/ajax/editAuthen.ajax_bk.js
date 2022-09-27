const app = new init();
const Url = "../ajax/authentication.ajax.php";

$(document).ready(function(){
    const trAuthentication = $(".trAuthentication");

    trAuthentication.each( (index,value)=>{
        let parent = $(value);
        let userId = $(parent.find("td")[0]).attr("data-user");
        let listAuthen = parent.find(".authenCheck");
        let arr = Array.from(listAuthen);
        arr.forEach( (v)=>{
            $(v).on('click',function(){
                let data = getValue(arr,userId);
                app.hanldeAjax(Url,'post',data);
            })
        } )
    })
})


function getValue(arr,useId){
    let listAuthen = [];
    arr.forEach( (value)=>{
        if($(value)[0].checked){
            let v = $(value).val();
            listAuthen.push(v);
        }
    })
    return {
        userId : useId,
        listAuthen : JSON.stringify(listAuthen)
    }
}

