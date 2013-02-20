<?php

namespace GarbledTutors\RadiusIntegrationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RadcheckType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('attribute')
            ->add('op')
            ->add('value')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GarbledTutors\RadiusIntegrationBundle\Entity\Radcheck'
        ));
    }

    public function getName()
    {
        return 'garbledtutors_radiusintegrationbundle_radchecktype';
    }
}
