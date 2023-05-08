<?php

/**
 * Functions for custom Gutenberg blocks
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package The Tower Technologies Ltd.
 * @since 1.0.0
 */

/**
 * Register custom Gutenberg blocks
 */
add_action('acf/init', 'glide_theme_acf_init');
function glide_theme_acf_init()
{

	if (function_exists('acf_register_block')) {

		// Register a block - Spacer
		acf_register_block(
			array(
				'name'            => 'spacer',
				'title'           => __('Theme Spacer', 'ttl_td'),
				'description'     => __('A custom spacer block for theme.', 'ttl_td'),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M8 0H16V64H8V0Z" fill="#20007F"/>
				<path d="M8 0H16V64H8V0Z" fill="#20007F"/>
				<path d="M8 0H16V64H8V0Z" fill="#20007F"/>
				<path d="M24 56L24 64L-3.49691e-07 64L0 56L24 56Z" fill="#20007F"/>
				<path d="M24 56L24 64L-3.49691e-07 64L0 56L24 56Z" fill="#20007F"/>
				<path d="M24 56L24 64L-3.49691e-07 64L0 56L24 56Z" fill="#20007F"/>
				<path d="M24 0L24 8L-3.49691e-07 8L0 -1.04907e-06L24 0Z" fill="#20007F"/>
				<path d="M24 0L24 8L-3.49691e-07 8L0 -1.04907e-06L24 0Z" fill="#20007F"/>
				<path d="M24 0L24 8L-3.49691e-07 8L0 -1.04907e-06L24 0Z" fill="#20007F"/>
				<path d="M64 0L64 4L36 4L36 -1.31134e-06L64 0Z" fill="#20007F"/>
				<path d="M64 0L64 4L36 4L36 -1.31134e-06L64 0Z" fill="#20007F"/>
				<path d="M64 0L64 4L36 4L36 -1.31134e-06L64 0Z" fill="#20007F"/>
				<path d="M50 16L50 20L36 20L36 16L50 16Z" fill="#20007F"/>
				<path d="M50 16L50 20L36 20L36 16L50 16Z" fill="#20007F"/>
				<path d="M50 16L50 20L36 20L36 16L50 16Z" fill="#20007F"/>
				<path d="M64 8L64 12L36 12L36 8L64 8Z" fill="#20007F"/>
				<path d="M64 8L64 12L36 12L36 8L64 8Z" fill="#20007F"/>
				<path d="M64 8L64 12L36 12L36 8L64 8Z" fill="#20007F"/>
				<path d="M64 44L64 48L36 48L36 44L64 44Z" fill="#20007F"/>
				<path d="M64 44L64 48L36 48L36 44L64 44Z" fill="#20007F"/>
				<path d="M64 44L64 48L36 48L36 44L64 44Z" fill="#20007F"/>
				<path d="M50 60L50 64L36 64L36 60L50 60Z" fill="#20007F"/>
				<path d="M50 60L50 64L36 64L36 60L50 60Z" fill="#20007F"/>
				<path d="M50 60L50 64L36 64L36 60L50 60Z" fill="#20007F"/>
				<path d="M64 52L64 56L36 56L36 52L64 52Z" fill="#20007F"/>
				<path d="M64 52L64 56L36 56L36 52L64 52Z" fill="#20007F"/>
				<path d="M64 52L64 56L36 56L36 52L64 52Z" fill="#20007F"/>
				</svg>',
				'mode'            => 'edit',
				'keywords'        => array('Spacer Block'),
				'align'           => 'full',
				'supports'        => array(
					'align' => array('full'),
				),
			)
		);

		// Register a block - Button
		acf_register_block(
			array(
				'name'            => 'button',
				'title'           => __('Theme Buttons', 'ttl_td'),
				'description'     => __('A custom button block with theme styles.', 'ttl_td'),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M64 16L64 20L-3.73004e-07 20L0 16L64 16Z" fill="#20007F"/>
				<path d="M64 16L64 20L-3.73004e-07 20L0 16L64 16Z" fill="#20007F"/>
				<path d="M64 16L64 20L-3.73004e-07 20L0 16L64 16Z" fill="#20007F"/>
				<path d="M64 8L64 12L-3.73004e-07 12L0 8L64 8Z" fill="#20007F"/>
				<path d="M64 8L64 12L-3.73004e-07 12L0 8L64 8Z" fill="#20007F"/>
				<path d="M64 8L64 12L-3.73004e-07 12L0 8L64 8Z" fill="#20007F"/>
				<path d="M64 0L64 4L-3.73004e-07 4L0 -1.31134e-06L64 0Z" fill="#20007F"/>
				<path d="M64 0L64 4L-3.73004e-07 4L0 -1.31134e-06L64 0Z" fill="#20007F"/>
				<path d="M64 0L64 4L-3.73004e-07 4L0 -1.31134e-06L64 0Z" fill="#20007F"/>
				<path d="M64 44L64 48L-3.73004e-07 48L0 44L64 44Z" fill="#20007F"/>
				<path d="M64 44L64 48L-3.73004e-07 48L0 44L64 44Z" fill="#20007F"/>
				<path d="M64 44L64 48L-3.73004e-07 48L0 44L64 44Z" fill="#20007F"/>
				<path d="M64 60L64 64L-3.73004e-07 64L0 60L64 60Z" fill="#20007F"/>
				<path d="M64 60L64 64L-3.73004e-07 64L0 60L64 60Z" fill="#20007F"/>
				<path d="M64 60L64 64L-3.73004e-07 64L0 60L64 60Z" fill="#20007F"/>
				<path d="M64 52L64 56L-3.73004e-07 56L0 52L64 52Z" fill="#20007F"/>
				<path d="M64 52L64 56L-3.73004e-07 56L0 52L64 52Z" fill="#20007F"/>
				<path d="M64 52L64 56L-3.73004e-07 56L0 52L64 52Z" fill="#20007F"/>
				<path d="M28 28L28 36L-7.46008e-07 36L0 28L28 28Z" fill="#20007F"/>
				<path d="M28 28L28 36L-7.46008e-07 36L0 28L28 28Z" fill="#20007F"/>
				<path d="M28 28L28 36L-7.46008e-07 36L0 28L28 28Z" fill="#20007F"/>
				<path d="M64 28L64 36L36 36L36 28L64 28Z" fill="#20007F"/>
				<path d="M64 28L64 36L36 36L36 28L64 28Z" fill="#20007F"/>
				<path d="M64 28L64 36L36 36L36 28L64 28Z" fill="#20007F"/>
				</svg>',
				'mode'            => 'edit',
				'keywords'        => array('Button'),
				'align'           => 'wide',
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => esc_url(get_template_directory_uri()) . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);

		// Register a block - ACFBlock
		acf_register_block(
			array(
				'name'            => 'acfblock',
				'title'           => __('ACFBlock', 'ttl_td'),
				'description'     => __('A custom ACFBlock.', 'ttl_td'),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array('ACFBlock'),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);

		// Register a block - ACFBlock
		acf_register_block(
			array(
				'name'            => 'image-alongside-text',
				'title'           => __('Image Alongside Text', 'ttl_td'),
				'description'     => __('A custom image alongside text.', 'ttl_td'),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M60 40H40V60H60V40ZM36 36V64H64V36H36Z" fill="#20007F"/>
				<path d="M46.0714 48L40 56.2143V60H60V56.5714L56.0714 51.9286L52.8571 55.5L46.0714 48Z" fill="#20007F"/>
				<path d="M56 45.5C56 46.8807 54.8807 48 53.5 48C52.1193 48 51 46.8807 51 45.5C51 44.1193 52.1193 43 53.5 43C54.8807 43 56 44.1193 56 45.5Z" fill="#20007F"/>
				<path d="M28 48L28 52L-1.63189e-07 52L0 48L28 48Z" fill="#20007F"/>
				<path d="M28 48L28 52L-1.63189e-07 52L0 48L28 48Z" fill="#20007F"/>
				<path d="M28 48L28 52L-1.63189e-07 52L0 48L28 48Z" fill="#20007F"/>
				<path d="M28 40L28 44L-1.63189e-07 44L0 40L28 40Z" fill="#20007F"/>
				<path d="M28 40L28 44L-1.63189e-07 44L0 40L28 40Z" fill="#20007F"/>
				<path d="M28 40L28 44L-1.63189e-07 44L0 40L28 40Z" fill="#20007F"/>
				<path d="M14 56L14 60L-1.63189e-07 60L0 56L14 56Z" fill="#20007F"/>
				<path d="M14 56L14 60L-1.63189e-07 60L0 56L14 56Z" fill="#20007F"/>
				<path d="M14 56L14 60L-1.63189e-07 60L0 56L14 56Z" fill="#20007F"/>
				<path d="M64 12L64 16L36 16L36 12L64 12Z" fill="#20007F"/>
				<path d="M64 12L64 16L36 16L36 12L64 12Z" fill="#20007F"/>
				<path d="M64 12L64 16L36 16L36 12L64 12Z" fill="#20007F"/>
				<path d="M64 4L64 8L36 8L36 4L64 4Z" fill="#20007F"/>
				<path d="M64 4L64 8L36 8L36 4L64 4Z" fill="#20007F"/>
				<path d="M64 4L64 8L36 8L36 4L64 4Z" fill="#20007F"/>
				<path d="M50 20L50 24L36 24L36 20L50 20Z" fill="#20007F"/>
				<path d="M50 20L50 24L36 24L36 20L50 20Z" fill="#20007F"/>
				<path d="M50 20L50 24L36 24L36 20L50 20Z" fill="#20007F"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M24 4H4V24H24V4ZM0 0V28H28V0H0Z" fill="#20007F"/>
				<path d="M10.0714 12L4 20.2143V24H24V20.5714L20.0714 15.9286L16.8571 19.5L10.0714 12Z" fill="#20007F"/>
				<path d="M22 9.5C22 10.8807 20.8807 12 19.5 12C18.1193 12 17 10.8807 17 9.5C17 8.11929 18.1193 7 19.5 7C20.8807 7 22 8.11929 22 9.5Z" fill="#20007F"/>
				</svg>',
				'mode'            => 'edit',
				'keywords'        => array('image', 'along', 'side', 'text'),
				'align'           => 'wide',
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);

		// Register portfolios block - ACFBlock
		acf_register_block(
			array(
				'name'            => 'portfolios-list',
				'title'           => __('Portfolio', 'ttl_td'),
				'description'     => __('Portfolios list.', 'ttl_td'),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M60 40H40V60H60V40ZM36 36V64H64V36H36Z" fill="#20007F"/>
				<path d="M46.0714 48L40 56.2143V60H60V56.5714L56.0714 51.9286L52.8571 55.5L46.0714 48Z" fill="#20007F"/>
				<path d="M56 45.5C56 46.8807 54.8807 48 53.5 48C52.1193 48 51 46.8807 51 45.5C51 44.1193 52.1193 43 53.5 43C54.8807 43 56 44.1193 56 45.5Z" fill="#20007F"/>
				<path d="M28 48L28 52L-1.63189e-07 52L0 48L28 48Z" fill="#20007F"/>
				<path d="M28 48L28 52L-1.63189e-07 52L0 48L28 48Z" fill="#20007F"/>
				<path d="M28 48L28 52L-1.63189e-07 52L0 48L28 48Z" fill="#20007F"/>
				<path d="M28 40L28 44L-1.63189e-07 44L0 40L28 40Z" fill="#20007F"/>
				<path d="M28 40L28 44L-1.63189e-07 44L0 40L28 40Z" fill="#20007F"/>
				<path d="M28 40L28 44L-1.63189e-07 44L0 40L28 40Z" fill="#20007F"/>
				<path d="M14 56L14 60L-1.63189e-07 60L0 56L14 56Z" fill="#20007F"/>
				<path d="M14 56L14 60L-1.63189e-07 60L0 56L14 56Z" fill="#20007F"/>
				<path d="M14 56L14 60L-1.63189e-07 60L0 56L14 56Z" fill="#20007F"/>
				<path d="M64 12L64 16L36 16L36 12L64 12Z" fill="#20007F"/>
				<path d="M64 12L64 16L36 16L36 12L64 12Z" fill="#20007F"/>
				<path d="M64 12L64 16L36 16L36 12L64 12Z" fill="#20007F"/>
				<path d="M64 4L64 8L36 8L36 4L64 4Z" fill="#20007F"/>
				<path d="M64 4L64 8L36 8L36 4L64 4Z" fill="#20007F"/>
				<path d="M64 4L64 8L36 8L36 4L64 4Z" fill="#20007F"/>
				<path d="M50 20L50 24L36 24L36 20L50 20Z" fill="#20007F"/>
				<path d="M50 20L50 24L36 24L36 20L50 20Z" fill="#20007F"/>
				<path d="M50 20L50 24L36 24L36 20L50 20Z" fill="#20007F"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M24 4H4V24H24V4ZM0 0V28H28V0H0Z" fill="#20007F"/>
				<path d="M10.0714 12L4 20.2143V24H24V20.5714L20.0714 15.9286L16.8571 19.5L10.0714 12Z" fill="#20007F"/>
				<path d="M22 9.5C22 10.8807 20.8807 12 19.5 12C18.1193 12 17 10.8807 17 9.5C17 8.11929 18.1193 7 19.5 7C20.8807 7 22 8.11929 22 9.5Z" fill="#20007F"/>
				</svg>',
				'mode'            => 'edit',
				'keywords'        => array('portfolio', 'list', 'listing'),
				'align'           => 'wide',
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);

		// Register a block - Partner Companies
		acf_register_block(
			array(
				'name'            => 'partner-companies',
				'title'           => __('Partner Companies', 'ttl_td'),
				'description'     => __('A custom Partner Companies.', 'ttl_td'),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array('Partner Companies'),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);
		// Register a block - Featured Icons
		acf_register_block(
			array(
				'name'            => 'featured-icons',
				'title'           => __('Featured Icons', 'ttl_td'),
				'description'     => __('A custom Featured Icons.', 'ttl_td'),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array('Featured Icons'),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);
		// Register a block - Three Columns Text
		acf_register_block(
			array(
				'name'            => 'three-columns-text',
				'title'           => __('Three Columns Text', 'ttl_td'),
				'description'     => __('A custom Three Columns.', 'ttl_td'),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array('Three Columns Text'),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				// 'example'         => array(
				// 	'attributes' => array(
				// 		'mode' => 'preview',
				// 		'data' => array(
				// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
				// 		),
				// 	),
				// ),
			)
		);
	}
	// Register a block - Tabbed Content
	acf_register_block(
		array(
			'name'            => 'tabbed-content',
			'title'           => __('Tabbed Content', 'ttl_td'),
			'description'     => __('Tabbed Content.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Tabbed Content'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			// 'example'         => array(
			// 	'attributes' => array(
			// 		'mode' => 'preview',
			// 		'data' => array(
			// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
			// 		),
			// 	),
			// ),
		)
	);
	// Register a block - Numbers Alongside Text
	acf_register_block(
		array(
			'name'            => 'numbers-alongside-text',
			'title'           => __('Numbers Alongside Text', 'ttl_td'),
			'description'     => __('Numbers Alongside Text.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Numbers Alongside Text'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			// 'example'         => array(
			// 	'attributes' => array(
			// 		'mode' => 'preview',
			// 		'data' => array(
			// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
			// 		),
			// 	),
			// ),
		)
	);
	// Register a block - Logos Grid
	acf_register_block(
		array(
			'name'            => 'logos-grid',
			'title'           => __('Logos Grid', 'ttl_td'),
			'description'     => __('Logos Grid.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Logos Grid'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			// 'example'         => array(
			// 	'attributes' => array(
			// 		'mode' => 'preview',
			// 		'data' => array(
			// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
			// 		),
			// 	),
			// ),
		)
	);
	// Register a block - Locations
	acf_register_block(
		array(
			'name'            => 'locations',
			'title'           => __('Locations', 'ttl_td'),
			'description'     => __('A custom Locations.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Locations'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
					),
				),
			),
		)
	);
	// Register a block - Icons Along Side Text
	acf_register_block(
		array(
			'name'            => 'icons-alongside-text',
			'title'           => __('Icons Along Side Text', 'ttl_td'),
			'description'     => __('A custom Icons Along Side Text.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Icons Along Side Text'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
					),
				),
			),
		)
	);
	// Register a block - Gallery
	acf_register_block(
		array(
			'name'            => 'gallery',
			'title'           => __('Gallery', 'ttl_td'),
			'description'     => __('A custom Gallery.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Gallery'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
					),
				),
			),
		)
	);
	// Register a block - Three Columns Text
	acf_register_block(
		array(
			'name'            => 'three-columns-text',
			'title'           => __('Three Columns Text', 'ttl_td'),
			'description'     => __('A custom Three Columns.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Three Columns Text'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			// 'example'         => array(
			// 	'attributes' => array(
			// 		'mode' => 'preview',
			// 		'data' => array(
			// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
			// 		),
			// 	),
			// ),
		)
	);

	// Register a block - Tabbed Content
	acf_register_block(
		array(
			'name'            => 'tabbed-content',
			'title'           => __('Tabbed Content', 'ttl_td'),
			'description'     => __('Tabbed Content.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Tabbed Content'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			// 'example'         => array(
			// 	'attributes' => array(
			// 		'mode' => 'preview',
			// 		'data' => array(
			// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
			// 		),
			// 	),
			// ),
		)
	);
	// Register a block - Numbers Alongside Text
	acf_register_block(
		array(
			'name'            => 'numbers-alongside-text',
			'title'           => __('Numbers Alongside Text', 'ttl_td'),
			'description'     => __('Numbers Alongside Text.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Numbers Alongside Text'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			// 'example'         => array(
			// 	'attributes' => array(
			// 		'mode' => 'preview',
			// 		'data' => array(
			// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
			// 		),
			// 	),
			// ),
		)
	);
	// Register a block - Logos Grid
	acf_register_block(
		array(
			'name'            => 'logos-grid',
			'title'           => __('Logos Grid', 'ttl_td'),
			'description'     => __('Logos Grid.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Logos Grid'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			// 'example'         => array(
			// 	'attributes' => array(
			// 		'mode' => 'preview',
			// 		'data' => array(
			// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
			// 		),
			// 	),
			// ),
		)
	);
	// Register a block - Contact
	acf_register_block(
		array(
			'name'            => 'Contact',
			'title'           => __('Contact', 'ttl_td'),
			'description'     => __('A custom Contact.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Contact'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
					),
				),
			)
		)
	);
	// Register a block - Features Alongside Text
	acf_register_block(
		array(
			'name'            => 'features-alongside-text',
			'title'           => __('Features Alongside Text', 'ttl_td'),
			'description'     => __('A custom Features Alongside Text.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Features Alongside Text'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			// 'example'         => array(
			// 	'attributes' => array(
			// 		'mode' => 'preview',
			// 		'data' => array(
			// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
			// 		),
			// 	),
			// ),
		)
	);
	// Register a block - FAQs
	acf_register_block(
		array(
			'name'            => 'faqs',
			'title'           => __('FAQs', 'ttl_td'),
			'description'     => __('A custom FAQs.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('FAQs'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			// 'example'         => array(
			// 	'attributes' => array(
			// 		'mode' => 'preview',
			// 		'data' => array(
			// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
			// 		),
			// 	),
			// ),
		)
	);
	// Register a block - Projects
	acf_register_block(
		array(
			'name'            => 'projects',
			'title'           => __('Projects', 'ttl_td'),
			'description'     => __('A custom projects.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Projects'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			// 'example'         => array(
			// 	'attributes' => array(
			// 		'mode' => 'preview',
			// 		'data' => array(
			// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
			// 		),
			// 	),
			// ),
		)
	);
	// Register a block - Services
	acf_register_block(
		array(
			'name'            => 'services',
			'title'           => __('Services', 'ttl_td'),
			'description'     => __('A custom Services.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Services'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			// 'example'         => array(
			// 	'attributes' => array(
			// 		'mode' => 'preview',
			// 		'data' => array(
			// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
			// 		),
			// 	),
			// ),
		)
	);
	// Register a block - MidPage CTA
	acf_register_block(
		array(
			'name'            => 'midpage-cta',
			'title'           => __('MidPage CTA', 'ttl_td'),
			'description'     => __('A custom MidPage CTA.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('MidPage CTA'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			// 'example'         => array(
			// 	'attributes' => array(
			// 		'mode' => 'preview',
			// 		'data' => array(
			// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
			// 		),
			// 	),
			// ),
		)
	);

	// Register a block - Heading Section
	acf_register_block(
		array(
			'name'            => 'heading-section',
			'title'           => __('Heading Section', 'ttl_td'),
			'description'     => __('A custom Heading Section.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Heading Section'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			// 'example'         => array(
			// 	'attributes' => array(
			// 		'mode' => 'preview',
			// 		'data' => array(
			// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
			// 		),
			// 	),
			// ),
		)
	);

	// Register a block - Portfolio Details
	acf_register_block(
		array(
			'name'            => 'portfolio-details',
			'title'           => __('Portfolio Details', 'ttl_td'),
			'description'     => __('A custom Portfolio Details.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Portfolio Details'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			// 'example'         => array(
			// 	'attributes' => array(
			// 		'mode' => 'preview',
			// 		'data' => array(
			// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
			// 		),
			// 	),
			// ),
		)
	);












































































































































































































































































































































































































































































































































































































	// Ahmad

















































































































































































































	// Azeem
	// Register a block - Team
	acf_register_block(
		array(
			'name'            => 'team',
			'title'           => __('team', 'ttl_td'),
			'description'     => __('A custom team.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('Team'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
					),
				),
			),
		)
	);

	// Register a block - Team
	acf_register_block(
		array(
			'name'            => 'testimonials',
			'title'           => __('testimonials', 'ttl_td'),
			'description'     => __('A custom testimonials.', 'ttl_td'),
			'render_callback' => 'glide_acf_block_callback',
			'category'        => 'glide-blocks',
			'icon'            => 'images-alt2',
			'mode'            => 'edit',
			'keywords'        => array('testimonials'),
			'align'           => 'wide',
			// calling assets js,css
			// 'enqueue_assets' => function(){
			// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
			// },
			'supports'        => array(
				'align' => false,
			),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
					),
				),
			),
		)
	);
}
