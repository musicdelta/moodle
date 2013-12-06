<?php  // Moodle configuration file

$uri_components = parse_url($_ENV['HEROKU_POSTGRESQL_BLUE_URL']);

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'pgsql';
$CFG->dblibrary = 'native';
$CFG->dbhost    =  $uri_components ['host'];
$CFG->dbname    = substr($uri_components ['path'], 1);
$CFG->dbuser    = $uri_components ['user'];
$CFG->dbpass    = $uri_components ['pass'];
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbsocket' => '',
);

$CFG->wwwroot   = 'http://moodle24.musicdelta.com';
$CFG->dataroot  = '/app/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

$CFG->passwordsaltmain = 'iN3I&x7/CO*^%r)5PRkTN?K1@`Yu^j';

require_once(dirname(__FILE__) . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
