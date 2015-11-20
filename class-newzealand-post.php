<?php 

class WC_New_Zealand_Post_Shipping_Method extends WC_Shipping_Method{



	public $postageParcelURL = 'http://api.nzpost.co.nz/ratefinder/rate.json';

	public $api_key = '123'; //demo api key
	public $supported_services = array( 'AUS_PARCEL_REGULAR' => 'Parcel Post',
										'AUS_PARCEL_EXPRESS' => 'Express Post');
	
	public function __construct(){
		$this->id = 'nzpost';
		$this->method_title = __('New Zealand Post','woocommerce-new-zealand-post-shipping-method');
		$this->title = __('New Zealand Post','woocommerce-new-zealand-post-shipping-method');
		

		$this->init_form_fields();
		$this->init_settings();


		$this->enabled = $this->get_option('enabled');
		$this->title = $this->get_option('title');
		$this->api_key = $this->get_option('api_key');
		$this->shop_post_code = $this->get_option('shop_post_code');
		
		
		$this->default_weight = $this->get_option('default_weight');
		$this->default_width = $this->get_option('default_width');
		$this->default_length = $this->get_option('default_length');
		$this->default_height = $this->get_option('default_height');

		$this->debug_mode = $this->get_option('debug_mode');

		add_action('woocommerce_update_options_shipping_'.$this->id, array($this, 'process_admin_options'));




	}


	public function init_form_fields(){
		
				$dimensions_unit = strtolower( get_option( 'woocommerce_dimension_unit' ) );
				$weight_unit = strtolower( get_option( 'woocommerce_weight_unit' ) );
				
				$this->form_fields = array(

					'enabled' => array(
					'title' 		=> __( 'Enable/Disable', 'woocommerce' ),
					'type' 			=> 'checkbox',
					'label' 		=> __( 'Enable New Zealand Post', 'woocommerce' ),
					'default' 		=> 'yes'
					),
					'title' => array(
						'title' 		=> __( 'Method Title', 'woocommerce' ),
						'type' 			=> 'text',
						'description' 	=> __( 'This controls the title', 'woocommerce' ),
						'default'		=> __( 'New Zealand Post Shipping', 'woocommerce' ),
						'desc_tip'		=> true,
					),
					'api_key' => array(
							'title'             => __( 'API Key', 'woocommerce-new-zealand-post-shipping-method' ),
							'type'              => 'text',
							'description'       => __( 'Get your key from <a target="_blank" href="https://www.nzpost.co.nz/business/developer-centre/rate-finder-api/get-a-rate-finder-api-key">https://www.nzpost.co.nz/business/developer-centre/rate-finder-api/get-a-rate-finder-api-key</a>', 'woocommerce-new-zealand-post-shipping-method' ),
							'default'           => $this->api_key
					),
					'shop_post_code' => array(
							'title'             => __( 'Shop Origin Post Code', 'woocommerce-new-zealand-post-shipping-method' ),
							'type'              => 'text',
							'description'       => __( 'Enter your Shop postcode.', 'woocommerce-new-zealand-post-shipping-method' ),
							'default'           => '2000'
					),
					'default_weight' => array(
							'title'             => __( 'Default Package Weight', 'woocommerce-new-zealand-post-shipping-method' ),
							'type'              => 'text',
							'default'           => '0.5',
							'description'       => __( $weight_unit , 'woocommerce-new-zealand-post-shipping-method' ),
					),
					'default_width' => array(
							'title'             => __( 'Default Package Width', 'woocommerce-new-zealand-post-shipping-method' ),
							'type'              => 'text',
							'default'           => '5',
							'description'       => __( $dimensions_unit, 'woocommerce-new-zealand-post-shipping-method' ),
					),
					'default_height' => array(
							'title'             => __( 'Default Package Height', 'woocommerce-new-zealand-post-shipping-method' ),
							'type'              => 'text',
							'default'           => '5',
							'description'       => __( $dimensions_unit, 'woocommerce-new-zealand-post-shipping-method' ),
					),
					'default_length' => array(
							'title'             => __( 'Default Package Length', 'woocommerce-new-zealand-post-shipping-method' ),
							'type'              => 'text',
							'default'           => '10',
							'description'       => __( $dimensions_unit, 'woocommerce-new-zealand-post-shipping-method' ),
					),
					'debug_mode' => array(
						'title' 		=> __( 'Enable Debug Mode', 'woocommerce' ),
						'type' 			=> 'checkbox',
						'label' 		=> __( 'Enable ', 'woocommerce' ),
						'default' 		=> 'no',
						'description'	=> __('If debug mode is enabled, the shipping method will be activated just for the administrator.'),
					),




			 );
		
		

	}

	
	
