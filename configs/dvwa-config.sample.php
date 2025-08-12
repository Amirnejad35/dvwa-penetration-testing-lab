<?php
# DVWA Configuration (Sanitized Example)
# Replace DB creds and settings with your own in a real lab.

$_DVWA = array();
$_DVWA['db_server']   = '127.0.0.1';
$_DVWA['db_database'] = 'dvwa';
$_DVWA['db_user']     = 'dvwa';
$_DVWA['db_password'] = 'dvwa';  // In real deployments, use strong unique passwords.
$_DVWA['db_port']     = '3306';

# Default DVWA security level
$_DVWA['default_security_level'] = 'low';
$_DVWA['default_locale']         = 'en';
$_DVWA['disable_authentication'] = false;
?>
