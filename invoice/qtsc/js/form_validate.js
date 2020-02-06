var tableIndexNumber = 1;
window.onload = function() {
	initTableEvents();
};
function initTableEvents() {
	setEventToElementsWithClass(unitNameClass, "focusout", increaseNo);
	setEventToElementsWithClass(unitQuantityClass, "keyup", calculateSummary);
	setEventToElementsWithClass(unitPriceClass, "focusout", calculateSummaryWithPriceFormat);
}
Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};
function findAncestorByTag(ele, tagName) {
    while ((ele = ele.parentNode) && ele.nodeName.toString() != tagName.toString().toUpperCase());
    return ele;
}
/* NOTE: Specify global variable "rowAddClass', "totalHeaderRow" and "htmlRowAdd" */
function addMoreRow(event) {
	var headerRow = 1;
	var innerContent = "<td>No HTML Content specified.</td>";
	if (typeof totalHeaderRow !== 'undefined' && totalHeaderRow !== null) {
		headerRow = totalHeaderRow;
	}
	if (typeof htmlRowAdd !== 'undefined' && htmlRowAdd !== null) {
		innerContent = htmlRowAdd;
	}
	var source = getSourceElement(event);
	var table = findAncestorByTag(source, "table");
	var eles = document.getElementsByClassName(rowAddClass);
	if (eles.length < 10) {
		var row = table.insertRow(eles.length + headerRow);
		row.classList.add(rowAddClass);
		row.innerHTML = innerContent;
		initTableEvents();
	}
}
function getSourceElement(event) {
	// IE older versions 
	if (!event) {
		event = window.event; 
	};
	// Get element which raise event
	return (event.target || event.srcElement);
}
function setEventToElementsWithClass(className, eventName, funcName) {
	var eles = document.getElementsByClassName(className);
	var i, count;
	count = eles.length;
	for (i = 0; i < count; i++) {
		eles[i].addEventListener(eventName, funcName, false);
	}
}
function increaseNo(event){
	var source = getSourceElement(event);
	// Get the parent Table Row
	var eleRow 		= source.parentElement.parentElement;
	// Get all fields need to check
 	var eleUnitNo 	= eleRow.getElementsByClassName(unitNoClass)[0];
	if(eleUnitNo.innerText == "") {
		eleUnitNo.innerText = tableIndexNumber;
		tableIndexNumber++;
	}
	if(eleUnitNo.innerText != "" && source.value == "") {
		eleUnitNo.innerText = "";
		tableIndexNumber--;
	}
}
function calculateSummaryWithPriceFormat(event) {
	correctPrice(event);
	calculateSummary(event);
}
function correctPrice(event) {
	// Get Source element which raise event
	var source = getSourceElement(event);
	var temp = source.value.toString().replace(",","");
	source.title = temp;
	source.value = Number(temp).format(3,3);
}
function calculateSummary(event) {
	// Get Source element which raise event
	var source = getSourceElement(event);
	// Get the parent Table Row
	var eleRow = source.parentElement.parentElement;
	// Get all fields need to re-calculate
 	var eleUnitQuantity = eleRow.getElementsByClassName(unitQuantityClass)[0];
	var eleUnitPrice 	= eleRow.getElementsByClassName(unitPriceClass)[0];
	var eleSumAmount 	= eleRow.getElementsByClassName(unitAmountClass)[0];
	// Calculate Sum Amount
	var amount = eleUnitQuantity.value*eleUnitPrice.title;
	eleSumAmount.title = amount;
	eleSumAmount.innerText = amount.format(3,3);	
	// Get all fields need to re-calculate
	var elesSumAmount 	= document.getElementsByClassName(unitAmountClass);
	var eleSubTotal 	= document.getElementById(summarySubTotalId);
	var eleVatAmount, eleTotalPayment;
	if(noVAT == false) {
		eleVatAmount 	= document.getElementById(summaryVatAmountId);
		eleTotalPayment = document.getElementById(summaryTotalPayId);
	}

	var vatRate = 0.1;
	var i, count, sum = 0, vat = 0, total = 0;
	// Sum all amount
	count = elesSumAmount.length;
	for (i = 0; i < count; i++) {
	  sum += Number(elesSumAmount[i].title);
	}
	vat = sum*vatRate;
	total = sum + vat;
	// Set value
	eleSubTotal.title = sum;
	eleSubTotal.innerText = sum.format(3,3);
	if(noVAT == false) {
		eleVatAmount.title = vat.toFixed(3);
		eleVatAmount.innerText = vat.format(3,3);
		eleTotalPayment.title = total.toFixed(3);
		eleTotalPayment.innerText = total.format(3,3);
	}
	if (typeof additionalChargeId !== 'undefined' && additionalChargeId !== null) {
		var additionalCharge = Number(document.getElementById(additionalChargeId).value);
		eleTotalPayment.title = (total + additionalCharge).toFixed(3);
		eleTotalPayment.innerText = (total + additionalCharge).format(3,3);
	}
}