	/**
	 * Admin Panel Options
	 * - Options for bits like 'title' and availability on a country-by-country basis
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function admin_options() {

		?>
		<h3><?php _e( 'New Zealand Post Settings', 'woocommerce' ); ?></h3>
			<?php if($this->debug_mode == 'yes'): ?>

				<div class="updated woocommerce-message">
			    	<p><?php _e( 'New Zealand Post debug mode is activated, only administrators can use it.', 'woocommerce-new-zealand-post-shipping-method' ); ?></p>
			    </div>
			<?php endif; ?>
			<a href="https://waseem-senjer.com/product/australia-post-woocommerce-extension-pro/" target="_blank">
				<img style="z-index:99999; width:200px; position:fixed; bottom:5px; right:5px;" src="<?php echo NZPOST_URL; ?>pro_version.png">
			</a>
		<table class="form-table">
		<?php
			// Generate the HTML For the settings form.
			$this->generate_settings_html();
		?>
		
		</table><!--/.form-table-->
		<p>
			
			<h3>Notes: </h3>
			<ol>
				<li><a target="_blank" href="http://auspost.com.au/parcels-mail/size-and-weight-guidelines.html">Weight and Size Guidlines </a>from Australia Post.</li>
				
				<li>If you encountered any problem with the plugin, please do not hesitate <a target="_blank" href="http://waseem-senjer.com/submit-ticket/">submitting a support ticket</a>.</li>
				<li>If you like the plugin please leave me a <a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/woocommerce-new-zealand-post-shipping-method-woocommerce-extension?filter=5#postform">★★★★★</a> rating. A huge thank you from me in advance!</li>
				
			</ol>

			
		</p>
		<?php
	}

	public function is_available( $package ){
		// Debug mode
		if($this->debug_mode === 'yes'){
			return current_user_can('administrator');
		}

		// The lite version doesn't support international shipping
		if($package['destination']['country'] != 'NZ') return false;


		return true;
		

	}

	public function calculate_shipping( $package ){
		$package_details  =  $this->get_package_details( $package );
		$this->rates = array();	
		

		$weight = 0;
		$length = 0;
		$width = 0;
		$height = 0;

		foreach($package_details as  $pack){

			$weight = $pack['weight'];
			$height = $pack['height'];
			$width 	= $pack['width'];
			$length = $pack['length'];


			$rates = $this->get_rates($rates, $pack['item_id'], $weight, $height, $width, $length, $package['destination']['postcode'] );
			
		}
		
		if(!empty($rates)){
			foreach ($rates as $key => $rate) {
				$this->add_rate($rate);
			}
		}
		

	}




	private function get_rates( $old_rates, $item_id, $weight, $height, $width, $length, $destination ){

		$query_params['from_postcode'] = $this->shop_post_code;
		$query_params['to_postcode'] = $destination;
		$query_params['length'] = $length;
		$query_params['width'] = $width;
		$query_params['height'] = $height;
		$query_params['weight'] = $weight;

		foreach($this->supported_services as $service_key => $service_name):
					$query_params['service_code'] = $service_key;
					$response = wp_remote_get( $this->postageParcelURL.'?'.http_build_query($query_params),array('headers' => array('AUTH-KEY'=> $this->api_key)));
					if(is_wp_error( $response )){
						return array('error' => 'Unknown Problem. Please Contact the admin');		
					}

					$aus_response = json_decode(wp_remote_retrieve_body($response));
					

					
					if(!$aus_response->error){
					// add the rate if the API request succeeded
						$rates[$service_key] = array(
								'id' => $service_key,
								'label' => 'New Zealand ' . $aus_response->postage_result->service.' ('.$aus_response->postage_result->delivery_time.')', //( '.$service->delivery_time.' )
								'cost' =>  ($aus_response->postage_result->total_cost ) + $old_rates[$service_key]['cost'], 
							
						);
						 
					// if the API returned any error, show it to the user	
					}else{
						return array('error' => $aus_response->error->errorMessage);
 
					}
					
			endforeach;

			return $rates;
	}


	/**
	 * get_min_dimension function.
	 * get the minimum dimension of the package, so we multiply it with the quantity
	 * @access private
	 * @param number $width
	 * @param number $length
	 * @param number $height
	 * @return string $result
	 */
	private function get_min_dimension($width, $length, $height){

		$dimensions = array('width'=>$width,'length'=>$length,'height'=>$height);
		$result = array_keys($dimensions, min($dimensions));
		return $result[0];
	}


/**
     * get_package_details function.
     *
     * @access private
     * @param mixed $package
     * @return void
     */
    private function get_package_details( $package ) {
	    global $woocommerce;

	    $parcel   = array();
	    $requests = array();
    	$weight   = 0;
    	$volume   = 0;
    	$value    = 0;
    	$products = array();
    	// Get weight of order
    	foreach ( $package['contents'] as $item_id => $values ) {


    		$weight += woocommerce_get_weight( $values['data']->get_weight(), 'kg' ) * $values['quantity'];
    		$value  += $values['data']->get_price() * $values['quantity'];
    		
    		$length = woocommerce_get_dimension( ($values['data']->length=='')?$this->default_length:$values['data']->length, 'cm' );
    		$height = woocommerce_get_dimension( ($values['data']->height=='')?$this->default_height:$values['data']->height, 'cm' );
    		$width = woocommerce_get_dimension( ($values['data']->width=='')?$this->default_width:$values['data']->width, 'cm' );
    		$min_dimension = $this->get_min_dimension( $width, $length, $height );
			$$min_dimension = $$min_dimension * $values['quantity'];
    		$products[] = array('weight'=> woocommerce_get_weight( $values['data']->get_weight(), 'kg' ),
    							'quantity'=> $values['quantity'],
    							'length'=> $length,
    							'height'=> $height,
    							'width'=> $width,
    							'item_id'=> $item_id,
    						);
    		$volume += ( $length * $height * $width );
    	}

    	$max_weight = $this->get_max_weight($package);

    	//if($weight > $max_weight){
    	
	    	$pack = array();
			$packs_count = 1;
			$pack[$packs_count]['weight'] = 0;
			$pack[$packs_count]['length'] = 0;
			$pack[$packs_count]['height'] = 0;
			$pack[$packs_count]['width'] = 0;
			$pack[$packs_count]['quantity'] = 0;
			foreach ($products as $product){
				while ($product['quantity'] != 0) {
					$pack[$packs_count]['weight'] += $product['weight'];
					$pack[$packs_count]['length'] = $product['length'];
					$pack[$packs_count]['height'] = $product['height'];
					$pack[$packs_count]['width']  =  $product['width'];
					$pack[$packs_count]['item_id'] =  $product['item_id'];
					$pack[$packs_count]['quantity'] +=  $product['quantity'];
					

					if($pack[$packs_count]['weight'] > $max_weight){
						$pack[$packs_count]['weight'] -=  $product['weight'];
						$pack[$packs_count]['quantity'] -=  $product['quantity'];
						$packs_count++;
						$pack[$packs_count]['weight'] = $product['weight'];
						$pack[$packs_count]['length'] = $product['length'];
						$pack[$packs_count]['height'] = $product['height'];
						$pack[$packs_count]['width'] = $product['width'];
						$pack[$packs_count]['item_id'] =  $product['item_id'];
						$pack[$packs_count]['quantity'] =  $product['quantity'];
					
					}
					$product['quantity']--;
				}
			}
		//}
			
    	return $pack;
    }



    private function get_max_weight( $package){
    	$max = ( $package['destination']['country'] == 'AU' )? 22:20;
    	$store_unit = strtolower( get_option('woocommerce_weight_unit') );
    	
    	if($store_unit == 'kg')
    		return $max;
    	if($store_unit == 'g')
    		return $max * 1000;
    	if($store_unit == 'lbs')
    		return $max * 0.453592;
    	if($store_unit == 'oz')
    		return $max * 0.0283495;

    	return $max;
  
    }


}