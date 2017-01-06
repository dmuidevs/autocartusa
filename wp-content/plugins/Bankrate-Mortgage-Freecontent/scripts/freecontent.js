function getInternetExplorerVersion()
{
   var rv = -1; // Return value assumes failure.
   if (navigator.appName == 'Microsoft Internet Explorer')
   {
      var ua = navigator.userAgent;
      var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
      if (re.exec(ua) != null)
         rv = parseFloat( RegExp.$1 );
   }
   return rv;
}	



   function viewonthis(font,size,color,id){


	

		var currentFont  =	document.getElementById(font).value;
		var currentSize  =	document.getElementById(size).value;
		for (i=0; i<document.getElementsByName(color).length; i++){
		if(document.getElementsByName(color)[i].checked==true){
		var currentColor=      document.getElementsByName(color)[i].value;
		}	
		}
	

        	 if(currentColor=="color1"){   
				document.getElementById("header"+id).className ="BankrateFCC_boxhead-container-small" +" BankrateFCC_calc-blue-border"; 
                document.getElementById("body"+id).className = "BankrateFCC_calc-container-small" + " BankrateFCC_calc-blue" + " BankrateFCC_calc-blue-border";    
                document.getElementById("footer"+id).className = "BankrateFCC_footer-container small" +" BankrateFCC_calc-dkblue";
        
        	}
        	else if(currentColor=="color2"){  
                document.getElementById("header"+id).className="BankrateFCC_boxhead-container-small" +" BankrateFCC_calc-orange-border";
                document.getElementById("body"+id).className = "BankrateFCC_calc-container-small" + " BankrateFCC_calc-orange" + " BankrateFCC_calc-orange-border";
                document.getElementById("footer"+id).className="BankrateFCC_footer-container small" +" BankrateFCC_calc-dkorange";
                
       		     }
       		else if(currentColor=="color3"){   
                document.getElementById("header"+id).className = "BankrateFCC_boxhead-container-small" +" BankrateFCC_calc-gray-border";
                document.getElementById("body"+id).className = "BankrateFCC_calc-container-small" + " BankrateFCC_calc-gray" + " BankrateFCC_calc-gray-border";
				document.getElementById("footer"+id).className = "BankrateFCC_footer-container small" +" BankrateFCC_calc-dkgray";
            		}
            	else if(currentColor=="color4"){    
                document.getElementById("header"+id).className = "BankrateFCC_boxhead-container-small" +" BankrateFCC_calc-green-border";
                document.getElementById("body"+id).className = "BankrateFCC_calc-container-small" + " BankrateFCC_calc-green" + " BankrateFCC_calc-green-border";
                document.getElementById("footer"+id).className = "BankrateFCC_footer-container small" +" BankrateFCC_calc-dkgreen";
                }
				document.getElementById("mrtgTitle"+id).style.fontFamily = currentFont;
				document.getElementById("ip1"+id).style.fontFamily = currentFont;
				document.getElementById("ip2"+id).style.fontFamily = currentFont;
				document.getElementById("ip3"+id).style.fontFamily = currentFont;
                		document.getElementById("mrtgTitle"+id).style.paddingTop = "4px";
				
			

		if (navigator.appName == 'Microsoft Internet Explorer'){

		 var ver = getInternetExplorerVersion();


		if(ver >=7){
		var sum=parseInt(currentSize)+3
                document.getElementById("swami"+id).setAttribute("alt", "#TB_inline?height=270&amp;width="+sum+"&amp;inlineId=contentnow"+id);

		
		
		}

		}else{
			
		document.getElementById("swami"+id).setAttribute("alt","#TB_inline?height=280&amp;width="+currentSize+"&amp;inlineId=contentnow"+id);	
		
		}
		document.getElementById("txtLaonAmount"+id).value="";
		document.getElementById("txtInterestRate"+id).value="";
		document.getElementById("txtLoanTerm"+id).value="";
		document.getElementById("errLoanAmount"+id).innerHTML=" ";
		document.getElementById("errInterestRate"+id).innerHTML=" ";
		document.getElementById("errLoanTerm"+id).innerHTML=" ";
		document.getElementById("resultDiv"+id).style.display="none";


	
	

               
	        if(currentSize=="200") {


			for(var inc=1;inc<=3;inc++)
			document.getElementById("ip"+inc+id).style.width="105px";
			document.getElementById("mrtgTitle"+id).className = "BankrateFCC_boxhead_200_auto";
			document.getElementById("mrtCalBrLogo"+id).style.width = "115px";
			document.getElementById("mrtgTitle"+id).style.width = "26.5%";	
			document.getElementById("mrtgTitle"+id).style.height = "12px";
			document.getElementById("mrtgTitle"+id).style.fontSize = '9px';

			document.getElementById("year"+id).style.width = '74px';
			document.getElementById("rate"+id).style.width = '74px';
			document.getElementById("amount"+id).style.width = '74px';
			document.getElementById("monthlyPayment"+id).style.width = '74px';


			for (var le = 1; le <= 4; le++){
			document.getElementById("result"+le+id).style.fontSize = '9px';
			document.getElementById("result"+le+id).style.fontFamily = currentFont;
			document.getElementById("result"+le+id).style.width = '94px';
			} 
			
			for (var ii = 1; ii <= 3; ii++){document.getElementById("ip"+ii+id).style.fontSize = '9px';

						document.getElementById("ip"+ii+id).style.fontFamily = currentFont;
						} 

			document.getElementById("year"+id).style.fontSize = '9px';
			document.getElementById("year"+id).style.fontFamily = currentFont;

			document.getElementById("rate"+id).style.fontSize = '9px';
			document.getElementById("rate"+id).style.fontFamily = currentFont;

			document.getElementById("amount"+id).style.fontSize = '9px';
			document.getElementById("amount"+id).style.fontFamily = currentFont;


			document.getElementById("monthlyPayment"+id).style.fontSize = '9px';
			document.getElementById("monthlyPayment"+id).style.fontFamily = currentFont;

			document.getElementById("txtLaonAmount"+id).style.fontSize = '9px';
			document.getElementById("txtLaonAmount"+id).style.fontFamily = currentFont;
			document.getElementById("txtInterestRate"+id).style.fontSize = '9px';
			document.getElementById("txtInterestRate"+id).style.fontFamily = currentFont;
			document.getElementById("txtLoanTerm"+id).style.fontSize = '9px';
			document.getElementById("txtLoanTerm"+id).style.fontFamily = currentFont;
				




                  }   
 
		else if(currentSize=="225"){
			for(var inc=1;inc<=3;inc++)
			document.getElementById("ip"+inc+id).style.width="115px";
			document.getElementById("mrtgTitle"+id).className = "BankrateFCC_boxhead_200_auto";
			document.getElementById("mrtCalBrLogo"+id).style.width = "115px";
			document.getElementById("mrtgTitle"+id).style.width = "22%";	
			document.getElementById("mrtgTitle"+id).style.height = "12px";
			document.getElementById("mrtgTitle"+id).style.fontSize = '9px';

			for (var ii = 1; ii <= 3; ii++){document.getElementById("ip"+ii+id).style.fontSize = '9px';

						document.getElementById("ip"+ii+id).style.fontFamily = currentFont;
						} 


			for (var le = 1; le <= 4; le++){
			document.getElementById("result"+le+id).style.fontSize = '9px';
			document.getElementById("result"+le+id).style.fontFamily = currentFont;
			document.getElementById("result"+le+id).style.width = '93px';
			} 
			for (var ii = 1; ii <= 3; ii++){document.getElementById("ip"+ii+id).style.fontSize = '9px';

						document.getElementById("ip"+ii+id).style.fontFamily = currentFont;
						}


			document.getElementById("year"+id).style.width = '93px';
			document.getElementById("rate"+id).style.width = '93px';
			document.getElementById("amount"+id).style.width = '93px';
			document.getElementById("monthlyPayment"+id).style.width = '93px';



			document.getElementById("year"+id).style.fontSize = '9px';
			document.getElementById("year"+id).style.fontFamily = currentFont;

			document.getElementById("rate"+id).style.fontSize = '9px';
			document.getElementById("rate"+id).style.fontFamily = currentFont;

			document.getElementById("amount"+id).style.fontSize = '9px';
			document.getElementById("amount"+id).style.fontFamily = currentFont;


			document.getElementById("monthlyPayment"+id).style.fontSize = '9px';
			document.getElementById("monthlyPayment"+id).style.fontFamily = currentFont;	


			document.getElementById("txtLaonAmount"+id).style.fontSize = '9px';
			document.getElementById("txtLaonAmount"+id).style.fontFamily = currentFont;
			document.getElementById("txtInterestRate"+id).style.fontSize = '9px';
			document.getElementById("txtInterestRate"+id).style.fontFamily = currentFont;
			document.getElementById("txtLoanTerm"+id).style.fontSize = '9px';
			document.getElementById("txtLoanTerm"+id).style.fontFamily = currentFont;


		 }
		else if(currentSize=="250"){
			for(var inc=1;inc<=3;inc++)
			document.getElementById("ip"+inc+id).style.width="115px";
			document.getElementById("mrtgTitle"+id).className = "BankrateFCC_boxhead_200_auto";
			document.getElementById("mrtCalBrLogo"+id).style.width = "115px";
			document.getElementById("mrtgTitle"+id).style.width = "50%";	
			document.getElementById("mrtgTitle"+id).style.height = "12px";
			document.getElementById("mrtgTitle"+id).style.fontSize = '9px';


			for (var le = 1; le <= 4; le++){
			document.getElementById("result"+le+id).style.fontSize = '10px';
			document.getElementById("result"+le+id).style.fontFamily = currentFont;
			document.getElementById("result"+le+id).style.width = '109px';
			} 

			for (var ii = 1; ii <= 3; ii++){document.getElementById("ip"+ii+id).style.fontSize = '10px';

				document.getElementById("ip"+ii+id).style.fontFamily = currentFont;
				}

			document.getElementById("txtLaonAmount"+id).style.fontSize = '10px';
			document.getElementById("txtLaonAmount"+id).style.fontFamily = currentFont;
			document.getElementById("txtInterestRate"+id).style.fontSize = '10px';
			document.getElementById("txtInterestRate"+id).style.fontFamily = currentFont;
			document.getElementById("txtLoanTerm"+id).style.fontSize = '10px';
			document.getElementById("txtLoanTerm"+id).style.fontFamily = currentFont;

			document.getElementById("year"+id).style.width = '109px';
			document.getElementById("rate"+id).style.width = '109px';
			document.getElementById("amount"+id).style.width = '109px';
			document.getElementById("monthlyPayment"+id).style.width = '109px';




			document.getElementById("year"+id).style.fontSize = '10px';
			document.getElementById("year"+id).style.fontFamily = currentFont;

			document.getElementById("rate"+id).style.fontSize = '10px';
			document.getElementById("rate"+id).style.fontFamily = currentFont;

			document.getElementById("amount"+id).style.fontSize = '10px';
			document.getElementById("amount"+id).style.fontFamily = currentFont;


			document.getElementById("monthlyPayment"+id).style.fontSize = '10px';
			document.getElementById("monthlyPayment"+id).style.fontFamily = currentFont;



			} 
			else{
			document.getElementById("mrtgTitle"+id).style.fontSize = '11px';
			document.getElementById("mrtgTitle"+id).style.width = "50%";	
			document.getElementById("mrtCalBrLogo"+id).style.width = "115px";  
			for(var inc=1;inc<=3;inc++)
			document.getElementById("ip"+inc+id).style.width="180px";
			document.getElementById("mrtgTitle"+id).className="BankrateFCC_boxhead";
			}
			document.getElementById("header"+id).style.width = parseInt(currentSize) + "px";
			document.getElementById("body"+id).style.width = currentSize - parseInt(20) + "px";
			document.getElementById("footer"+id).style.width = parseInt(currentSize) + parseInt(2) + "px";	

		   if(currentSize=="275"){



			for (var le = 1; le <= 4; le++){
			document.getElementById("result"+le+id).style.fontSize = '12px';
			document.getElementById("result"+le+id).style.fontFamily = currentFont;
			document.getElementById("result"+le+id).style.width = '156px';
			} 
			for (var ii = 1; ii <= 3; ii++){document.getElementById("ip"+ii+id).style.fontSize = '11px';

			document.getElementById("ip"+ii+id).style.fontFamily = currentFont;
			}




			document.getElementById("year"+id).style.width = '86px';
			document.getElementById("rate"+id).style.width = '86px';
			document.getElementById("amount"+id).style.width = '86px';
			document.getElementById("monthlyPayment"+id).style.width = '86px';


			document.getElementById("year"+id).style.fontSize = '11px';
			document.getElementById("year"+id).style.fontFamily = currentFont;

			document.getElementById("rate"+id).style.fontSize = '11px';
			document.getElementById("rate"+id).style.fontFamily = currentFont;

			document.getElementById("amount"+id).style.fontSize = '11px';
			document.getElementById("amount"+id).style.fontFamily = currentFont;


			document.getElementById("monthlyPayment"+id).style.fontSize = '11px';
			document.getElementById("monthlyPayment"+id).style.fontFamily = currentFont;

			document.getElementById("txtLaonAmount"+id).style.fontSize = '11px';
			document.getElementById("txtLaonAmount"+id).style.fontFamily = currentFont;
			document.getElementById("txtInterestRate"+id).style.fontSize = '11px';
			document.getElementById("txtInterestRate"+id).style.fontFamily = currentFont;
			document.getElementById("txtLoanTerm"+id).style.fontSize = '11px';
			document.getElementById("txtLoanTerm"+id).style.fontFamily = currentFont;


			if(currentFont=="Verdana"){
			document.getElementById("result3"+id).style.width = '131px';
			document.getElementById("amount"+id).style.width = '101px';
			}


			}if(currentSize=="300"){
			for (var le = 1; le <= 4; le++){
			document.getElementById("result"+le+id).style.fontSize = '13px';
			document.getElementById("result"+le+id).style.fontFamily = currentFont;
			document.getElementById("result"+le+id).style.width = '166px';
			} 

			for (var ii = 1; ii <= 3; ii++){document.getElementById("ip"+ii+id).style.fontSize = '13px';

			document.getElementById("ip"+ii+id).style.fontFamily = currentFont;
			}

			document.getElementById("year"+id).style.width = '102px';
			document.getElementById("rate"+id).style.width = '102px';
			document.getElementById("amount"+id).style.width = '102px';
			document.getElementById("monthlyPayment"+id).style.width = '102px';


			document.getElementById("year"+id).style.fontSize = '13px';
			document.getElementById("year"+id).style.fontFamily = currentFont;

			document.getElementById("rate"+id).style.fontSize = '13px';
			document.getElementById("rate"+id).style.fontFamily = currentFont;

			document.getElementById("amount"+id).style.fontSize = '13px';
			document.getElementById("amount"+id).style.fontFamily = currentFont;


			document.getElementById("monthlyPayment"+id).style.fontSize = '13px';
			document.getElementById("monthlyPayment"+id).style.fontFamily = currentFont;


			document.getElementById("txtLaonAmount"+id).style.fontSize = '13px';
			document.getElementById("txtLaonAmount"+id).style.fontFamily = currentFont;
			document.getElementById("txtInterestRate"+id).style.fontSize = '13px';
			document.getElementById("txtInterestRate"+id).style.fontFamily = currentFont;
			document.getElementById("txtLoanTerm"+id).style.fontSize = '13px';
			document.getElementById("txtLoanTerm"+id).style.fontFamily = currentFont;


			if(currentFont=="Verdana"){
			document.getElementById("result3"+id).style.width = '131px';
			document.getElementById("amount"+id).style.width = '115px';
			}

			}if(currentSize=="325"){
				
			for (var le = 1; le <= 4; le++){
			document.getElementById("result"+le+id).style.fontSize = '13px';
			document.getElementById("result"+le+id).style.fontFamily = currentFont;
			document.getElementById("result"+le+id).style.width = '188px';
			} 


			document.getElementById("year"+id).style.width = '105px';
			document.getElementById("rate"+id).style.width = '105px';
			document.getElementById("amount"+id).style.width = '105px';
			document.getElementById("monthlyPayment"+id).style.width = '105px';


			document.getElementById("year"+id).style.fontSize = '13px';
			document.getElementById("year"+id).style.fontFamily = currentFont;

			document.getElementById("rate"+id).style.fontSize = '13px';
			document.getElementById("rate"+id).style.fontFamily = currentFont;

			document.getElementById("amount"+id).style.fontSize = '13px';
			document.getElementById("amount"+id).style.fontFamily = currentFont;


			document.getElementById("monthlyPayment"+id).style.fontSize = '13px';
			document.getElementById("monthlyPayment"+id).style.fontFamily = currentFont;


			for (var ii = 1; ii <= 3; ii++){document.getElementById("ip"+ii+id).style.fontSize = '13px';

			document.getElementById("ip"+ii+id).style.fontFamily = currentFont;
			}

			document.getElementById("txtLaonAmount"+id).style.fontSize = '13px';
			document.getElementById("txtLaonAmount"+id).style.fontFamily = currentFont;
			document.getElementById("txtInterestRate"+id).style.fontSize = '13px';
			document.getElementById("txtInterestRate"+id).style.fontFamily = currentFont;
			document.getElementById("txtLoanTerm"+id).style.fontSize = '13px';
			document.getElementById("txtLoanTerm"+id).style.fontFamily = currentFont;



			if(currentFont=="Verdana"){
			document.getElementById("result3"+id).style.width = '131px';
			document.getElementById("amount"+id).style.width = '115px';
			}

 
			} if(currentSize=="350"){
				
			for (var le = 1; le <= 4; le++){
			document.getElementById("result"+le+id).style.fontSize = '14px';
			document.getElementById("result"+le+id).style.fontFamily = currentFont;
			document.getElementById("result"+le+id).style.width = '196px';
			} 




			for (var ii = 1; ii <= 3; ii++){document.getElementById("ip"+ii+id).style.fontSize = '14px';

			document.getElementById("ip"+ii+id).style.fontFamily = currentFont;
			}  

			document.getElementById("year"+id).style.width = '117px';
			document.getElementById("rate"+id).style.width = '117px';
			document.getElementById("amount"+id).style.width = '117px';
			document.getElementById("monthlyPayment"+id).style.width = '117px';	

			document.getElementById("year"+id).style.fontSize = '14px';
			document.getElementById("year"+id).style.fontFamily = currentFont;

			document.getElementById("rate"+id).style.fontSize = '14px';
			document.getElementById("rate"+id).style.fontFamily = currentFont;

			document.getElementById("amount"+id).style.fontSize = '14px';
			document.getElementById("amount"+id).style.fontFamily = currentFont;


			document.getElementById("monthlyPayment"+id).style.fontSize = '14px';
			document.getElementById("monthlyPayment"+id).style.fontFamily = currentFont;


			document.getElementById("txtLaonAmount"+id).style.fontSize = '14px';
			document.getElementById("txtLaonAmount"+id).style.fontFamily = currentFont;
			document.getElementById("txtInterestRate"+id).style.fontSize = '14px';
			document.getElementById("txtInterestRate"+id).style.fontFamily = currentFont;
			document.getElementById("txtLoanTerm"+id).style.fontSize = '14px';
			document.getElementById("txtLoanTerm"+id).style.fontFamily = currentFont;
			if(currentFont=="Verdana"){
			document.getElementById("result3"+id).style.width = '131px';
			document.getElementById("amount"+id).style.width = '125px';
			}

		    }  

}
    function cleanVariable(string) {
    	string = string.split(" ").join("");
    	string = string.split(",").join("");
    	string = string.split("%").join("");
    	string = string.split("$").join("");
    	return string;
    }

    function validateMinMax(txtID, spanID, minVal, maxVal) {
    var boolResult = false;
    var txtValue = document.getElementById(txtID).value;
    txtValue = cleanVariable(txtValue);
    if (txtValue != "") {
        if (parseFloat(txtValue) == txtValue) {
            if (txtValue >= minVal && txtValue <= maxVal) {
                boolResult = true;
                 document.getElementById(spanID).innerHTML = '';
            }
            else {
                document.getElementById(spanID).innerHTML = "*Please enter a value between " + minVal + " and " + maxVal + ".";
            }
        }
        else {
            document.getElementById(spanID).innerHTML = "*Please enter a number value.";
        }
    }
    else {
        document.getElementById(spanID).innerHTML = "*This field cannot be blank.";
    }
    return boolResult;
}

