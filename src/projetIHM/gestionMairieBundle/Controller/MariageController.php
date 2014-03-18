<?php


namespace projetIHM\gestionMairieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use projetIHM\gestionMairieBundle\Entity\Mariage;
use projetIHM\gestionMairieBundle\Form\MariageType;
use projetIHM\gestionMairieBundle\Form\MariageEditType;

class MariageController extends Controller
{


  public function indexAction()
  {
    // On récupère le repository
    $repository = $this->getDoctrine()
      ->getManager()
      ->getRepository('projetIHMgestionMairieBundle:Mariage');

    // On récupère toute les entités
    $mariages = $repository->findAll();
  

    // Ou null si aucun amariage n'est trouvé
    if($mariages === null)
      {
	return $this->redirect($this->generateUrl('gestion_mairie_homepage'));
      }

    return $this->render('projetIHMgestionMairieBundle:Mariage:mariage.html.twig', array('mariages' => $mariages));
  }      






  public function ajouterMariageAction()
  {
   
    // On crée un objet Mariage
    $mariage = new Mariage();
    $choices          = [];
    $form = $this->createForm(new MariageType, $mariage);
 

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
    $form->add('numSecu1', 'choice', array(
    'choices'   => $choices,
    'required'  => false,
					   ));
    //ajout du menu de select au form
    $form->add('numSecu2', 'choice', array(
    'choices'   => $choices,
    'required'  => false,
					   ));



    $request = $this->get('request');
    if ($request->getMethod() == 'POST') {
      $form->bind($request);
      
      if ($form->isValid()) {
	$em = $this->getDoctrine()->getManager();
	$em->persist($mariage);
	$em->flush();
	
	return $this->redirect($this->generateUrl('gestion_mairie_mariage'));
      }
    }

      return $this->render('projetIHMgestionMairieBundle:Mariage:ajouterMariage.html.twig',array('form' => $form->createView()));
    
  }


/*******************************/
/* SUPPRIME UN ACTE DE MARIAGE */
/*******************************/

  public function supprimerMariageAction(Mariage $mariage)
  {

    $request = $this->getRequest();
    if ($request->getMethod() == 'POST') {
 
      // On supprime la personne
      $em = $this->getDoctrine()->getManager();
      $em->remove($mariage);
      $em->flush();

      // Puis on redirige vers l'accueil
      return $this->redirect($this->generateUrl('gestion_mairie_mariage'));
    }      

return $this->redirect($this->generateUrl('gestion_mairie_mariage'));

  }






}
