<script type="text/javascript" src="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent';?>/scripts/freecontent.js"></script>
<link rel="stylesheet" href="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent';?>/style/main-width-style.css" type="text/css">
<div id="mainDiv" style="clear:both;">

<div style="width:<?php echo $headerDivs; ?>px; overflow:hidden;" id="headerDiv" class="<?php echo $colorarray['headerDiv']; ?>">
							<div style="position:relative;font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?>width:<?php echo $twid; ?>;height:<?php echo $theig; ?>;align:top;" id="mrtgTitle" class="<?php echo $titleclass; ?>"><?php echo _e('Mortgage&nbsp;Calculator'); ?></div>
							<a href="http://www.bankrate.com/free-content/" target="_blank" rel="nofollow" title="Add this mortgage calculator widget to your site">
								<img id="mrtCalBrLogo" src="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent';?>/images/widget-logo.gif" alt="Bankrate.com" width="<?php echo $logowidth; ?>" height="23" align="right" border="0" style="float:right;">
							</a>
						</div>



 <div style="width:<?php echo $bodyDivs; ?>px;" id="bodyDiv" class="<?php echo $colorarray['bodyDiv']; ?>">
		                  <div style="font-family: <?php echo $ftype; ?>; width: <?php echo $wsize; ?>px;<?php echo $cfont; ?>" id="ip1" class="BankrateFCC_col1"><?php echo _e('Mortgage amount ($):'); ?></div>
		                  <div class="BankrateFCC_col2" style="height:10px;">
