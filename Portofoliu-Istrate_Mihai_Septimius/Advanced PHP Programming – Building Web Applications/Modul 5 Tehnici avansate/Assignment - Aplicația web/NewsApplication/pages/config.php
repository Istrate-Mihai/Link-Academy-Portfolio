<?php
function autoload($c)
{
  require("../classes/{$c}.php");
}
spl_autoload_register("autoload");
