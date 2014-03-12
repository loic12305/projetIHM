<?php

namespace projetIHM\gestionMairieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonneEditType extends PersonneType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      parent::buildForm($builder, $options) ;
    }
    

    /**
     * @return string
     */
    public function getName()
    {
        return 'projetihm_gestionmairiebundle_personneedit';
    }
}
