<script type="text/javascript" src="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/scripts/freecontent.js"></script>
<link rel="stylesheet" href="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/style/main-width-style.css" type="text/css">
</script>
<div id="mainDiv">

	 <!-- Calculator Header Begin -->
	 <div style="width:<?php echo $headerDivs; ?>px; margin:0px auto; padding:0px; overflow:hidden; float:left;" id="header<?php echo $this->get_field_id(id); ?>" class="<?php echo $colorarray['headerDiv']; ?>">
     <div style="float:right; width:111px;"><a href="http://www.bankrate.com/free-content/" 
		target="_blank" rel="nofollow" title="Add this mortgage calculator widget to your site">
		<img id="mrtCalBrLogo<?php echo $this->get_field_id(id); ?>" src="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/images/widget-logo.gif" 
		alt="Bankrate.com" height="23" align="right" border="0">
	       </a></div>
           
		<div style=" font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?>;height:12px; float:left;position:absolute;z-index:888;" id="mrtgTitle<?php echo $this->get_field_id(id); ?>" class="<?php echo $titleclass; ?>"><?php echo _e('Mortgage&nbsp;Calculator'); ?></div>
		
	 </div>

	 <!-- Calculator Header End -->
	 <!-- Script Content Begin -->
	<?php if(is_admin()){ $ltexthe="height:20px";    } else { $ltexthe=""; } ?>	
	<div style="width:<?php echo $bodyDivs; ?>px; overflow:hidden; float:left;" id ="body<?php echo $this->get_field_id(id); ?>" class="<?php echo $colorarray['bodyDiv']; ?>">
					  
			<div style="font-family:<?php echo $ftype; ?>; width: <?php echo $wsize; ?>px;<?php echo $cfont; ?>" id="ip1<?php echo $this->get_field_id(id); ?>" class="BankrateFCC_col1"><?php echo _e('Mortgage amount ($):'); ?></div>
			<div class="BankrateFCC_col2">
			<input class="BankrateFCC_sel-options" id="txtLaonAmount<?php echo $this->get_field_id(id); ?>" type="text" style="<?php echo $ltexthe; ?>;font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?><?php echo $tsize; ?>">
			</div>
			<div class="BankrateFCC_colFull">
			<span id="errLoanAmount<?php echo $this->get_field_id(id); ?>" class="BankrateFCC_form-error"></span>
			</div>

			<div style="font-family:<?php echo $ftype; ?>; width: <?php echo $wsize; ?>px;<?php echo $cfont; ?>" id="ip2<?php echo $this->get_field_id(id); ?>" class="BankrateFCC_col1"><?php echo _e('Interest rate (%):'); ?></div>
			<div class="BankrateFCC_col2">
			<input class="BankrateFCC_sel-options" id="txtInterestRate<?php echo $this->get_field_id(id); ?>" type="text" style="<?php echo $ltexthe; ?>;font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?><?php echo $tsize; ?>">
			</div>
			<div class="BankrateFCC_colFull">
			<span id="errInterestRate<?php echo $this->get_field_id(id); ?>" class="BankrateFCC_form-error"></span>

			</div>

			<div style="font-family:<?php echo $ftype; ?>; width: <?php echo $wsize; ?>px;<?php echo $cfont; ?>" id="ip3<?php echo $this->get_field_id(id); ?>" class="BankrateFCC_col1"><?php echo _e('Mortgage term (years):'); ?></div>
			<div class="BankrateFCC_col2">
			<input class="BankrateFCC_sel-options" id="txtLoanTerm<?php echo $this->get_field_id(id); ?>" type="text" style="<?php echo $ltexthe; ?>;font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?><?php echo $tsize; ?>">
			</div>
			<div class="BankrateFCC_colFull">
			<span id="errLoanTerm<?php echo $this->get_field_id(id); ?>" class="BankrateFCC_form-error"></span>
			</div>


			<div class="BankrateFCC_button-small">
			<div style="padding-top:4px;">
			<a id="btnText<?php echo $this->get_field_id(id); ?>" href="javascript:onclick=CalculateMonthlyPayment('<?php echo $this->get_field_id(id); ?>')"><?php echo _e('Calculate'); ?></a>
			</div>
			</div>
			<div id="resultDiv<?php echo $this->get_field_id(id); ?>" style="display: none;overflow:hidden;" class="<?php echo $colorarray['resultDiv']; ?>">
            <div class="BankrateFCC_results-col2" style="font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?>;<?php echo $rlabwi; ?>; float:right; height:30px; text-align:top;" id="year<?php echo $this->get_field_id(id); ?>">
			</div>
			<div style="font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?><?php echo $labwi; ?>;height:30px; float:left; " id="result1<?php echo $this->get_field_id(id); ?>" class="BankrateFCC_results-col1" ><?php echo _e('Monthly payment duration:'); ?></div>
			
            
