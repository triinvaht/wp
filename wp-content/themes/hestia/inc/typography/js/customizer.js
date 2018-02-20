/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @package hestia
 * @since 1.1.38
 */

/* global wp*/
/* global jQuery*/

wp.customize(
	'hestia_container_width', function( value ) {
		'use strict';
		value.bind(
			function( to ) {
				if ( to ) {
					var values = JSON.parse( to );
					if ( values ) {
						if ( values.mobile ) {
							var settings = {
								selectors: '.container',
								cssProperty: 'width',
								propertyUnit: 'px',
								styleClass: 'hestia-container-width-css'
							}, val;
							val          = JSON.parse( to );
							styleCss( settings, val );
						}
					}
				}
			}
		);
	}
);

wp.customize(
	'hestia_header_titles_fs', function (value) {
		'use strict';
		value.bind(
			function( to ) {
				var settings = {
					cssProperty: 'font-size',
					propertyUnit: 'px',
					styleClass: 'hestia-header-titles-fs'
				};

				var arraySizes = {
					size3: { selectors: '.page-header.header-small .hestia-title, .page-header.header-small .title', values: [42,42,42] }
				};
				setStyle( arraySizes, settings, to );
			}
		);
	}
);

wp.customize(
	'hestia_section_primary_headings_fs', function (value) {
		'use strict';
		value.bind(
			function( to ) {
				var settings = {
					cssProperty: 'font-size',
					propertyUnit: 'px',
					styleClass: 'hestia-section-primary-headings-fs'
				};

				var arraySizes = {
					size1: { selectors: 'h2.hestia-title,h2.title', values: [37,37,37] },
					size2: { selectors: '.woocommerce div.product .product_title, .woocommerce .related.products h2', values: [32,32,32] },
					size3: { selectors: '.subscribe-line h3.hestia-title, #comments .hestia-title, .woocommerce .comment-reply-title, .woocommerce-cart .blog-post h1.hestia-title, .woocommerce-checkout .blog-post h1.hestia-title', values: [27,27,27] },
					size4: { selectors: 'h4.card-title,.hestia-info h4.info-title,.card-blog .card-title,.footer .widget h5, section.contactus h4.hestia-title,.blog-sidebar .widget h5', values: [18,18,18] },
				};

				setStyle( arraySizes, settings, to );
			}
		);
	}
);

wp.customize(
	'hestia_section_secondary_headings_fs', function (value) {
		'use strict';
		value.bind(
			function( to ) {
				var settings = {
					cssProperty: 'font-size',
					propertyUnit: 'px',
					styleClass: 'hestia-section-secondary-headings-fs'
				};

				var arraySizes = {
					size1: { selectors: '.hestia-work .card-title, .woocommerce .cart-collaterals h2, .woocommerce .cross-sells h2, .woocommerce.single-product .summary .price, .woocommerce-checkout .blog-post .section form.woocommerce-checkout h3:not(#ship-to-different-address)', values: [23,23,23] },
					size2: { selectors: ' h5.description, h5.subscribe-description', values: [18,18,18] },
					size3: { selectors: '.subscribe-line .description', values: [14,14,14] }
				};

				setStyle( arraySizes, settings, to );
			}
		);
	}
);

wp.customize(
	'hestia_section_content_fs', function (value) {
		'use strict';
		value.bind(
			function( to ) {
				var settings = {
					cssProperty: 'font-size',
					propertyUnit: 'px',
					styleClass: 'hestia-section-content-fs'
				};

				var arraySizes = {
					size1: { selectors: 'h6.category', values: [12,12,12] },
					size2: { selectors: '.woocommerce .product .card-product .card-description p, .card-description, section.pricing p.text-gray, .woocommerce.single-product .woocommerce-product-details__short-description', values: [14,14,14] },
                    size3: { selectors: '.hestia-features .hestia-info p', values: [16,16,16] }
				};

				setStyle( arraySizes, settings, to );
			}
		);
	}
);

wp.customize(
	'hestia_menu_fs', function (value) {
		'use strict';
		value.bind(
			function( to ) {
				var settings = {
					cssProperty: 'font-size',
					propertyUnit: 'px',
					styleClass: 'hestia-menu-fs'
				};

				var arraySizes = {
					size1: { selectors: '.navbar #main-navigation a, .footer .footer-menu li a', values: [12,12,12] }
				};

				setStyle( arraySizes, settings, to );
			}
		);
	}
);

