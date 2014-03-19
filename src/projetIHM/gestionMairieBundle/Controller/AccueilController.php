<?php

namespace projetIHM\gestionMairieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
class AccueilController extends Controller
{
    public function indexAction()
    {
	return $this->render('projetIHMgestionMairieBundle:Accueil:index.html.twig');
    }


}
