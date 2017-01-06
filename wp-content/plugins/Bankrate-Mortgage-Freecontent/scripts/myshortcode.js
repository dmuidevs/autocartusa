           var checkForIE = false;
        
	    function validateMinMax(txtID, spanID, minVal, maxVal) {
	        var boolResult = false;
	        var txtValue = document.getElementById(txtID).value;
	        txtValue = cleanVariable(txtValue);
	        if (txtValue != "") {
	            if (parseFloat(txtValue) == txtValue) {
	                if (txtValue >= minVal && txtValue <= maxVal) {
	                    boolResult = true;
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

	    function cleanVariable(string) {
	        string = string.split(" ").join("");
	        string = string.split(",").join("");
	        string = string.split("%").join("");
	        string = string.split("$").join("");
	        return string;
	    }

	    function cleanErrorSpan() {
	        document.getElementById("errLoanAmount").innerHTML = "";
	        document.getElementById("errLoanTerm").innerHTML = "";
	        document.getElementById("errInterestRate").innerHTML = "";
	    }

	    function CalculateMonthlyPayment() {
	        cleanErrorSpan();
	        var loanAmount = cleanVariable(document.getElementById("txtLaonAmount").value);
	        var years = cleanVariable(document.getElementById("txtLoanTerm").value);
	        var months = parseFloat(years) * 12;
	        var interestRate = cleanVariable(document.getElementById("txtInterestRate").value);

	        var boolAmount = validateMinMax("txtLaonAmount", "errLoanAmount", 0, 10000000);
	        var boolTerm = validateMinMax("txtLoanTerm", "errLoanTerm", 0.083, 40);
	        var boolRate = validateInterestRate("txtInterestRate", "errInterestRate", 0, 99);
	        if (boolAmount && boolRate && boolTerm) {
	            var factor = 1;
	            var rate = parseFloat(interestRate) / 1200;
	            var interestRatePlusOne = parseFloat(rate) + 1;
	            for (var i = 0; i < months; i++) {
	                factor = parseFloat(factor) * parseFloat(interestRatePlusOne);
	            }	         
			
			
			document.getElementById("pullid").value="1";	
			var sizeOfWidgetId = document.getElementById("ddlWidth");
			sizeOfWidget = sizeOfWidgetId.options[sizeOfWidgetId.selectedIndex].value;

			var ddlFont = document.getElementById("ddlFont");
			ddlFontValue = ddlFont.options[ddlFont.selectedIndex].value;      
  
			//alert(sizeOfWidget);


      
			if(sizeOfWidget == 200){
			if(navigator.appName != 'Microsoft Internet Explorer'){
			document.getElementById("copypost").style.top = "905px";
			}			

			if(ddlFontValue=="Verdana"){
			 document.getElementById("inner_table").style.height = "476px";
		         document.getElementById("inner_boxmiddle").style.height = "376px";
			 }else{
                     	  document.getElementById("inner_table").style.height = "476px";
		         document.getElementById("inner_boxmiddle").style.height = "376px";
                         }	 

			}else if(sizeOfWidget == 225) {
			if(navigator.appName != 'Microsoft Internet Explorer'){				
			document.getElementById("copypost").style.top = "880px";
			}
			 if(ddlFontValue=="Verdana"){
			 document.getElementById("inner_table").style.height = "470px";
		         document.getElementById("inner_boxmiddle").style.height = "370px";
			 }else{
                     	  document.getElementById("inner_table").style.height = "470px";
		         document.getElementById("inner_boxmiddle").style.height = "370px";
                         }	
                         }
			 else if(sizeOfWidget == 250) {
			if(navigator.appName != 'Microsoft Internet Explorer'){	
			 document.getElementById("copypost").style.top = "895px";
			}
			 if(ddlFontValue=="Verdana"){
			 document.getElementById("inner_table").style.height = "475px";
		         document.getElementById("inner_boxmiddle").style.height = "375px";
			 }else{
                     	  document.getElementById("inner_table").style.height = "465px";
		         document.getElementById("inner_boxmiddle").style.height = "365px";
                         }	
                         }

			 else if(sizeOfWidget >= 275  &&  sizeOfWidget<=300 )  {
			if(navigator.appName != 'Microsoft Internet Explorer'){			 
			 document.getElementById("copypost").style.top = "895px";
			}			
			 if(ddlFontValue=="Verdana"){
			 document.getElementById("inner_table").style.height = "460px";
		         document.getElementById("inner_boxmiddle").style.height = "360px";
			 }else{
                     	  document.getElementById("inner_table").style.height = "455px";
		         document.getElementById("inner_boxmiddle").style.height = "355px";
                         }	
                         }
			else {
			 if(navigator.appName != 'Microsoft Internet Explorer'){
			 document.getElementById("copypost").style.top = "885px";
			 }
			 if(ddlFontValue=="Verdana"){
			 document.getElementById("inner_table").style.height = "450px";
		         document.getElementById("inner_boxmiddle").style.height = "350px";
			 }else{
                     	  document.getElementById("inner_table").style.height = "445px";
		         document.getElementById("inner_boxmiddle").style.height = "345px";
                         }	
                         }		
 	
	
	            var result = (parseFloat(parseFloat(loanAmount) * parseFloat(factor) * parseFloat(rate)) / (parseFloat(factor) - 1)).toFixed(2);
	            document.getElementById("rate").innerHTML = cleanVariable(document.getElementById("txtInterestRate").value)+"%";
		    if(document.getElementById("txtLoanTerm").value>1){	
	            document.getElementById("year").innerHTML = cleanVariable(document.getElementById("txtLoanTerm").value) +" years";
                    }else{
                    document.getElementById("year").innerHTML = cleanVariable(document.getElementById("txtLoanTerm").value) +" year";
                    
		    } 
	            document.getElementById("amount").innerHTML = formatCurrency(cleanVariable(document.getElementById("txtLaonAmount").value));
	            document.getElementById("monthlyPayment").innerHTML = formatCurrency(result);
	            document.getElementById("resultDiv").style.display = "block";
	            document.getElementById("btnText").innerHTML="Recalculate";
	        }
	        if(!checkForIE)
	        winResize();
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
         var selectedColor="1";
         function getColor(colorID)
         {
            if(colorID=="img1")
            {   
                selectedColor="1";
                document.getElementById("headerDiv").className = "BankrateFCC_boxhead-container-small" +" BankrateFCC_calc-blue-border";
                document.getElementById("bodyDiv").className = "BankrateFCC_calc-container-small" + " BankrateFCC_calc-blue" + " BankrateFCC_calc-blue-border";
                document.getElementById("resultDiv").className = "BankrateFCC_results-container" + " BankrateFCC_calc-blue-border";                
                document.getElementById("footerDiv").className = "BankrateFCC_footer-container small" +" BankrateFCC_calc-dkblue";
                
                
            }
            if(colorID=="img2")
            {   selectedColor="2";
                document.getElementById("headerDiv").className="BankrateFCC_boxhead-container-small" +" BankrateFCC_calc-orange-border";
                document.getElementById("bodyDiv").className = "BankrateFCC_calc-container-small" + " BankrateFCC_calc-orange" + " BankrateFCC_calc-orange-border";
                document.getElementById("resultDiv").className = "BankrateFCC_results-container" + " BankrateFCC_calc-orange-border";
                document.getElementById("footerDiv").className="BankrateFCC_footer-container small" +" BankrateFCC_calc-dkorange";
                
            }
            if(colorID=="img3")
            {   
                selectedColor="3";
                document.getElementById("headerDiv").className = "BankrateFCC_boxhead-container-small" +" BankrateFCC_calc-gray-border";
                document.getElementById("bodyDiv").className = "BankrateFCC_calc-container-small" + " BankrateFCC_calc-gray" + " BankrateFCC_calc-gray-border";
                document.getElementById("resultDiv").className = "BankrateFCC_results-container" + " BankrateFCC_calc-gray-border";
                document.getElementById("footerDiv").className = "BankrateFCC_footer-container small" +" BankrateFCC_calc-dkgray";
                
            }
            if(colorID=="img4")
            {   
                selectedColor="4";
                document.getElementById("headerDiv").className = "BankrateFCC_boxhead-container-small" +" BankrateFCC_calc-green-border";
                document.getElementById("bodyDiv").className = "BankrateFCC_calc-container-small" + " BankrateFCC_calc-green" + " BankrateFCC_calc-green-border";
                document.getElementById("resultDiv").className = "BankrateFCC_results-container" + " BankrateFCC_calc-green-border";
                document.getElementById("footerDiv").className = "BankrateFCC_footer-container small" +" BankrateFCC_calc-dkgreen";
                
            }
		          
		setTextArea();
            
         } 
         
         var ddlFontValue = "";
function getFontValue(){
		getWidgetSize(); 	
		var ddlFont = document.getElementById("ddlFont");
		ddlFontValue = ddlFont.options[ddlFont.selectedIndex].value;  
		var sizeOfWidgetId = document.getElementById("ddlWidth");
		sizeOfWidget = sizeOfWidgetId.options[sizeOfWidgetId.selectedIndex].value;
		var pulldiv=document.getElementById("pullid").value;
 if(pulldiv==1){
	if(sizeOfWidget == 200){
		for(ic=1;ic<=4;ic++){
		document.getElementById("result"+ic).style.width = "110px";}
		document.getElementById("year").style.width = "40px";
		document.getElementById("amount").style.width = "40px";
		document.getElementById("monthlyPayment").style.width = "40px";
		document.getElementById("rate").style.width = "40px";
		if(ddlFontValue=="Verdana"){
		document.getElementById("inner_table").style.height = "496px";
		document.getElementById("inner_boxmiddle").style.height = "396px";
		}else{
		document.getElementById("inner_table").style.height = "510px";
		document.getElementById("inner_boxmiddle").style.height = "410px";
		}
		document.getElementById("year").style.fontSize = '10px';
		document.getElementById("year").style.fontFamily = ddlFontValue;
		document.getElementById("rate").style.fontSize = '10px';
		document.getElementById("rate").style.fontFamily = ddlFontValue;
		document.getElementById("amount").style.fontSize = '10px';
		document.getElementById("amount").style.fontFamily = ddlFontValue;
		document.getElementById("monthlyPayment").style.fontSize = '10px';
		document.getElementById("monthlyPayment").style.fontFamily = ddlFontValue;
	}else if(sizeOfWidget == 225) {
		for(ic=1;ic<=4;ic++){
		document.getElementById("result"+ic).style.width = "140px";}
		document.getElementById("year").style.width = "40px";
		document.getElementById("amount").style.width = "40px";
		document.getElementById("monthlyPayment").style.width = "40px";
		document.getElementById("rate").style.width = "40px";
		document.getElementById("year").style.fontSize = '10px';
		document.getElementById("year").style.fontFamily = ddlFontValue;
		document.getElementById("rate").style.fontSize = '10px';
		document.getElementById("rate").style.fontFamily = ddlFontValue;
		document.getElementById("amount").style.fontSize = '10px';
		document.getElementById("amount").style.fontFamily = ddlFontValue;
		document.getElementById("monthlyPayment").style.fontSize = '10px';
		document.getElementById("monthlyPayment").style.fontFamily = ddlFontValue;
	}else if(sizeOfWidget==250){
		for(ic=1;ic<=4;ic++){
		document.getElementById("result"+ic).style.width = "155px";}
		document.getElementById("year").style.width = "50px";
		document.getElementById("amount").style.width = "50px";
		document.getElementById("monthlyPayment").style.width = "50px";
		document.getElementById("rate").style.width = "50px";
		document.getElementById("year").style.fontSize = '11px';
		document.getElementById("year").style.fontFamily = ddlFontValue;
		document.getElementById("rate").style.fontSize = '11px';
		document.getElementById("rate").style.fontFamily = ddlFontValue;
		document.getElementById("amount").style.fontSize = '11px';
		document.getElementById("amount").style.fontFamily = ddlFontValue;
		document.getElementById("monthlyPayment").style.fontSize = '11px';
		document.getElementById("monthlyPayment").style.fontFamily = ddlFontValue;
	}else if(sizeOfWidget==275){
		for(ic=1;ic<=4;ic++){
		document.getElementById("result"+ic).style.width = "170px";}
		document.getElementById("year").style.width = "60px";
		document.getElementById("amount").style.width = "60px";
		document.getElementById("monthlyPayment").style.width = "60px";
		document.getElementById("rate").style.width = "60px";
		document.getElementById("year").style.fontSize = '12px';
		document.getElementById("year").style.fontFamily = ddlFontValue;
		document.getElementById("rate").style.fontSize = '12px';
		document.getElementById("rate").style.fontFamily = ddlFontValue;
		document.getElementById("amount").style.fontSize = '12px';
		document.getElementById("amount").style.fontFamily = ddlFontValue;
		document.getElementById("monthlyPayment").style.fontSize = '12px';
		document.getElementById("monthlyPayment").style.fontFamily = ddlFontValue;
	}else if(sizeOfWidget==300){
		for(ic=1;ic<=4;ic++){
		document.getElementById("result"+ic).style.width = "180px";}
		document.getElementById("year").style.width = "60px";
		document.getElementById("amount").style.width = "60px";
		document.getElementById("monthlyPayment").style.width = "60px";
		document.getElementById("rate").style.width = "60px";
		document.getElementById("year").style.fontSize = '12px';
		document.getElementById("year").style.fontFamily = ddlFontValue;
		document.getElementById("rate").style.fontSize = '12px';
		document.getElementById("rate").style.fontFamily = ddlFontValue;
		document.getElementById("amount").style.fontSize = '12px';
		document.getElementById("amount").style.fontFamily = ddlFontValue;
		document.getElementById("monthlyPayment").style.fontSize = '12px';
		document.getElementById("monthlyPayment").style.fontFamily = ddlFontValue;
	}else if(sizeOfWidget==325){
		for(ic=1;ic<=4;ic++){
		document.getElementById("result"+ic).style.width = "210px";}
		document.getElementById("year").style.width = "70px";
		document.getElementById("amount").style.width = "70px";
		document.getElementById("monthlyPayment").style.width = "70px";
		document.getElementById("rate").style.width = "70px";
		document.getElementById("year").style.fontSize = '13px';
		document.getElementById("year").style.fontFamily = ddlFontValue;
		document.getElementById("rate").style.fontSize = '13px';
		document.getElementById("rate").style.fontFamily = ddlFontValue;
		document.getElementById("amount").style.fontSize = '13px';
		document.getElementById("amount").style.fontFamily = ddlFontValue;
		document.getElementById("monthlyPayment").style.fontSize = '13px';
		document.getElementById("monthlyPayment").style.fontFamily = ddlFontValue;
	}else if(sizeOfWidget==350){
		for(ic=1;ic<=4;ic++){
		document.getElementById("result"+ic).style.width = "210px";}
		document.getElementById("year").style.width = "70px";
		document.getElementById("amount").style.width = "70px";
		document.getElementById("monthlyPayment").style.width = "70px";
		document.getElementById("rate").style.width = "70px";
		document.getElementById("year").style.fontSize = '14px';
		document.getElementById("year").style.fontFamily = ddlFontValue;
		document.getElementById("rate").style.fontSize = '14px';
		document.getElementById("rate").style.fontFamily = ddlFontValue;
		document.getElementById("amount").style.fontSize = '14px';
		document.getElementById("amount").style.fontFamily = ddlFontValue;
		document.getElementById("monthlyPayment").style.fontSize = '14px';
		document.getElementById("monthlyPayment").style.fontFamily = ddlFontValue;			
	}

 }
} 
function setFontFamily() {
		var ddlFont = document.getElementById("ddlFont");
		ddlFontValue = ddlFont.options[ddlFont.selectedIndex].value;

		var sizeOfWidgetId = document.getElementById("ddlWidth");
		sizeOfWidget = sizeOfWidgetId.options[sizeOfWidgetId.selectedIndex].value;


		if(sizeOfWidget==200){

			if(ddlFontValue=="Verdana"){
			document.getElementById("result3").style.width = '80px';
			document.getElementById("amount").style.width = '80px';

			}	
		}

		if(sizeOfWidget==275){

			if(ddlFontValue=="Verdana"){
			document.getElementById("result3").style.width = '131px';
			document.getElementById("amount").style.width = '101px';

			}	
		}
		

		if(sizeOfWidget==300){

			if(ddlFontValue=="Verdana"){
			document.getElementById("result3").style.width = '120px';
			document.getElementById("amount").style.width = '125px';

			}	
		}
		
		

		if(sizeOfWidget==350){

			if(ddlFontValue=="Verdana"){
			document.getElementById("result3").style.width = '170px';
			document.getElementById("amount").style.width = '115px';

			}	
		}

		for(var i=1;i<=3;i++)
		document.getElementById("ip"+i).style.fontFamily=ddlFontValue;
		document.getElementById("year").style.fontFamily=ddlFontValue;
		document.getElementById("rate").style.fontFamily=ddlFontValue;
		document.getElementById("amount").style.fontFamily=ddlFontValue;
		document.getElementById("monthlyPayment").style.fontFamily=ddlFontValue;
		document.getElementById("mrtgTitle").style.fontFamily=ddlFontValue;
		for(var j=1;j<=4;j++)
		document.getElementById("result"+j).style.fontFamily=ddlFontValue;
		setTextArea();
		if(!checkForIE)
		winResize();
}
       
function setLogoSize(){
		if(sizeOfWidget == "250" && ddlFontValue == "Verdana")
		document.getElementById("mrtCalBrLogo").style.width="102px";
		else
		document.getElementById("mrtCalBrLogo").style.width="115px";
}
        
        	var sizeOfWidget = "";
function getWidgetSize(){
            	var sizeOfWidgetId = document.getElementById("ddlWidth");
            	sizeOfWidget = sizeOfWidgetId.options[sizeOfWidgetId.selectedIndex].value;        
}
function widgetSize() {

	getWidgetSize();
	getFontValue();
	var ddlFont = document.getElementById("ddlFont");
	var ddlFontValue = ddlFont.options[ddlFont.selectedIndex].value;   
	var pulldiv=document.getElementById("pullid").value;	




if(pulldiv==1)
{
		if(sizeOfWidget == 200) {


				if(navigator.appName != 'Microsoft Internet Explorer'){
				document.getElementById("copypost").style.top = "905px";
				}
				if(ddlFontValue=="Verdana"){
				document.getElementById("inner_table").style.height = "486px";
				document.getElementById("inner_boxmiddle").style.height = "386px";
				}else{
				document.getElementById("inner_table").style.height = "475px";
				document.getElementById("inner_boxmiddle").style.height = "375px";
				}	
		}else if(sizeOfWidget == 225) {
				if(navigator.appName != 'Microsoft Internet Explorer'){
				document.getElementById("copypost").style.top = "890px";
				}					

				if(ddlFontValue=="Verdana"){
				document.getElementById("inner_table").style.height = "481px";
				document.getElementById("inner_boxmiddle").style.height = "381px";
				}else{
				document.getElementById("inner_table").style.height = "450px";
				document.getElementById("inner_boxmiddle").style.height = "370px";
				}	
		}else if(sizeOfWidget == 250) {
				if(navigator.appName != 'Microsoft Internet Explorer'){
				 document.getElementById("copypost").style.top = "895px";
				}				 

				if(ddlFontValue=="Verdana"){
				document.getElementById("inner_table").style.height = "475px";
				document.getElementById("inner_boxmiddle").style.height = "375px";
				}else{
				document.getElementById("inner_table").style.height = "465px";
				document.getElementById("inner_boxmiddle").style.height = "365px";
				}	

		}else if(sizeOfWidget == 275) {
				if(navigator.appName != 'Microsoft Internet Explorer'){	
				 document.getElementById("copypost").style.top = "895px";
				 }
				if(ddlFontValue=="Verdana"){
				document.getElementById("inner_table").style.height = "460px";
				document.getElementById("inner_boxmiddle").style.height = "360px";
				}else{
				document.getElementById("inner_table").style.height = "455px";
				document.getElementById("inner_boxmiddle").style.height = "355px";
				}	


		} else if(sizeOfWidget ==300) {
				if(navigator.appName != 'Microsoft Internet Explorer'){
				document.getElementById("copypost").style.top = "885px";
				}				 

				if(ddlFontValue=="Verdana"){
				document.getElementById("inner_table").style.height = "460px";
				document.getElementById("inner_boxmiddle").style.height = "360px";
				}else{
				document.getElementById("inner_table").style.height = "455px";
				document.getElementById("inner_boxmiddle").style.height = "355px";
				}	


		} else if(sizeOfWidget ==325) {
				if(navigator.appName != 'Microsoft Internet Explorer'){
				document.getElementById("copypost").style.top = "885px";
				}				 

				if(ddlFontValue=="Verdana"){
				document.getElementById("inner_table").style.height = "460px";
				document.getElementById("inner_boxmiddle").style.height = "360px";
				}else{
				document.getElementById("inner_table").style.height = "455px";
				document.getElementById("inner_boxmiddle").style.height = "355px";
				}	


		}else if(sizeOfWidget ==350) {
				if(navigator.appName != 'Microsoft Internet Explorer'){
				document.getElementById("copypost").style.top = "885px";
				}				 
				if(ddlFontValue=="Verdana"){
				document.getElementById("inner_table").style.height = "450px";		   
				document.getElementById("inner_boxmiddle").style.height = "350px";
				}else{
				document.getElementById("inner_table").style.height = "445px";
				document.getElementById("inner_boxmiddle").style.height = "345px";
				}	
		}




}
						 


if(sizeOfWidget=="200"){   
			document.getElementById("mrtgTitle").className = "BankrateFCC_boxhead_200_auto";
			document.getElementById("mrtCalBrLogo").style.width = "115px";
			document.getElementById("mrtgTitle").style.width = "36px";	
			document.getElementById("mrtgTitle").style.height = "12px";
			document.getElementById("mrtgTitle").style.fontSize = '9px';
			document.getElementById("widgetpadding").style.margin = "0px 0px 0px 140px";
			for (var i = 1; i <= 3; i++){
			document.getElementById("ip" + i).style.width = "110px";
			document.getElementById("ip" + i).style.fontSize = '10px';
			}
			for (var r = 1; r <= 4; r++){
			document.getElementById("result" + r).style.fontSize = '10px';
			document.getElementById("result" + r).style.width = '94px';
			}
			document.getElementById("result1").style.width = '103px';
			document.getElementById("year").style.fontSize = '9px';
			document.getElementById("rate").style.fontSize = '9px';
			document.getElementById("amount").style.fontSize = '9px';
			document.getElementById("monthlyPayment").style.fontSize = '9px';
			document.getElementById("year").style.width = '54px';
			document.getElementById("ratex").style.width = '74px';
			document.getElementById("amount").style.width = '74px';
			document.getElementById("monthlyPayment").style.width = '74px';
			if(pulldiv==0){

			if(ddlFontValue=="Verdana"){
			document.getElementById("inner_table").style.height = "356px";
			document.getElementById("inner_boxmiddle").style.height = "256px";
			}else{
			document.getElementById("inner_table").style.height = "350px";  //490
			document.getElementById("inner_boxmiddle").style.height = "250px"; //390
			}
			}


			if(ddlFontValue=="Verdana"){
			document.getElementById("result3").style.width = '80px';
			document.getElementById("amount").style.width = '80px';

			}
} else if (sizeOfWidget == "225") {  
			document.getElementById("mrtgTitle").className = "BankrateFCC_boxhead_200_auto";
			document.getElementById("widgetpadding").style.margin = "0px 0px 0px 130px";
			document.getElementById("mrtCalBrLogo").style.width = "111px";
			document.getElementById("mrtgTitle").style.width = "26%";	
			document.getElementById("mrtgTitle").style.height = "12px";
			document.getElementById("mrtgTitle").style.fontSize = '9px';
			for (var i = 1; i <= 3; i++){
			document.getElementById("ip" + i).style.width = "105px";
			document.getElementById("ip" + i).style.fontSize = '10px';
			document.getElementById("ip" + i).style.width = '123px';
			}
			for (var r = 1; r <= 4; r++){
			document.getElementById("result" + r).style.fontSize = '10px';
			document.getElementById("result" + r).style.width = '96px';
			}
			document.getElementById("result1").style.height = '9px';
			if(pulldiv==0){
				if(ddlFontValue=="Verdana"){
				document.getElementById("inner_table").style.height = "356px";
				document.getElementById("inner_boxmiddle").style.height = "256px";
				document.getElementById("result1").style.height = '103px';
				document.getElementById("year").style.width = '60px';
				}else{
				document.getElementById("inner_table").style.height = "350px";  //490
				document.getElementById("inner_boxmiddle").style.height = "250px"; //390

				}	 
			}
			document.getElementById("year").style.width='93px';									
			document.getElementById("ratex").style.width = '93px';
			document.getElementById("amount").style.width = '93px';
			document.getElementById("monthlyPayment").style.width = '93px';

} else if (sizeOfWidget == "250") {   //alert(sizeOfWidget)
			document.getElementById("mrtgTitle").className = "BankrateFCC_boxhead_200_auto";
			document.getElementById("widgetpadding").style.margin = "0px 0px 0px 120px";
			document.getElementById("mrtCalBrLogo").style.width = "115px";
			document.getElementById("mrtgTitle").style.height = "12px";
			document.getElementById("mrtgTitle").style.width = "26%";	
			document.getElementById("mrtgTitle").style.fontSize = '10px';
			for (var i = 1; i <= 3; i++){
			document.getElementById("ip" + i).style.width = "125px";
			document.getElementById("ip" + i).style.fontSize = '11px';
			document.getElementById("ip" + i).style.width = '150px';
			}

			for (var r = 1; r <= 4; r++){
			document.getElementById("result" + r).style.fontSize = '10px';
			document.getElementById("result" + r).style.width = '115px';
			}

			document.getElementById("result1" ).style.height = '10px';
			document.getElementById("year").style.fontSize = '10px';
			document.getElementById("rate").style.fontSize = '10px';
			document.getElementById("amount").style.fontSize = '10px';
			document.getElementById("monthlyPayment").style.fontSize = '10px';

			if(pulldiv==0){
			if(ddlFontValue=="Verdana"){
			document.getElementById("inner_table").style.height = "346px";
			document.getElementById("inner_boxmiddle").style.height = "246px";
			}else{
			document.getElementById("inner_table").style.height = "350px";  //490
			document.getElementById("inner_boxmiddle").style.height = "250px"; //390
			}	 

			}
			document.getElementById("year").style.width = '93px';
			document.getElementById("ratex").style.width = '93px';
			document.getElementById("amount").style.width = '93px';
			document.getElementById("monthlyPayment").style.width = '93px';
}else if(sizeOfWidget == 275){  
			document.getElementById("year").style.fontSize = '11px';
			document.getElementById("year").style.fontFamily = ddlFontValue;
			document.getElementById("rate").style.fontSize = '11px';
			document.getElementById("rate").style.fontFamily = ddlFontValue;
			document.getElementById("amount").style.fontSize = '11px';
			document.getElementById("amount").style.fontFamily = ddlFontValue;
			document.getElementById("monthlyPayment").style.fontSize = '11px';
			document.getElementById("monthlyPayment").style.fontFamily = ddlFontValue;
			document.getElementById("widgetpadding").style.margin = "0px 0px 0px 105px";
			document.getElementById("mrtgTitle").style.fontSize = '11px';
			for (var ii = 1; ii <= 3; ii++){
			document.getElementById("ip" + ii).style.fontSize = '12px';
			document.getElementById("ip" + ii).style.width = '180px';
			}       
			for (var r = 1; r <= 4; r++){
			document.getElementById("result" + r).style.fontSize = '12px';
			document.getElementById("result" + r).style.width = '151px';
			}  
			if(pulldiv==0){
				if(ddlFontValue=="Verdana"){
				document.getElementById("inner_table").style.height = "346px";
				document.getElementById("inner_boxmiddle").style.height = "246px";
				}else{
				document.getElementById("inner_table").style.height = "350px";  //490
				document.getElementById("inner_boxmiddle").style.height = "250px"; //390
				}	
			}

			
			if(ddlFontValue=="Verdana"){
			document.getElementById("result3").style.width = '131px';
			document.getElementById("amount").style.width = '101px';
			}else{
			document.getElementById("amount").style.width = '91px';
			}

			document.getElementById("year").style.width = '91px';
			document.getElementById("ratex").style.width = '91px';
			
			document.getElementById("monthlyPayment").style.width = '91px';
} else	if(sizeOfWidget == 300) { //alert(sizeOfWidget)
			document.getElementById("year").style.fontSize = '12px';
			document.getElementById("year").style.fontFamily = ddlFontValue;
			document.getElementById("rate").style.fontSize = '12px';
			document.getElementById("rate").style.fontFamily = ddlFontValue;
			document.getElementById("amount").style.fontSize = '12px';
			document.getElementById("amount").style.fontFamily = ddlFontValue;
			document.getElementById("monthlyPayment").style.fontSize = '12px';
			document.getElementById("mrtgTitle").style.fontSize = '12px';
			document.getElementById("monthlyPayment").style.fontFamily = ddlFontValue;
			document.getElementById("widgetpadding").style.margin = "0px 0px 0px 90px";
			for (var ii = 1; ii <= 3; ii++){
			document.getElementById("ip" + ii).style.fontSize = '13px';
			document.getElementById("ip" + ii).style.width = '180px';
			}       
			for (var r = 1; r <= 4; r++){
			document.getElementById("result" + r).style.fontSize = '13px';
			document.getElementById("result" + r).style.width = '166px';
			}  
			document.getElementById("year").style.width = '102px';
			document.getElementById("ratex").style.width = '102px';
			document.getElementById("amount").style.width = '102px';
			document.getElementById("monthlyPayment").style.width = '102px';
			if(pulldiv==0){
				if(ddlFontValue=="Verdana"){
				document.getElementById("inner_table").style.height = "346px";
				document.getElementById("inner_boxmiddle").style.height = "246px";
				}else{
				document.getElementById("inner_table").style.height = "350px";  //490
				document.getElementById("inner_boxmiddle").style.height = "250px"; //390
				}

			
	
			}

			if(ddlFontValue=="Verdana"){
			document.getElementById("result3").style.width = '120px';
			document.getElementById("amount").style.width = '125px';

			}

}else if(sizeOfWidget == 325) {  //alert(sizeOfWidget)
			document.getElementById("year").style.fontSize = '13px';
			document.getElementById("year").style.fontFamily = ddlFontValue;
			document.getElementById("rate").style.fontSize = '13px';
			document.getElementById("rate").style.fontFamily = ddlFontValue;
			document.getElementById("amount").style.fontSize = '13px';
			document.getElementById("amount").style.fontFamily = ddlFontValue;
			document.getElementById("monthlyPayment").style.fontSize = '13px';
			document.getElementById("monthlyPayment").style.fontFamily = ddlFontValue;
			document.getElementById("widgetpadding").style.margin = "0px 0px 0px 75px";
			document.getElementById("mrtgTitle").style.fontSize = '12px';
			for (var ii = 1; ii <= 3; ii++){
			document.getElementById("ip" + ii).style.fontSize = '13px';
			document.getElementById("ip" + ii).style.width = '180px';
			}       
			for (var r = 1; r <= 4; r++){
			document.getElementById("result" + r).style.fontSize = '13px';
			document.getElementById("result" + r).style.width = '170px';
			}  
			document.getElementById("result1").style.width = '190px';
			document.getElementById("year").style.width = '100px';
			document.getElementById("ratex").style.width = '122px';
			document.getElementById("amount").style.width = '122px';
			document.getElementById("monthlyPayment").style.width = '122px';
			if(pulldiv==0){
				if(ddlFontValue=="Verdana"){
				document.getElementById("inner_table").style.height = "346px";
				document.getElementById("inner_boxmiddle").style.height = "246px";
				}else{
				document.getElementById("inner_table").style.height = "350px";  //490
				document.getElementById("inner_boxmiddle").style.height = "250px"; //390
				}	
			}
}else if(sizeOfWidget == 350) { 
			document.getElementById("year").style.fontSize = '13px';
			document.getElementById("year").style.fontFamily = ddlFontValue;
			document.getElementById("rate").style.fontSize = '13px';
			document.getElementById("rate").style.fontFamily = ddlFontValue;
			document.getElementById("amount").style.fontSize = '13px';
			document.getElementById("amount").style.fontFamily = ddlFontValue;
			document.getElementById("monthlyPayment").style.fontSize = '13px';
			document.getElementById("monthlyPayment").style.fontFamily = ddlFontValue;
			document.getElementById("year").style.width = '110px';
			document.getElementById("ratex").style.width = '110px';
			document.getElementById("amount").style.width = '110px';
			document.getElementById("monthlyPayment").style.width = '110px';
			document.getElementById("widgetpadding").style.margin = "0px 0px 0px 65px";
			document.getElementById("mrtgTitle").style.fontSize = '12px';
			for (var ii = 1; ii <= 3; ii++){
			document.getElementById("ip" + ii).style.fontSize = '14px';
			document.getElementById("ip" + ii).style.width = '180px';
			}       
			for (var r = 1; r <= 4; r++){
			document.getElementById("result" + r).style.fontSize = '14px';
			document.getElementById("result" + r).style.width = '200px';
			}  
				if(pulldiv==0){
					if(ddlFontValue=="Verdana"){
					document.getElementById("inner_table").style.height = "346px";
					document.getElementById("inner_boxmiddle").style.height = "246px";
					}else{
					document.getElementById("inner_table").style.height = "350px";  //490
					document.getElementById("inner_boxmiddle").style.height = "250px"; //390
					}	
				}

			if(ddlFontValue=="Verdana"){
			document.getElementById("result3").style.width = '170px';
			document.getElementById("amount").style.width = '115px';

			}


			}
		document.getElementById("headerDiv").style.width = parseInt(sizeOfWidget) + "px";
		document.getElementById("bodyDiv").style.width = sizeOfWidget - parseInt(20) + "px";
		document.getElementById("footerDiv").style.width = parseInt(sizeOfWidget) + parseInt(2) + "px";
		setTextArea();
		if(!checkForIE)
		winResize();
} 
		function selectAll()
		{
		   var tempVal= document.getElementById("sourcehtml");
		   tempVal.focus();
		   tempVal.select();
		}
		function setTextArea() {
		var str = "";
		var sc='script';
		str = '[Bankratemortgagecalculator ';
		str +='color='+'"color'+selectedColor+'"  ';
		str +='fonttype='+'"'+ddlFontValue+'"  ';
		str +='size='+'"'+sizeOfWidget+'"';
		str += ']'; 
		document.getElementById("sourcehtml").value = str;

		}
			var clip1 = "";
			var clip2="";
			function winResize() {

			// clip2.reposition('btnCopyOther2');
			}
			function $(id) { return document.getElementById(id); }


		window.onload = function init()
		{
		var ie = (typeof window.ActiveXObject != 'undefined');
		if(ie)
		{  

		document.getElementById("btnForOther2").style.display ="none";
		
		document.getElementById("btnForIE2").style.display ="block";
		
		checkForIE = true;
		}
		else
		{
		document.getElementById("btnForOther2").style.display ="block";
		
		document.getElementById("btnForIE2").style.display ="none";
		
		var fpath=document.getElementById("hiddenval").value;    
		clip2 = new ZeroClipboard.Client(fpath+"ZeroClipboard.swf");
		
		document.getElementById("sourcehtml").value = "";
		clip2.setHandCursor(true);
		clip2.addEventListener('load', my_load);
		clip2.addEventListener('mouseOver', my_mouse_over);
		clip2.addEventListener('complete', my_complete);
		clip2.glue('btnCopyOther2');

		

		}

		getColor();
		getWidgetSize();
		getFontValue();
		setFontFamily();
		widgetSize();
		if(!checkForIE)
		winResize();

		}

		function my_load(client) {
		//alert();
		}

		function my_mouse_over(client) { clip2.setText($('sourcehtml').value); }
		


		function my_complete(client, text) {
		//alert();
		}

		function ClipBoard() {
		var txtArea = document.getElementById("sourcehtml");
		Copied = txtArea.createTextRange();
		Copied.execCommand("Copy");
		} 

		window.onresize = function res(){
		if(!checkForIE)
		winResize();
		}

		window.onscroll = function scro(){ 
		if(!checkForIE)
		winResize();
		}                    
