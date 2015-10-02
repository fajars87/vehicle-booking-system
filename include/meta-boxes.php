<?php

add_filter( 'rwmb_meta_boxes', 'vbs_register_meta_boxes' );

function vbs_register_meta_boxes( $meta_boxes )
{
	$prefix = 'vbs_';

	// Cars Meta Box
	$meta_boxes[] = array(
		'id'			=> 'car-meta',
		'title'   => __('Car Details', 'vbs'),
		'pages'   => array( 'cars' ),
		'context' => 'normal',
		'priority'=> 'high',
		'fields'  => array(

			// Passengers
			array(
				'name'        => __( 'Passengers', 'vbs' ),
				'id'          => $prefix . 'passengers',
				'type'        => 'number',
				'step'        => 1,
				'min'         => 1,
			),

			// Luggage
			array(
				'name'        => __( 'Luggage capacity', 'vbs' ),
				'id'          => $prefix . 'luggage',
				'type'        => 'number',
				'step'        => 1,
				'min'         => 1,
			),

			// Handbag
			array(
				'name'        => __( 'Handbag capacity', 'vbs' ),
				'id'          => $prefix . 'handbag',
				'type'        => 'number',
				'step'        => 1,
				'min'         => 1,
			),

			// Child Seats
			array(
				'name'        => __( 'Child Seats available', 'vbs' ),
				'id'          => $prefix . 'child_seats',
				'type'        => 'number',
				'step'        => 1,
				'min'         => 0,
			),

			// Car image
			array(
				'name'             => __( 'Car Image', 'vbs' ),
				'id'               => $prefix . 'car-image',
				'type'             => 'plupload_image',
				'max_file_uploads' => 1,
			),
		)
	);

	// Car Pricing Meta Box
	$meta_boxes[] = array(
		'id'			=> 'price-meta',
		'title'   => __('Pricing Table', 'vbs'),
		'pages'   => array( 'cars' ),
		'fields'  => array(
			array(
				'id'      => $prefix . 'pricing',
				'name'    => __( 'Pricing', 'vbs' ),
				'type'    => 'text_list',
				'clone' => true,
				'options' => array(
					'0' => __( 'Distance from', 'vbs' ),
					'50' => __( 'Distance to', 'vbs' ),
					'10' => __( 'Cost', 'vbs' )
				),
			),
		)
	);

	// Locations Meta Box
	$meta_boxes[] = array(
		'id'			=> 'loc-meta',
		'title'   => __('Location Details', 'vbs'),
		'pages'   => array( 'locations' ),
		'fields'  => array(
			array(
				'id'   => $prefix . 'address',
				'name' => __( 'Address', 'vbs' ),
				'type' => 'text',
				'std'  => '',
			),
			array(
				'id'   => $prefix . 'map',
				'name' => __( 'Location', 'vbs' ),
				'type' => 'map',
				'std'  => '-6.233406,-35.049906,15',
				'address_field' => $prefix . 'address',
			),
			array(
				'id'   => $prefix . 'location_charge',
				'name' => __( 'Surcharge', 'vbs' ),
				'type' => 'number',
				'std'  => 0,
				'step' => 'any',
				'min'  => 0
			),
		)
	);

	// Bookings Meta Box
	$meta_boxes[] = array(
		'id'			=> 'book-meta',
		'title'   => __('Booking Details', 'vbs'),
		'pages'   => array( 'bookings' ),
		'fields'  => array(

			// Pick-up location
			array(
				'name'  => __('Pickup Location', 'vbs'),
				'id'    => $prefix . 'pickup',
				'type'  => 'text',
				'std'   => '',
			),

			// Pick-up location map - hidden
			array(
				'id'   => $prefix . 'pickup_map',
				'name' => __( 'Location', 'vbs' ),
				'type' => 'map',
				'std'  => '-6.233406,-35.049906,15',
				'address_field' => $prefix . 'pickup',
				'class' => 'hidden'
			),

			// Drop-off location
			array(
				'name'  => __('Drop-off location', 'vbs'),
				'id'    => $prefix . 'dropoff',
				'type'  => 'text',
				'std'   => '',
			),

			// Drop-off location map - hidden
			array(
				'id'   => $prefix . 'dropoff_map',
				'name' => __( 'Location', 'vbs' ),
				'type' => 'map',
				'std'  => '-6.233406,-35.049906,15',
				'address_field' => $prefix . 'dropoff',
				'class' => 'hidden'
			),

			// One way
			// Date
			array(
				'name' => __( 'Date', 'vbs' ),
				'id'   => $prefix . 'pickup_date',
				'type' => 'date',
				'js_options' => array(
					'stepMinute'     => 10,
					'showTimepicker' => false,
					'dateFormat'		 => 'dd.mm.yy'
				),
			),

			// Time
			array(
				'name' => __( 'Time', 'vbs' ),
				'id'   => $prefix . 'pickup_time',
				'type' => 'time',
				'js_options' => array(
					'stepMinute' => 10,
					'showSecond' => false,
				),
			),

			// Return
			// Date
			array(
				'name' => __( 'Return Date', 'vbs' ),
				'id'   => $prefix . 'return_date',
				'type' => 'date',
				'js_options' => array(
					'stepMinute'     => 10,
					'showTimepicker' => false,
					'dateFormat'		 => 'dd.mm.yy'
				),
			),

			// Time
			array(
				'name' => __( 'Return Time', 'vbs' ),
				'id'   => $prefix . 'return_time',
				'type' => 'time',
				'js_options' => array(
					'stepMinute' => 10,
					'showSecond' => false,
				),
			),

			// Distance
			array(
				'name'        => __( 'Distance', 'vbs' ),
				'id'          => $prefix . 'distance',
				'type'        => 'number',
				'step'        => 'any',
				'min'         => 0,
			),

			// Distance calc button
			array(
				'id'   => $prefix . 'dist-button',
				'type' => 'button',
				'name' => 'Get Distance', // Empty name will "align" the button to all field inputs
			),

			// Car Select
			array(
				'name'        => __( 'Car', 'vbs' ),
				'id'          => $prefix . 'car',
				'type'        => 'post',
				'post_type'   => array( 'cars' ),
				'std'         => '',
				'field_type'  => 'select_advanced',
				'placeholder' => __( 'Select a Car', 'vbs' ),
				'query_args'  => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				)
			),

			// Holds the car id
			array(
				'id' => $prefix . 'car_id',
				'type' => 'hidden',
				'std' => __( '0', 'vbs' ),
			),

			// Cost calc button
			array(
				'id'   => $prefix . 'cost-button',
				'type' => 'button',
				'name' => 'Get Cost', // Empty name will "align" the button to all field inputs
			),

			// Notes
			array(
				'name'        => __( 'Notes', 'vbs' ),
				'id'          => $prefix . 'notes',
				'type'        => 'textarea',
				'std'         => '',
				'placeholder' => __( 'Information intended for the driver', 'vbs' ),
				'rows'        => 5,
				'columns'     => 5,
			),

		)
	);

	// Booking client Data Meta Box
	$meta_boxes[] = array(
		'id'			=> 'booking-client-meta',
		'title'   => __('Customer Details', 'vbs'),
		'pages'   => array( 'bookings' ),
		'context' => 'side',
		'fields'  => array(

			// Full Name
			array(
				'id'   => $prefix . 'full_name',
				'name' => __( 'Full Name', 'vbs' ),
				'type' => 'text',
				'std'  => '',
			),

			// Email
			array(
				'id'   => $prefix . 'email',
				'name' => __( 'Email', 'vbs' ),
				'type' => 'text',
				'std'  => '',
			),

			// Phone
			array(
				'id'   => $prefix . 'phone',
				'name' => __( 'Phone', 'vbs' ),
				'type' => 'text',
				'std'  => '',
			),

			// Payment details
			// Status
			array(
				'name'        => __( 'Payment method', 'vbs' ),
				'id'          => $prefix . 'payment',
				'type'        => 'select',
				'options'     => array(
					'paypal' 	=> __( 'PayPal', 'vbs' ),
					'cash' => __( 'Cash', 'vbs' ),
				),
				// Select multiple values, optional. Default is false.
				'std'         => 'paypal',
				'placeholder' => __( 'Select payment method', 'vbs' ),
			),

			// Total cost
			array(
				'id'   => $prefix . 'cost',
				'name' => __( 'Total cost', 'vbs' ),
				'type' => 'text',
				'std'  => '',
			),

			// Status
			array(
				'name'        => __( 'Status', 'vbs' ),
				'id'          => $prefix . 'status',
				'type'        => 'select',
				'options'     => array(
					'pending' 	=> __( 'Pending', 'vbs' ),
					'confirmed' => __( 'Confirmed', 'vbs' ),
					'cancelled' => __( 'Cancelled', 'vbs' )
				),
				// Select multiple values, optional. Default is false.
				'std'         => 'pending',
				'placeholder' => __( 'Select status', 'vbs' ),
			),

		)
	);

	// Booking client Data Meta Box
	$meta_boxes[] = array(
		'id'			=> 'booking-payment-meta',
		'title'   => __('Payment Details', 'vbs'),
		'pages'   => array( 'bookings' ),
		'context' => 'side',
		'fields'  => array(

			// Full Name
			array(
				'id'   => $prefix . 'transaction',
				'name' => __( 'PayPal Transaaction ID', 'vbs' ),
				'type' => 'text',
				'std'  => '',
			),

			// Email
			array(
				'id'   => $prefix . 'payer_email',
				'name' => __( 'Payer Email', 'vbs' ),
				'type' => 'text',
				'std'  => '',
			),

			// Phone
			array(
				'id'   => $prefix . 'pay_amount',
				'name' => __( 'Payment amount', 'vbs' ),
				'type' => 'text',
				'std'  => '',
			),

		)
	);

	// Surcharges meta box
	$meta_boxes[] = array(
		'id'			=> 'surcharges-meta',
		'title'   => __('Surcharge Details', 'vbs'),
		'pages'   => array( 'surcharges' ),
		'fields'  => array(

			// Date Start
			array(
				'name' => __( 'Date From', 'vbs' ),
				'id'   => $prefix . 'sur_start_date',
				'type' => 'date',
				'js_options' => array(
					'showTimepicker' => false,
					'dateFormat'		 => 'dd.mm.yy'
				),
			),

			// Date End
			array(
				'name' => __( 'Date To', 'vbs' ),
				'id'   => $prefix . 'sur_end_date',
				'type' => 'date',
				'js_options' => array(
					'showTimepicker' => false,
					'dateFormat'		 => 'dd.mm.yy'
				),
			),

			// Surcharge Type
      array(
          'name'    => __( 'Surcharge type', 'vbs' ),
          'id'      => $prefix . 'sur_type',
          'type'    => 'radio',
          'options' => array(
              'fixed' => __( 'Fixed Amount', 'vbs' ),
              'percent' => __( 'Percentage', 'vbs' ),
          ),
      ),

			// Amount
			array(
				'name'        => __( 'Surcharge', 'vbs' ),
				'id'          => $prefix . 'sur_amount',
				'type'        => 'number',
				'step'        => 'any',
				'min'         => 0,
			),

		)
	);

	// Drivers meta box
	$meta_boxes[] = array(
		'id'			=> 'driver-meta',
		'title'   => __('Driver Details', 'vbs'),
		'pages'   => array( 'drivers' ),
		'fields'  => array(



		)
	);

	return $meta_boxes;
}

?>