function validateInterestRate(txtID, spanID, minVal, maxVal) {
    var boolResult = false;
    var txtValue = document.getElementById(txtID).value;
    txtValue = cleanVariable(txtValue);

    if (txtValue != "") {
        if (parseFloat(txtValue) == txtValue) {
            if (txtValue > minVal && txtValue <= maxVal) {
                boolResult = true;
                document.getElementById(spanID).innerHTML =''; 
            }
            else if (txtValue <= minVal) {
                document.getElementById(spanID).innerHTML = "*Please enter a value greater than " + minVal + ".";
            }
            else if (txtValue > maxVal) {
                document.getElementById(spanID).innerHTML = "*Please enter a value between " + minVal + " and " + maxVal + ".";
            }
        }
        else {
            document.getElementById(spanID).innerHTML = "*Please enter a number value.";
        }
    }
    else {
        document.getElementById(spanID).innerHTML = "*This field cannot be blank.";
    }
    return boolResult;
}

function formatCurrency(num) {
        num = num.toString().replace(/\$|\,/g, '');
        if (isNaN(num))
            num = "0";
        sign = (num == (num = Math.abs(num)));
        num = Math.floor(num * 100 + 0.50000000001);
        cents = num % 100;
        num = Math.floor(num / 100).toString();
        if (cents < 10)
            cents = "0" + cents;
        for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
            num = num.substring(0, num.length - (4 * i + 3)) + ',' +
        num.substring(num.length - (4 * i + 3));
        return (((sign) ? '' : '-') + '$' + num + '.' + cents);
 }

  
       function CalculateMonthlyPayment(linkdiv){ 

                    var loanAmount = cleanVariable(document.getElementById("txtLaonAmount"+linkdiv).value);
   		            var years = cleanVariable( document.getElementById("txtLoanTerm"+linkdiv).value);
                    var months = parseFloat(years) * 12;


		     var interestRate	 =  cleanVariable(document.getElementById("txtInterestRate"+linkdiv).value);
    		     var boolAmount 	 =  validateMinMax("txtLaonAmount"+linkdiv, "errLoanAmount"+linkdiv, 0, 10000000);


   		     var boolTerm 	 =  validateMinMax("txtLoanTerm"+linkdiv, "errLoanTerm"+linkdiv, 0.083, 40);
                     var boolRate 	 =  validateInterestRate("txtInterestRate"+linkdiv, "errInterestRate"+linkdiv, 0, 99);



           //document.getElementById("swami"+linkdiv).setAttribute("alt", "#TB_inline?height=770&amp;width=600&amp;inlineId=contentnow"+linkdiv);



       if (boolAmount && boolRate && boolTerm) {
        
      
        var factor = 1;
        var rate = parseFloat(interestRate) / 1200;
        var interestRatePlusOne = parseFloat(rate) + 1;
        for (var i = 0; i < months; i++) {
            factor = parseFloat(factor) * parseFloat(interestRatePlusOne);
        }
	          //var currentSize  =	document.getElementById(size).value;

			  //alert(currentSize);
	//document.getElementById("swami"+linkdiv).setAttribute("alt","#TB_inline?height=380&amp;width=400&amp;inlineId=contentnow"+id);	
					

        var result = (parseFloat(parseFloat(loanAmount) * parseFloat(factor) * parseFloat(rate)) / (parseFloat(factor) - 1)).toFixed(2);
        document.getElementById("rate"+linkdiv).innerHTML = cleanVariable(document.getElementById("txtInterestRate"+linkdiv).value)+'%';
	


	if(cleanVariable(document.getElementById("txtLoanTerm"+linkdiv).value)>1){
        document.getElementById("year"+linkdiv).innerHTML = cleanVariable(document.getElementById("txtLoanTerm"+linkdiv).value) +" years";
	}else{
	document.getElementById("year"+linkdiv).innerHTML = cleanVariable(document.getElementById("txtLoanTerm"+linkdiv).value) +" year";
        }  
        document.getElementById("amount"+linkdiv).innerHTML = formatCurrency(cleanVariable(document.getElementById("txtLaonAmount"+linkdiv).value));
        document.getElementById("monthlyPayment"+linkdiv).innerHTML = formatCurrency(result);
        document.getElementById("resultDiv"+linkdiv).style.display = "block";
        document.getElementById("btnText"+linkdiv).innerHTML="Recalculate";
	


    } 

       }
