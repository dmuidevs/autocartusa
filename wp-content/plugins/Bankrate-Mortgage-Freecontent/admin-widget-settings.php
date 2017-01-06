	<div class="inner_topbox">
			<div class="BankrateFCC_options-container" style="margin:8px 0px 0px 15px;">
				<p style="padding:0px 0px 0px 4px; line-height:12px;"><?php echo _e('Choose a color:')?></p>
				<a href="javascript:onclick=getColor('img1')">
				<div class="BankrateFCC_options-color1"></div>
				</a>
				<a href="javascript:onclick=getColor('img2')">
				<div class="BankrateFCC_options-color2"></div>
				</a>

				<a href="javascript:onclick=getColor('img3')">
				<div class="BankrateFCC_options-color3"></div>
				</a>
				<a href="javascript:onclick=getColor('img4')">
				<div class="BankrateFCC_options-color4"></div>
				</a>
			</div>
		</div>

		<div class="inner_topbox">
			<div class="BankrateFCC_options-container" style="margin:9px 0px 0px 0px;">
			      	<p><?php echo _e('Choose a font:'); ?></p>
			     	<select id="ddlFont"  style="border-radius:0px; border:1px solid #7f9db9;" onchange="setFontFamily()">
				<option selected="selected" value="Arial">Arial</option>
				<option value="Times New Roman">Times New Roman</option>
				<option value="Verdana">Verdana</option>
			      	</select>
			</div>
		</div>


		<div class="inner_topbox">

			<div class="BankrateFCC_options-container" style="margin:9px 0px 0px 0px;">
			<p><?php echo _e('Select width:'); ?></p>
			 <select id="ddlWidth" style="border:1px solid #7f9db9; border-radius:0px;" onchange="widgetSize()">
				<option value="200" selected="selected">200 pixels</option>
				<option value="225" >225 pixels</option>
				<option value="250" >250 pixels</option>
				<option value="275" >275 pixels</option>
				<option value="300">300 pixels</option>
				<option value="325">325 pixels</option>
				<option value="350" >350 pixels</option>
			</select>
			</div>

		</div>

		<?php //require('admin-widget-settings.php'); ?> 
	</div>
