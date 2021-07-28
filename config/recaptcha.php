<?php

/**
 *
 * Biscolab Laravel ReCaptcha configuration file
 * MIT License @ https://github.com/biscolab/laravel-recaptcha/blob/master/LICENSE
 * author: Roberto Belotti - info@robertobelotti.com
 * web : robertobelotti.com, github.com/biscolab
 *
 * To configure correctly please visit https://developers.google.com/recaptcha/docs/start
 *
 */

return [

	/**
	 *
	 * The site key
	 * get site key @ www.google.com/recaptcha/admin
	 *
	 */
    'api_site_key'      => '6LcIH8EZAAAAAB1W6ag-Y81KUyYBdhPOUuh6QH8s',

	/**
	 *
	 * The secret key
	 * get secret key @ www.google.com/recaptcha/admin
	 *
	 */    
    'api_secret_key'    => '6LcIH8EZAAAAACBlw4iXlafNOrUHVx6GYbjFNmeP',

    /**
     *
     * ReCATCHA version
     * Supported: "v2", "invisible",
     *
     * get more info @ https://developers.google.com/recaptcha/docs/versions
     *
     */
	'version'			=> 'v2',
	'default_validation_route'      => 'biscolab-recaptcha/validate',
    
];