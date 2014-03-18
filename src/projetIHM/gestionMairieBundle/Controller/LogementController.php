<?php

namespace projetIHM\gestionMairieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use projetIHM\gestionMairieBundle\Entity\Logement;
use projetIHM\gestionMairieBundle\Form\LogementType;



class LogementController extends Controller
{


  public function indexAction()
  {
    // On récupère le repository
    $repository = $this->getDoctrine()
      ->getManager()
      ->getRepository('projetIHMgestionMairieBundle:Logement');

    // On récupère toute les entités
    $logements = $repository->findAll();
  

    // Ou null si aucun logement n'est trouvé
    if($logements === null)
      {
	return $this->redirect($this->generateUrl('gestion_mairie_homepage'));
      }

    return $this->render('projetIHMgestionMairieBundle:Logement:logement.html.twig', array('logements' => $logements));
  }      








  public function ajouterLogementAction()
  {
    // On crée un objet Logement
    $logement = new Logement();

    $form = $this->createForm(new LogementType, $logement);

    $request = $this->get('request');
    if ($request->getMethod() == 'POST') {
      $form->bind($request);
      
      if ($form->isValid()) {
	$em = $this->getDoctrine()->getManager();
	$em->persist($logement);
	$em->flush();
	
	return $this->redirect($this->generateUrl('gestion_mairie_logement'));
      }
    }


    return $this->render('projetIHMgestionMairieBundle:Logement:ajouterLogement.html.twig',array('form' => $form->createView()));
    
  }







  public function modifierLogementAction(Logement $logement)
  {
   
    $request = $this->get('request');
   
    $form = $this->createForm(new LogementType, $logement);

    
    if ($request->getMethod() == 'GET') {
      $form->bind($request);
      $em = $this->getDoctrine()->getManager();
      $em->persist($logement);
      $em->flush();
	
      return $this->redirect($this->generateUrl('gestion_mairie_logement'));
      
    }


    return $this->render('projetIHMgestionMairieBundle:Logement:modifierLogement.html.twig', array(
    												   'form'    => $form->createView(),
    												   'logement'=>$logement
												   ));


  }



}
