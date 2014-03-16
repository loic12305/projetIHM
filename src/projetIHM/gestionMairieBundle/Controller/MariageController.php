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




    $form = $this->createForm(new MariageType, $mariage);


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




}
