<?php

namespace projetIHM\gestionMairieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use projetIHM\gestionMairieBundle\Entity\Personne;
use projetIHM\gestionMairieBundle\Form\PersonneType;
use projetIHM\gestionMairieBundle\Form\PersonneEditType;




class PersonneController extends Controller
{
  public function indexAction()
  {
    // On récupère le repository
    $repository = $this->getDoctrine()
      ->getManager()
      ->getRepository('projetIHMgestionMairieBundle:Personne');

    // On récupère toute les entités
    $personnes = $repository->findAll();
  

    // Ou null si aucune personne n'est trouvé
    if($personnes === null)
      {
	return $this->redirect($this->generateUrl('gestion_mairie_homepage'));
      }

    return $this->render('projetIHMgestionMairieBundle:Personne:personne.html.twig', array('personnes' => $personnes));
  }      




  public function indexXMLAction()
  {
    // On récupère le repository
    $repository = $this->getDoctrine()
      ->getManager()
      ->getRepository('projetIHMgestionMairieBundle:Personne');

    // On récupère toute les entités
    $personnes = $repository->findAll();
  

    // Ou null si aucune personne n'est trouvé
    if($personnes === null)
      {
	return $this->redirect($this->generateUrl('gestion_mairie_homepage'));
      }

    return $this->render('projetIHMgestionMairieBundle:Personne:personne.xml.twig', array('personnes' => $personnes));
  }      





  public function ajouterPersonneAction()
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



  public function supprimerPersonneAction(Personne $personne)
  {


    $request = $this->getRequest();
    if ($request->getMethod() == 'POST') {
      
      // On supprime la personne
      $em = $this->getDoctrine()->getManager();
      $em->remove($personne);
      $em->flush();

      // Puis on redirige vers l'accueil
      return $this->redirect($this->generateUrl('gestion_mairie_personne'));
    }      

  }



  public function modifierPersonneAction(Personne $personne)
  {
   
    $request = $this->get('request');
   
    $form = $this->createForm(new PersonneType, $personne);

    
    if ($request->getMethod() == 'GET') {
      $form->bind($request);
      $em = $this->getDoctrine()->getManager();
      $em->persist($personne);
      $em->flush();
	
      return $this->redirect($this->generateUrl('gestion_mairie_personne'));
      
    }


    return $this->render('projetIHMgestionMairieBundle:Personne:modifierPersonne.html.twig', array(
    												   'form'    => $form->createView(),
    												   'personne'=>$personne
												   ));
 
  }





}
