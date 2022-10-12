					
                       City<select id="city_id" required class="form-control-2 form-control-user selectAggregate" name="city_id">
					   <option value="">Select City</option>
					   <?php 
					   foreach($city as $key =>  $input)
					   {
						   
					   ?>
                        <option value="<?php echo $input->id; ?>"><?php echo $input->name; ?></option>
						<?php 
					    }
					   ?>
                      </select>
                   