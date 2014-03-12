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

    // On récupère l'entité correspondant à l'id $id
    $personnes = $repository->findAll();
  

    // Ou null si aucun article n'a été trouvé avec l'id $id
    if($personnes === null)
      {
	return $this->redirect($this->generateUrl('gestion_mairie_homepage'));
      }

    return $this->render('projetIHMgestionMairieBundle:Personne:personne.html.twig', array('personnes' => $personnes));
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


   
    // On utiliser le ArticleEditType
    $form = $this->createForm(new PersonneEditType(), $personne);
    $request = $this->getRequest();

    if ($request->getMethod() == 'POST') {
      $form->bind($request);
      if ($form->isValid()) {
        // On enregistre l'article
        $em = $this->getDoctrine()->getManager();
        $em->persist($personne);
        $em->flush();

        // On définit un message flash
        $this->get('session')->getFlashBag()->add('info', 'Article bien modifié');

        return $this->redirect($this->generateUrl('gestion_mairie_homepage'));
      }
    }
    $personne->setNom("JENNN");    
    $personne->setPrenom("BLOT");    
    return $this->render('projetIHMgestionMairieBundle:Personne:modifierPersonne.html.twig', array(
												   'form'    => $form->createView(),
												   'personne'=>$personne
    ));







   /* $request = $this->get('request'); */


   /*  $em = $this->getDoctrine()->getEntityManager(); */
   /*  $testimonial = $em->getRepository('projetIHMgestionMairieBundle:Personne')->find($personne); */
   /*  $form = $this->createForm(new TestimonialType(), $testimonial); */

   /*  if ($request->getMethod() == 'POST') { */
   /*      $form->bindRequest($request); */

   /*      if ($form->isValid()) { */
   /*          // perform some action, such as save the object to the database */
   /*          $em->flush(); */

   /*          return $this->redirect($this->generateUrl('MyBundle_list_testimonials')); */
   /*      } */
   /*  } */

   /*  return $this->render('MyBundle:Testimonial:update.html.twig', array( */
   /*      'form' => $form->createView() */
   /*  )); */

  }





}
