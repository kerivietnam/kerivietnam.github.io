<?php
function getCusList($tableName, $key, $label, $datalistName, $defaultValue, $howtosearch) {
	$sql_query = "SELECT * from ".$tableName;
	//echo $sql_query;exit();

	$mysqli2 = new mysqli("localhost","root","","hpspicture");
	$sql = mysqli_query($mysqli2, $sql_query);

	if($sql != null && mysqli_num_rows($sql)>0)
	{
		$optionStr = "";
		while($rows = mysqli_fetch_array($sql))
		{
			$optionStr.='<option value="'.$rows[$key].'">'.$rows[$key].'</option>';
			
		}
		$selectStr= '<input type="text" value = "'.$defaultValue.'" placeholder="'.$label.'" list="list'.$datalistName.'" name = "'.$datalistName.'" id = "'.$datalistName.'" onblur="readData();"/>';
		$selectStr .= '<datalist style="display:none;" id="list'.$datalistName.'" class="form-control">';
		$selectStr .= $optionStr;
		$selectStr.='</datalist>';
		
		return $selectStr;
	}
}

?>