<div class="BankrateFCC_results-col2" style="font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?>;<?php echo $rlabwi; ?>; float:right; text-align:top;height:27px;" id="rate<?php echo $this->get_field_id(id); ?>">
			
			</div>
			<div style="font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?><?php echo $labwi; ?>; height:30px; float:left;" id="result2<?php echo $this->get_field_id(id); ?>" class="BankrateFCC_results-col1" ><?php echo _e('Interest rate:'); ?></div>
			
            

 <?php  if($size==200 && $ftype=="Verdana"){ ?>	

<div class="BankrateFCC_results-col2" style="font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?>;width: 84px; float:right;  text-align:top; height:28px;" id="amount<?php echo $this->get_field_id(id); ?>"></div>
			<div style="font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?>width: 84px; height:30px; float:left;" id="result3<?php echo $this->get_field_id(id); ?>" class="BankrateFCC_results-col1" ><?php echo _e('Loan amount:'); ?></div>

<?php } else if($size==250 && $ftype=="Verdana"){ ?>	
<div class="BankrateFCC_results-col2" style="font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?>;width: 84px; float:right;  text-align:top; height:28px;" id="amount<?php echo $this->get_field_id(id); ?>"></div>
			<div style="font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?>width: 84px; height:30px; float:left;" id="result3<?php echo $this->get_field_id(id); ?>" class="BankrateFCC_results-col1" ><?php echo _e('Loan amount:'); ?></div>

<?php } else if($size==275 && $ftype=="Verdana"){ ?>	

<div class="BankrateFCC_results-col2" style="font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?>;width: 115px; float:right;  text-align:top; height:28px;" id="amount<?php echo $this->get_field_id(id); ?>"></div>
			<div style="font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?>width: 94px; height:30px; float:left;" id="result3<?php echo $this->get_field_id(id); ?>" class="BankrateFCC_results-col1" ><?php echo _e('Loan amount:'); ?></div>
<?php } else if($size==300 && $ftype=="Verdana"){ ?>	

<div class="BankrateFCC_results-col2" style="font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?>;width: 115px; float:right;  text-align:top; height:28px;" id="amount<?php echo $this->get_field_id(id); ?>"></div>
			<div style="font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?>width: 94px; height:30px; float:left;" id="result3<?php echo $this->get_field_id(id); ?>" class="BankrateFCC_results-col1" ><?php echo _e('Loan amount:'); ?></div>

 <?php }else{ ?>	
			
<div class="BankrateFCC_results-col2" style="font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?>;<?php echo $rlabwi; ?>; float:right;  text-align:top; height:28px;" id="amount<?php echo $this->get_field_id(id); ?>"></div>
			<div style="font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?><?php echo $labwi; ?>; height:30px; float:left;" id="result3<?php echo $this->get_field_id(id); ?>" class="BankrateFCC_results-col1" ><?php echo _e('Loan amount:'); ?></div>

<?php } ?>
			
			
<div align="right" valign="top" class="BankrateFCC_results-col2" style="font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?>;<?php echo $rlabwi; ?>; text-align:top;  height:28px; float:right;" id="monthlyPayment<?php echo $this->get_field_id(id); ?>">
			
			</div>
			<div style="font-family:<?php echo $ftype; ?>;<?php echo $cfont; ?><?php echo $labwi; ?>;height:30px; float:left;" id="result4<?php echo $this->get_field_id(id); ?>" class="BankrateFCC_results-col1" ><?php echo _e('Total monthly payment:'); ?></div>
			
			</div>
	</div>
				<!-- Script Content End -->
    
	<!-- Calculator Footer Link Begin -->
	<div style="width:<?php echo $footerDivs; ?>px;" id ="footer<?php echo $this->get_field_id(id); ?>" class="<?php echo $colorarray['footerDiv']; ?>">
		       <?php echo _e(' <a href="http://www.bankrate.com/calculators/mortgages/mortgage-calculator.aspx" 
                        title="Mortgage calculator by Bankrate.com" target="_blank" rel="nofollow" class="BankrateFCC_a" style="color: #FFFFFF"><u>Full featured mortgage calculator.</u></a>'); ?>
	</div>
	<!-- Calculator Footer Link End -->
</div>

