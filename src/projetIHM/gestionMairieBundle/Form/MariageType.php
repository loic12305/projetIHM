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
            ->add('numSecu1')
            ->add('numSecu2')
            ->add('dateMariage')
            ->add('villeMairie')
        ;




    //modification de l'interval année
    $builder->add('dateMariage','date', array(
				       'years' => range(date('Y'),1920),
					   ));



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
