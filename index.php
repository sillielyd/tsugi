<?php
// In the top frame, we use cookies for session.
define('COOKIE_SESSION', true);
include_once("config.php");
require_once("sanity.php");
$PDOX = false;
try {
    define('PDO_WILL_CATCH', true);
    require_once("pdo.php");
} catch(PDOException $ex){
    $PDOX = false;  // sanity-db-will re-check this below
}

header('Content-Type: text/html; charset=utf-8');
session_start();

if ( $PDOX !== false ) loginSecureCookie();

$OUTPUT->header();
$OUTPUT->bodyStart();

require_once("sanity-db.php");
$OUTPUT->topNav();
?>
      <div>
<?php
$OUTPUT->flashMessages();
if ( $CFG->DEVELOPER ) {
    echo '<div class="alert alert-danger" style="margin-top: 10px;">'.
        _m('Note: Currently this server is running in developer mode.').
        "\n</div>\n";
}

?>
<p>
Hello and welcome to <b><?php echo($CFG->servicename); ?></b>.
Generally this system is used to provide cloud-hosted learning tools that are plugged
into a Learning Management systems like Sakai, Coursera, or Blackboard using 
IMS Learning Tools Interoperability™ (LTI)™.
You can sign in to this system 
and create a profile and as you use tools from various courses you can 
associate those tools and courses with your profile.
</p>
<p>
Other than logging in and setting up your profile, there is nothing much you can 
do at this screen.  Things happen when your instructor starts using the tools
hosted on this server in their LMS systems.  If you are an instructor and would
like to experiment with these tools (it is early days) send a note to Dr. Chuck.
You can look at the source code for this software at 
<a href="https://github.com/csev/tsugi" target="_blank">https://github.com/csev/tsugi</a>.
</p>
<p>
Learning Tools Interoperability™ (LTI™) is a
trademark of IMS Global Learning Consortium, Inc.
in the United States and/or other countries. (www.imsglobal.org)
</p>
      </div> <!-- /container -->

<?php $OUTPUT->footer(); 
