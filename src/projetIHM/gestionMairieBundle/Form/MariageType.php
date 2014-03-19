<?php

namespace projetIHM\gestionMairieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MariageType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateMariage')
            ->add('villeMairie')
            ->add('personne1')
            ->add('personne2')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'projetIHM\gestionMairieBundle\Entity\Mariage'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'projetihm_gestionmairiebundle_mariage';
    }
}