wp.customize(
	'hestia_post_page_headings_fs', function (value) {
		'use strict';
		value.bind(
			function( to ) {
				var settings = {
					cssProperty: 'font-size',
					propertyUnit: 'px',
					styleClass: 'hestia-post-page-headings-fs'
				};

				var arraySizes = {
					size1: { selectors: '.single-post-wrap article h1, .page-content-wrap h1, .page-template-template-fullwidth article h1', values: [42,36,36] },
					size2: { selectors: '.single-post-wrap article h2, .page-content-wrap h2, .page-template-template-fullwidth article h2', values: [37,32,32] },
					size3: { selectors: '.single-post-wrap article h3, .page-content-wrap h3, .page-template-template-fullwidth article h3', values: [32,28,28] },
					size4: { selectors: '.single-post-wrap article h4, .page-content-wrap h4, .page-template-template-fullwidth article h4', values: [27,24,24] },
					size5: { selectors: '.single-post-wrap article h5, .page-content-wrap h5, .page-template-template-fullwidth article h5', values: [23,21,21] },
					size6: { selectors: '.single-post-wrap article h6, .page-content-wrap h6, .page-template-template-fullwidth article h6', values: [18,18,18] }
				};

				setStyle( arraySizes, settings, to );
			}
		);
	}
);

wp.customize(
	'hestia_post_page_content_fs', function (value) {
		'use strict';
		value.bind(
			function( to ) {
				var settings = {
					cssProperty: 'font-size',
					propertyUnit: 'px',
					styleClass: 'hestia-post-page-content-fs'
				};

				var arraySizes = {
					size1: { selectors: '.single-post-wrap article p, .page-content-wrap p, .single-post-wrap article ul, .page-content-wrap ul, .single-post-wrap article ol, .page-content-wrap ol, .single-post-wrap article dl, .page-content-wrap dl, .single-post-wrap article table, .page-content-wrap table, .page-template-template-fullwidth article p, .page-template-template-fullwidth article ol, .page-template-template-fullwidth article ul, .page-template-template-fullwidth article dl, .page-template-template-fullwidth article table', values: [18,18,18] },
				};

				setStyle( arraySizes, settings, to );
			}
		);
	}
);



/**
 * Apply different size for each selector in arraySizes.
 *
 * @param arraySizes
 * @param settings
 * @param to
 */
function setStyle ( arraySizes, settings, to ) {
	'use strict';
	var data, desktopVal, tabletVal, mobileVal,
		className = settings.styleClass, i = 1;

	var val = JSON.parse( to );
	if ( typeof( val ) === 'object' && val !== null ) {
		if ('desktop' in val) {
			desktopVal = val.desktop;
		}
		if ('tablet' in val) {
			tabletVal = val.tablet;
		}
		if ('mobile' in val) {
			mobileVal = val.mobile;
		}
	}

	for ( var key in arraySizes ) {
		// skip loop if the property is from prototype
		if ( ! arraySizes.hasOwnProperty( key )) {
			continue;
		}
		var obj = arraySizes[key];

		if ( typeof( val ) === 'object' && val !== null ) {
			data = {
				desktop: ( parseFloat( desktopVal ) + obj.values[0]) > 0 ? ( parseFloat( desktopVal ) + obj.values[0] ) : 0,
				tablet: ( parseFloat( tabletVal ) + obj.values[1] ) > 0 ? ( parseFloat( tabletVal ) + obj.values[1] ) : 0,
				mobile: ( parseFloat( mobileVal ) + obj.values[2] ) > 0 ? ( parseFloat( mobileVal ) + obj.values[2] ) : 0
			};
		} else {
			data = parseFloat( to ) + obj.values[0];
		}
		settings.styleClass = className + '-' + i;
		settings.selectors  = obj.selectors;

		styleCss( settings, data );
		i++;
	}
}

/**
 * Set style for range controls.
 *
 * @param settings
 * @param to
 */
function styleCss( settings, to ){
	'use strict';
	var result     = '';
	var styleClass = jQuery( '.' + settings.styleClass );
	if ( to !== null && typeof to === 'object' ) {
		jQuery.each(
			to, function ( key, value ) {
				var style_to_add;
				if ( settings.selectors === '.container' ) {
					style_to_add = settings.selectors + '{ ' + settings.cssProperty + ':' + value + settings.propertyUnit + '; max-width: 100%; }';
				} else {
					style_to_add = settings.selectors + '{ ' + settings.cssProperty + ':' + value + settings.propertyUnit + '}';
				}
				switch ( key ) {
					case 'desktop':
						result += style_to_add;
						break;
					case 'tablet':
						result += '@media (max-width: 767px){' + style_to_add + '}';
						break;
					case 'mobile':
						result += '@media (max-width: 480px){' + style_to_add + '}';
						break;
				}
			}
		);
		if ( styleClass.length > 0 ) {
			styleClass.text( result );
		} else {
			jQuery( 'head' ).append( '<style type="text/css" class="' + settings.styleClass + '">' + result + '</style>' );
		}
	} else {
		jQuery( settings.selectors ).css( settings.cssProperty, to + 'px' );
	}
}
