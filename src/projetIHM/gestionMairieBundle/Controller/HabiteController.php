<?php

namespace projetIHM\gestionMairieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use projetIHM\gestionMairieBundle\Entity\Habite;
use projetIHM\gestionMairieBundle\Entity\Logement;

use projetIHM\gestionMairieBundle\Form\HabiteType;





class HabiteController extends Controller
{
  public function indexAction()
  {
    // On récupère le repository
    $repository = $this->getDoctrine()
      ->getManager()
      ->getRepository('projetIHMgestionMairieBundle:Habite');

    // On récupère toute les entités
    $habites = $repository->findAll();
  


    // Ou null si aucune personne n'est trouvé
    if($habites === null)
      {
	return $this->redirect($this->generateUrl('gestion_mairie_homepage'));
      }

    return $this->render('projetIHMgestionMairieBundle:Habite:habite.html.twig', array('habites' => $habites));
  }      









  public function ajouterHabiteAction()
  {
       // On crée un objet Habite
    $habite = new Habite();
    


    $form = $this->createForm(new HabiteType,$habite);
 

    $request = $this->get('request');
    if ($request->getMethod() == 'POST') {
      $form->bind($request);
      
      if ($form->isValid()) {
    	$em = $this->getDoctrine()->getManager();
    	$em->persist($habite);
    	$em->flush();
	
    	return $this->redirect($this->generateUrl('gestion_mairie_habite'));
      }
    }

      return $this->render('projetIHMgestionMairieBundle:Habite:ajouterHabite.html.twig',array('form' => $form->createView()));
    
  }



  public function supprimerHabiteAction(Habite $habite)
  {


    $request = $this->getRequest();
    if ($request->getMethod() == 'POST') {
      
      // On supprime la personne
      $em = $this->getDoctrine()->getManager();
      $em->remove($habite);
      $em->flush();

      // Puis on redirige vers l'accueil
      return $this->redirect($this->generateUrl('gestion_mairie_habite'));
    }      

  }






}
