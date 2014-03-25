<?php

namespace projetIHM\gestionMairieBundle\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
class AccueilController extends Controller
{
    public function indexAction()
    {
      $session = new Session();
      $request = $this->getRequest();
      $theme =  $request->query->get('theme');
      
      if ($theme != '')
	$session->set('theme', $theme);
      
      else
	$session->set('theme', 'stylesheet.css');

      return $this->render('projetIHMgestionMairieBundle:Accueil:index.html.twig');
    }


}
