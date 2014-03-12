<?php

namespace projetIHM\gestionMairieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use projetIHM\gestionMairieBundle\Entity\Personne;



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
       throw $this->createNotFoundException('Article[id='.$id.'] inexistant.');
      return $this->redirect($this->generateUrl('gestion_mairie_homepage'));
  }
  

   return $this->render('projetIHMgestionMairieBundle:Personne:personne.html.twig', array(
    'personnes' => $personnes
  ));
      

  }



  public function ajouterPersonneAction(Request $request)
  {


    // On crée un objet Article
    $personne = new Personne();

    // On crée le FormBuilder grâce à la méthode du contrôleur
    $formBuilder = $this->createFormBuilder($personne);

    // On ajoute les champs de l'entité que l'on veut à notre formulaire
    $formBuilder
      ->add('Nsecu',        'integer')
      ->add('nom',       'text')
      ->add('prenom',     'text')
      ->add('dateNai',      'date')
      ->add('villeNai', 'text')
      ->add('sexe', 'text');

    // Pour l'instant, pas de commentaires, catégories, etc., on les gérera plus tard

    // À partir du formBuilder, on génère le formulaire
    $form = $formBuilder->getForm();


    $form->handleRequest($request);

    if ($form->isValid()) {
      // fait quelque chose comme sauvegarder la tâche dans la bdd
      // On récupère l'EntityManager
      $em = $this->getDoctrine()->getManager();

      // Étape 1 : On « persiste » l'entité
      $em->persist($personne);
      // Étape 2 : On « flush » tout ce qui a été persisté avant
      $em->flush();
      return $this->redirect($this->generateUrl('gestion_mairie_personne'));
    }
    else{

      // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
      return $this->render('projetIHMgestionMairieBundle:Personne:ajouterPersonne.html.twig',array('form' => $form->createView()));
    }
  }



}
