<?php 
add_filter( 'ninja_forms_settings', 'mytheme_ninja_forms_polylang' );
function mytheme_ninja_forms_polylang( $settings ) {
    $label_settings = array(
        'date_format',
        'currency_symbol',
        'req_div_label',
        'req_field_symbol',
        'req_error_label',
        'req_field_error',
        'spam_error',
        'honeypot_error',
        'timed_submit_error',
        'javascript_error',
        'invalid_email',
        'process_label',
        'password_mismatch'
    );
    foreach ( $label_settings as $label_setting ) {
        if ( function_exists( 'pll_register_string' ) ) {
            pll_register_string( $label_setting, $settings[ $label_setting ], 'Ninja Forms' );
        }
        add_filter( 'ninja_forms_labels/' . $label_setting, 'mytheme_ninja_forms_translate' );
    }
    return $settings;
}

function mytheme_ninja_forms_translate( $label ){
    if ( function_exists( 'pll__' ) ) {
        $label = pll__( $label );
    }
    return $label;
}


 ?>