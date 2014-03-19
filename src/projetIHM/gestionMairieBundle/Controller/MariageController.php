<?php


namespace projetIHM\gestionMairieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use projetIHM\gestionMairieBundle\Entity\Mariage;
use projetIHM\gestionMairieBundle\Entity\Personne;
use projetIHM\gestionMairieBundle\Form\MariageType;


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
   
    $mariage = new Mariage();
    


    $form = $this->createForm(new MariageType,$mariage);
 

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
