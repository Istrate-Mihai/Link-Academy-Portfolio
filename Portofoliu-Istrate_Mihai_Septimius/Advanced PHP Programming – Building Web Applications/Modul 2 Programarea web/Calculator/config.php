<?php
function autoload($c)
{
  require("Classes/{$c}.php");
}
spl_autoload_register("autoload");