<!--
class="BankrateFCC_sel-options" -->		                    
<input  id="txtLaonAmount<?php echo the_ID(); ?>" class="BankrateFCC_sel-options" type="text" 
style="height:18px;vertical-align:middle; line-height:12px;position:relative;font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?><?php echo $tsize; ?>" >
		                  </div>
		                  <div class="BankrateFCC_colFull">

		                    <span id="errLoanAmount<?php echo the_ID(); ?>" class="BankrateFCC_form-error"></span>
		                  </div>
		
		                  <div style="font-family: <?php echo $ftype; ?>; width: <?php echo $wsize; ?>px;<?php echo $cfont; ?>" id="ip2" class="BankrateFCC_col1"><?php echo _e('Interest rate (%):'); ?></div>
		                  <div class="BankrateFCC_col2" style="height:10px;">
		                    <input class="BankrateFCC_sel-options" id="txtInterestRate<?php echo the_ID(); ?>" type="text" style="height:18px;vertical-align:middle; line-height:12px;position:relative;font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?><?php echo $tsize; ?>">
		                  </div>
		                  <div class="BankrateFCC_colFull">
		                    <span id="errInterestRate<?php echo the_ID(); ?>" class="BankrateFCC_form-error"></span>

		                  </div>
		
		                  <div style="font-family: <?php echo $ftype; ?>; width: <?php echo $wsize; ?>px;<?php echo $cfont; ?> line-height:14px;" id="ip3" class="BankrateFCC_col1"><?php echo _e('Mortgage term (years):'); ?></div>
		                  <div class="BankrateFCC_col2" style="height:10px;">
		                    <input class="BankrateFCC_sel-options" id="txtLoanTerm<?php echo the_ID(); ?>" type="text" style="height:18px;vertical-align:middle; line-height:12px;position:relative;font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?><?php echo $tsize; ?>" >
		                  </div>
		                  <div class="BankrateFCC_colFull">
		                    <span id="errLoanTerm<?php echo the_ID(); ?>" class="BankrateFCC_form-error"></span>
		                  </div>

		
		                  <div class="BankrateFCC_button-small">
		                    <div >
		                      <a id="btnText<?php echo the_ID(); ?>" href="javascript:onclick=CalculateMonthlyPayment('<?php echo the_ID(); ?>')"><?php echo _e('Calculate'); ?></a>
		                    </div>
		                  </div>



		                  <div id="resultDiv<?php echo the_ID(); ?>" style="display: none;overflow:hidden;" class="<?php echo $colorarray['resultDiv']; ?>">
		                  

			 <div class="BankrateFCC_results-col2" 
		                       style="font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?>;<?php echo $rlabwi; ?>;height:30px; line-height:11px;  float:right;" id="year<?php echo the_ID(); ?>"></div>
                                 
				   <div style="font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?><?php echo $labwi; ?>; float:left; height:30px;" id="result1" class="BankrateFCC_results-col1"><?php echo _e('Monthly payment duration:'); ?></div>
		                    
				  
		                   
			         			


	                          <div class="BankrateFCC_results-col2"
		                      style="font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?>;<?php echo $rlabwi; ?>;height:27px;   float:right;" id="rate<?php echo the_ID(); ?>"> </div>
		                    <div style="font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?><?php echo $labwi; ?>; float:left; height:30px;" id="result2" class="BankrateFCC_results-col1" ><?php echo _e('Interest rate:'); ?></div>
		                    
		                 
				  




				 <?php  if($size==200 && $ftype=="Verdana"){ ?>	
				  	<div class="BankrateFCC_results-col2"  
		                      style="font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?>;width: 84px;height:27px; float:right;" id="amount<?php echo the_ID(); ?>"></div>
		                    <div style="font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?> ;width: 84px; float:left; height:30px;" id="result3" class="BankrateFCC_results-col1"><?php echo _e('Loan amount:'); ?></div>


<?php } else if($size==250 && $ftype=="Verdana"){ ?>	
				  	<div class="BankrateFCC_results-col2"  
		                      style="font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?>;width: 84px;height:27px; float:right;" id="amount<?php echo the_ID(); ?>"></div>
		                    <div style="font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?> ;width: 84px; float:left; height:30px;" id="result3" class="BankrateFCC_results-col1"><?php echo _e('Loan amount:'); ?></div>
		                   

<?php } else if($size==275 && $ftype=="Verdana"){ ?>	
				  	<div class="BankrateFCC_results-col2"  
		                      style="font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?>;width: 115px;height:27px; float:right;" id="amount<?php echo the_ID(); ?>"></div>
		                    <div style="font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?> ;width: 94px; float:left; height:30px;" id="result3" class="BankrateFCC_results-col1"><?php echo _e('Loan amount:'); ?></div>


<?php } else if($size==300 && $ftype=="Verdana"){ ?>	
				  	<div class="BankrateFCC_results-col2"  
		                      style="font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?>;width: 115px;height:27px; float:right;" id="amount<?php echo the_ID(); ?>"></div>
		                    <div style="font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?> ;width: 94px; float:left; height:30px;" id="result3" class="BankrateFCC_results-col1"><?php echo _e('Loan amount:'); ?></div>
		                    <?php }else{ ?>

		                   
		                    	
			<div class="BankrateFCC_results-col2"  
		                      style="font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?>;<?php echo $rlabwi; ?>;height:27px; float:right;" id="amount<?php echo the_ID(); ?>"></div>
		                    <div style="font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?> ;<?php echo $labwi; ?> ; float:left; height:30px;" id="result3" class="BankrateFCC_results-col1"><?php echo _e('Loan amount:'); ?></div>
				 
                                    <?php } ?>

				 <div class="BankrateFCC_results-col2"  
		                      style="font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?>;<?php echo $rlabwi; ?>; height:20px; float:right;" id="monthlyPayment<?php echo the_ID(); ?>"></div>
		                    <div style="font-family: <?php echo $ftype; ?>;<?php echo $cfont; ?><?php echo $labwi; ?>; float:left; height:30px; " id="result4" class="BankrateFCC_results-col1"><?php echo _e('Total monthly payment:'); ?></div>
		                   
		                    </div>
                                 
		                 
						</div>


    <!-- Calculator Footer Link Begin -->
                    <div style="width:<?php echo $footerDivs; ?>px; line-height:18px;" id="footerDiv" class="<?php echo $colorarray['footerDiv']; ?>">
		                  <?php echo _e('<a href="http://www.bankrate.com/calculators/mortgages/mortgage-calculator.aspx" rel="nofollow" title="Mortgage calculator by Bankrate.com" target="_blank" class="BankrateFCC_a"><u>Full featured mortgage calculator.</u></a>'); ?>
		                </div>
		                <!-- Calculator Footer Link End -->
		  </div>           




