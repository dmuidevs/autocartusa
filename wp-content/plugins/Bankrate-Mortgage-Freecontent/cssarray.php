<?php
  if(($color=='color1')||($color=='blue')): 

                      $colorarray=array(
					'headerDiv' 	=> 	'BankrateFCC_boxhead-container-small BankrateFCC_calc-blue-border', 
					'bodyDiv' 	=> 	'BankrateFCC_calc-container-small BankrateFCC_calc-blue BankrateFCC_calc-blue-border',
					'resultDiv' 	=> 	'BankrateFCC_results-container BankrateFCC_calc-blue-border',
					'footerDiv' 	=> 	'BankrateFCC_footer-container small BankrateFCC_calc-dkblue');

                       $view_color=1; 

                      elseif(($color=='color2')||($color=='orange')): 
                      $colorarray=array(
					'headerDiv' 	=> 	'BankrateFCC_boxhead-container-small BankrateFCC_calc-orange-border', 
					'bodyDiv' 	=> 	'BankrateFCC_calc-container-small BankrateFCC_calc-orange BankrateFCC_calc-orange-border',
					'resultDiv' 	=> 	'BankrateFCC_results-container BankrateFCC_calc-orange-border',
					'footerDiv' 	=> 	'BankrateFCC_footer-container small BankrateFCC_calc-dkorange');
                      $view_color=2; 

                     elseif(($color=='color3')||($color=='gray')): 
                      $colorarray=array(
					'headerDiv' 	=> 	'BankrateFCC_boxhead-container-small BankrateFCC_calc-gray-border', 
				        'bodyDiv' 	=> 	'BankrateFCC_calc-container-small BankrateFCC_calc-gray BankrateFCC_calc-gray-border',
                                        'resultDiv' 	=> 	'BankrateFCC_results-container BankrateFCC_calc-gray-border',
                                        'footerDiv' 	=> 	'BankrateFCC_footer-container small BankrateFCC_calc-dkgray');
                      $view_color=3; 


                     elseif(($color=='color4')||($color=='green')): 
                      $colorarray=array(
					'headerDiv' 	=> 	'BankrateFCC_boxhead-container-small BankrateFCC_calc-green-border', 
					'bodyDiv' 	=> 	'BankrateFCC_calc-container-small BankrateFCC_calc-green BankrateFCC_calc-green-border',
					'resultDiv' 	=> 	'BankrateFCC_results-container BankrateFCC_calc-green-border',
					'footerDiv' 	=> 	'BankrateFCC_footer-container small BankrateFCC_calc-dkgreen'); 
		       $view_color=4;

                      else:

		      $colorarray=array(
					'headerDiv' 	=> 	'BankrateFCC_boxhead-container-small BankrateFCC_calc-blue-border', 
					'bodyDiv' 	=> 	'BankrateFCC_calc-container-small BankrateFCC_calc-blue BankrateFCC_calc-blue-border',
					'resultDiv' 	=> 	'BankrateFCC_results-container BankrateFCC_calc-blue-border',
					'footerDiv' 	=> 	'BankrateFCC_footer-container small BankrateFCC_calc-dkblue');

                       $view_color=1; 	
   
      endif;
      if($size=='200'): $headerDivs= $size;$bodyDivs= $size - 20;$footerDivs= $size + 2;$titleclass="BankrateFCC_boxhead_200_auto";
      $logowidth="115";  if($ftype=="Verdana"){  $cfont="font-size:9px;";$wsize=120;$tsize="width:53px;";    }else { $cfont="font-size:10px;"; $wsize=105;}   $twid="26%";$theig="14px"; $labwi="width:94px;";$rlabwi="width:74px;";

      elseif($size=='225'):$wsize=123; $headerDivs= $size-7;$bodyDivs= $size - 27;$footerDivs= $size - 5;$titleclass="BankrateFCC_boxhead_200_auto";
      $logowidth="115";if($ftype=="Verdana"){  $cfont="font-size:9px;"; }else { $cfont="font-size:11px;";}  ;$twid="26%";$theig="14px";$labwi="width:93px;";$rlabwi="width:93px;";
	  
	  
	  
      elseif($size=='250'):$wsize=150; $headerDivs= $size;$bodyDivs= $size - 20;$footerDivs= $size + 2;$titleclass="BankrateFCC_boxhead_200_auto";
      $logowidth="115"; $titlefsize="11";$twid="20%";$theig="14px";$cfont="font-size:11px";$labwi="width:109px;";$rlabwi="width:109px;";
	  
	  
      if($ftype=="Verdana"){  $cfont="font-size:9px;";   }else { $cfont="font-size:11px;";}		
	  
      elseif($size=='275'):$wsize=180; $headerDivs= $size;$bodyDivs= $size - 20;$footerDivs= $size + 2;$titleclass="BankrateFCC_boxhead_200_auto";
       $logowidth="115"; $titlefsize="11";$twid="20%";$theig="14px";$cfont="font-size:12px";$labwi="width:156px;";$rlabwi="width:86px;";
       if($ftype=="Verdana"){  $cfont="font-size:11px;";   }else { $cfont="font-size:12px;";}

       elseif($size=='300'):$wsize=180; $headerDivs= $size;$bodyDivs= $size - 20;$footerDivs= $size + 2;$titleclass="BankrateFCC_boxhead_200_auto";
       $logowidth="115"; $titlefsize="11";$twid="20%";$theig="14px";$labwi="width:166px;";$rlabwi="width:102px;";
	   
	   
       if($ftype=="Verdana"){  $cfont="font-size:12px;";   }else { $cfont="font-size:13px;";}	
      else: $wsize=180;$headerDivs= $size;$bodyDivs= $size - 20;$footerDivs= $size + 2;$titleclass="BankrateFCC_boxhead"; 
       $logowidth="115";    if($ftype=="Verdana"){  $cfont="font-size:12px;";   }else { $cfont="font-size:13px;";}        
       $titlefsize="12"; $theig="14px";$labwi="width:170px;"; $rlabwi="width:122px;"; endif;
?>
