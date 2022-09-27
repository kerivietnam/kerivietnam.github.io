<?php 

require_once '../module/employer.module.php';
$employer = new Employer();

$idEmployer = isset($_POST["idEmployer"]) ? $_POST["idEmployer"]  : null;
$nameEmployer = isset($_POST["nameEmployer"]) ? $_POST["nameEmployer"]  : null;

if( !is_null($nameEmployer) && is_null($idEmployer) ){
    $value = $employer->doTranslateArray2SQL("employer",["nameEmployer"],[$nameEmployer],-1,"insert");
    echo json_encode($value);
}else if(is_null($nameEmployer) && !is_null($idEmployer)){
    $value = $employer->doTranslateArray2SQL("employer",[],[],$idEmployer,"delete");
    echo json_encode($value);
}else if(!is_null($nameEmployer) && !is_null($idEmployer)){
    $value = $employer->doTranslateArray2SQL("employer",["nameEmployer"],[$nameEmployer],$idEmployer,"update");
    echo json_encode($value);
}




