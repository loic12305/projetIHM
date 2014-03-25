<?php

namespace projetIHM\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class projetIHMUserBundle extends Bundle
{


  public function getParent()
  {
    return 'FOSUserBundle';
  }


}
