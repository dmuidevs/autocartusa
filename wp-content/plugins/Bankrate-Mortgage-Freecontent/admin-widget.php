<div style="width: 275px;" id="headerDiv" class="BankrateFCC_boxhead-container-small">

							<div style="position:relative;font-family: <?php echo $ftype; ?>;font-size:<?php echo $titlefsize; ?>px;padding:5px 0px 0px 5px; widht:13px;height:0px;" id="mrtgTitle" class="<?php echo $titleclass; ?>"><?php echo _e('Mortgage&nbsp;Calculator'); ?></div>

							<a href="http://www.bankrate.com/free-content/" target="_blank" rel="nofollow" title="Add this mortgage calculator widget to your site">
								<img id="mrtCalBrLogo" src="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/images/widget-logo.gif" alt="Bankrate.com" width="<?php echo $logowidth; ?>px" height="23" align="right" border="0">
							</a>
						</div>
		                <!-- Calculator Header End -->
										
				<!-- Script Content Begin -->

						
		                <div style="width: 255px; padding-bottom:15px; overflow:hidden;" id="bodyDiv" class="BankrateFCC_calc-container-small">
		                  <div style="font-family: Arial; width: 160px;height:12px;" id="ip1" class="BankrateFCC_col1"><?php echo _e('Mortgage amount ($):'); ?></div>
		                        <div class="BankrateFCC_col2">
		                               <input class="BankrateFCC_sel-options" id="txtLaonAmount" style="border:1px solid #7f9db9; border-radius:0px;font-family: Arial;font-size:11px;" type="text">
		                        </div>
		                        <div class="BankrateFCC_colFull">
		                                <span id="errLoanAmount" class="BankrateFCC_form-error"></span>
		                         </div>

		
		                         <div style="font-family: Arial; width: 160px;height:12px;" id="ip2" class="BankrateFCC_col1"><?php echo _e('Interest rate (%):'); ?></div> <input type="hidden" value="0" id="pullid" >
						  <div class="BankrateFCC_col2">
						    <input class="BankrateFCC_sel-options" id="txtInterestRate" style="border:1px solid #7f9db9; border-radius:0px;font-family: Arial;font-size:11px;" type="text">
						  </div>
						  <div class="BankrateFCC_colFull">
						    <span id="errInterestRate" class="BankrateFCC_form-error"></span>
						  </div>
		
		                  	<div style="font-family: Arial; width: 160px;height:12px;" id="ip3" class="BankrateFCC_col1"><?php echo _e('Mortgage term (years):'); ?></div>

						  <div class="BankrateFCC_col2">
						    <input class="BankrateFCC_sel-options" style="border:1px solid #7f9db9; border-radius:0px;font-family: Arial;font-size:11px;" id="txtLoanTerm" type="text">
						  </div>
						  <div class="BankrateFCC_colFull">
						    <span id="errLoanTerm" class="BankrateFCC_form-error"></span>
						  </div>
		
							  <div class="BankrateFCC_button-small">
							    <div style="padding-top:4px;">
							      <a id="btnText" href="javascript:onclick=CalculateMonthlyPayment()"><?php echo _e('Calculate'); ?></a>

							    </div>
							  </div>
		                  <div id="resultDiv" style="display: none; overflow:hidden;" class="BankrateFCC_results-container">
						    <div style="font-family: Arial;" id="result1" class="BankrateFCC_results-col1"><?php echo _e('Monthly payment duration:'); ?></div>
						    <div class="BankrateFCC_results-col2"  id="year" style="width: 60px;">
						     
						    </div>
							
				            <div style="font-family: Arial; line-height:16px; height:16px;" id="result2" class="BankrateFCC_results-col1"><?php echo _e('Intxerest rate:'); ?></div>

				            <div id="ratex" class="BankrateFCC_results-col2" style="width: 60px;" >
				             <span id="rate"></span>
				            </div>
		
		                   

				    <div style="font-family: Arial; height:15px;" id="result3" class="BankrateFCC_results-col1"><?php echo _e('Loan amount:'); ?></div>
		                    <div class="BankrateFCC_results-col2" id="amount" style="line-height:12px;width: 60px;">
		                     
		                    </div>
		
		                    <div style="font-family: Arial;" id="result4" class="BankrateFCC_results-col1"><?php echo _e('Total monthly payment:'); ?></div>

		                    <div class="BankrateFCC_results-col2" id="monthlyPayment" style="line-height:11px;width: 60px;">
				   	
		                    
		                    </div>
		                  </div>
			</div>
		                
						
		   <!-- Script Content End -->


                    <!-- Calculator Footer Link Begin -->
                    <div style="width: 277px;line-height:12px;" id="footerDiv" class="BankrateFCC_footer-container small">

		                  <?php echo _e('<a href="http://www.bankrate.com/calculators/mortgages/mortgage-calculator.aspx" title="Mortgage calculator by Bankrate.com" target="_blank" rel="nofollow" class="BankrateFCC_a"><u>Full featured mortgage calculator.</u></a>'); ?>
		                </div>
		                <!-- Calculator Footer Link End -->
		  
