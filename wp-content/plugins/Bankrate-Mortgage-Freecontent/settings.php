<link rel="stylesheet" href="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/style/admin-setting.css" type="text/css"> 
<p>
          
		            <!-- Color Select Begin -->
		            <div class="BankrateFCC_options-container">
		              <p><?php _e('Choose a color:'); ?></p>

                             <table><tr><td>
		              <a href="#" id="color1">
		                <div class="BankrateFCC_options-color1"></div>
                               
		              </a></td><td>
		              <a href="#" id="color2" >
		                <div class="BankrateFCC_options-color2"></div>
		              </a></td><td>
		              <a href="#" id="color3">
		                <div class="BankrateFCC_options-color3"></div>
		              </a></td><td>
		              <a href="#" id="color4">
		                <div class="BankrateFCC_options-color4"></div>

		              </a></td></tr>
                              <tr>
                              <td>&nbsp;<input type=radio name="<?php echo $this->get_field_name('color'); ?>" 
                                        value="color1" <?php if($color=='color1'): ?>  checked  <?php endif; ?>  <?php if($color==''): ?> checked  <?php endif; ?>  ></td>
                              <td>&nbsp;<input type=radio name="<?php echo $this->get_field_name('color'); ?>" 
                                        value="color2" <?php if($color=='color2'): ?>  checked  <?php endif; ?> ></td>
                              <td>&nbsp;<input type=radio name="<?php echo $this->get_field_name('color'); ?>" 
                                        value="color3" <?php if($color=='color3'): ?>  checked  <?php endif; ?> ></td>
                              <td>&nbsp;<input type=radio name="<?php echo $this->get_field_name('color'); ?>" 
                                        value="color4" <?php if($color=='color4'): ?>  checked  <?php endif; ?> ></td>
                              </tr>

                             </table>
		            </div>
                             
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('font'); ?>"><?php _e('Choose a font:'); ?></label> 
          
         <select id="<?php echo $this->get_field_id('font'); ?>" name="<?php echo $this->get_field_name('font'); ?>" class="widefat" >
           <option  <?php if($font=='Arial'): ?>   selected="selected"  <?php endif; ?>   value="Arial">Arial</option>
           <option  <?php if($font=='Times New Roman'): ?>   selected="selected"  <?php endif; ?>  value="Times New Roman">Times New Roman</option>
	   <option <?php if($font=='Verdana'): ?>   selected="selected"  <?php endif; ?>  value="Verdana">Verdana</option>
         </select>

       </p> 
       
         <p>
          <label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Select width:'); ?></label> 
   
	   <select id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" class="widefat">

				<option <?php if(($size=='200') ||($size=="")): ?>   selected="selected"  <?php endif; ?> value="200" >200 pixels</option>
				<option <?php if($size=='225'): ?>   selected="selected"  <?php endif; ?> value="225" >225 pixels</option>
                                <option <?php if($size=='250'): ?>   selected="selected"  <?php endif; ?> value="250" >250 pixels</option> 

		                <option <?php if($size=='275'): ?>   selected="selected"  <?php endif; ?> value="275" >275 pixels</option>
		                <option <?php if($size=='300'): ?>   selected="selected"  <?php endif; ?> value="300" >300 pixels</option>
				<option <?php if($size=='325'): ?>   selected="selected"  <?php endif; ?> value="325" >325 pixels</option>
		                <option <?php if($size=='350'): ?>   selected="selected"  <?php endif; ?> value="350">350 pixels</option>
		              </select>	       
       </p>
