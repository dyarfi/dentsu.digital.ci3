<?php
/**
 * Verify Cross Site Request Forgery Protection
 *
 * Additional CSRF Token check from GET parameter for occassionally only 
 *
 * @return  object
 */

class MY_Security extends CI_Security {
 
    function __construct()
    {
        parent::__construct();
    }
 
    public function csrf_verify() {

        // If it's not a POST and GET request we will set the CSRF cookie
        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST' || strtoupper($_SERVER['REQUEST_METHOD']) !== 'GET')
        {
            return $this->csrf_set_cookie();
        }

        // Do the tokens exist in both the _POST, _GET and _COOKIE arrays?
        if ( ! isset($_POST[$this->_csrf_token_name], $_COOKIE[$this->_csrf_cookie_name]) || ! isset($_GET[$this->_csrf_token_name], $_COOKIE[$this->_csrf_cookie_name]))
        {
            $this->csrf_show_error();
        }

        // Do the tokens match?
        if ($_POST[$this->_csrf_token_name] != $_COOKIE[$this->_csrf_cookie_name] || $_GET[$this->_csrf_token_name] != $_COOKIE[$this->_csrf_cookie_name])
        {
            $this->csrf_show_error();
        }

        // We kill this since we're done and we don't want to
        // polute the _POST array
        unset($_POST[$this->_csrf_token_name]);

        // polute the _GET array
        unset($_GET[$this->_csrf_token_name]);

        // Nothing should last forever
        unset($_COOKIE[$this->_csrf_cookie_name]);
        $this->_csrf_set_hash();
        $this->csrf_set_cookie();

        log_message('debug', 'CSRF token verified');

        return $this;
    }

}