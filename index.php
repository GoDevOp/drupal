<?php
// $Id$

include_once "includes/common.inc";

if ($q) {
  $mod = arg(0);
}

if ($mod && module_hook($mod, "page")) {
  if ($mod != "admin") {
    page_header();
  }
  module_invoke($mod, "page");
  if ($mod != "admin") {
    page_footer();
  }
}
else {
  page_header();

  check_php_setting("magic_quotes_gpc", 0);
  check_php_setting("register_globals", 1);

  if (module_hook(variable_get("site_frontpage", "node"), "page")) {
    module_invoke(variable_get("site_frontpage", "node"), "page");
  }
  else {
    $theme->header();
    $theme->footer();
  }

  page_footer();
}

?>
