<?php 

function CI_Autoload($class)
{ if(JLoader::load($class))
  { return true;
  }
  return false;
}
/*** specify extensions that may be loaded ***/
spl_autoload_extensions('.php, .class.php, .lib.php');
/*** register the loader functions ***/
spl_autoload_register('CI_Autoload');