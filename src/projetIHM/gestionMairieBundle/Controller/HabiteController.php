<?php

namespace projetIHM\gestionMairieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use projetIHM\gestionMairieBundle\Entity\Habite;

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
  



    $articles = Doctrine_Query::create()
              ->select('a.*, u.*')
              ->from('Habite a')
              ->leftJoin('a.Personne u')
              ->where('a.numSecu = u.Nsecu')
              ->execute();

foreach($articles as $article)
{
  echo $article->getTitre().' écrit par '.$article->getUser()->getUsername().'<br />';
}




    // Ou null si aucune personne n'est trouvé
    if($habites === null)
      {
	return $this->redirect($this->generateUrl('gestion_mairie_homepage'));
      }

    return $this->render('projetIHMgestionMairieBundle:Habite:index.html.twig', array('habites' => $habites));
  }      









  public function ajouterHabiteAction()
  {
   
    // On crée un objet Habite
    $habite = new Habite();
    $choices          = [];
    $form = $this->createForm(new HabiteType, $habite);
 

    // On récupère le repository
    $repository = $this->getDoctrine()
      ->getManager()
      ->getRepository('projetIHMgestionMairieBundle:Personne');

    //recupere toute les personnes
    $personnes = $repository->findAll();

    // creer un menu select qui propose les personnes et envoi leur Nsecu
    foreach ($personnes as $personne) {
        $choices[$personne->getNsecu()] = $personne->getNom()." ".$personne->getPrenom()." ".$personne->getNsecu();
    }

    //ajout du menu de select au form
    $form->add('numSecu', 'choice', array(
    'choices'   => $choices,
    'required'  => false,
					   ));



    //reinitialise
   $choices          = [];

    $repository = $this->getDoctrine()
      ->getManager()
      ->getRepository('projetIHMgestionMairieBundle:Logement');

    //recupere tout les logements
    $logements = $repository->findAll();

    // creer un menu select qui propose les personnes et envoi leur Nsecu
    foreach ($logements as $logement) {
        $choices[$logement->getId()] = $logement->getNumRue()." ".$logement->getNomRue()." ".$logement->getVille()." ".$logement->getCp();
    }

    //ajout du menu de select au form
    $form->add('adresse', 'choice', array(
    'choices'   => $choices,
    'required'  => false,
					   ));



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



}
