<?php

namespace projetIHM\gestionMairieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MariageController extends Controller
{


  public function ajouterMariageAction()
  {


    // On crée un objet Article
    $personne = new Personne();




    $form = $this->createForm(new PersonneType, $personne);


    $request = $this->get('request');
    if ($request->getMethod() == 'POST') {
      $form->bind($request);
      
      if ($form->isValid()) {
	$em = $this->getDoctrine()->getManager();
	$em->persist($personne);
	$em->flush();
	
	return $this->redirect($this->generateUrl('gestion_mairie_personne'));
      }
    }

      return $this->render('projetIHMgestionMairieBundle:Personne:ajouterPersonne.html.twig',array('form' => $form->createView()));
    
  }




}
