<?php

namespace projetIHM\gestionMairieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use projetIHM\gestionMairieBundle\Entity\Personne;



class PersonneController extends Controller
{
  public function indexAction()
  {
    return $this->render('projetIHMgestionMairieBundle:Personne:personne.html.twig');
  }




  public function ajouterPersonneAction()
  {


  // On crée un objet Article
  $personne = new Personne();

  // On crée le FormBuilder grâce à la méthode du contrôleur
  $formBuilder = $this->createFormBuilder($personne);

  // On ajoute les champs de l'entité que l'on veut à notre formulaire
  $formBuilder
    ->add('Nsecu',        'text')
    ->add('nom',       'text')
    ->add('prenom',     'text')
    ->add('dateNai',      'date')
    ->add('villeNai', 'text')
    ->add('sexe', 'text');

  // Pour l'instant, pas de commentaires, catégories, etc., on les gérera plus tard

  // À partir du formBuilder, on génère le formulaire
  $form = $formBuilder->getForm();

  // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
    return $this->render('projetIHMgestionMairieBundle:Personne:ajouterPersonne.html.twig',array('form' => $form->createView()));

  }



}
