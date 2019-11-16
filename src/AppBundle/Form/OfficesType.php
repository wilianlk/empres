<?php

namespace AppBundle\Form;

use BackendBundle\Entity\Offices;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OfficesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('officename', EntityType::class,
                [
                    'class' => Offices::class,
                    'choice_label' => 'officename',
                    'required' => false,
                    'attr' => ['class' => 'form-control']
                    // 'multiple' => true,
                    // 'expanded' => true,
                ])
            ->add('country')
            ->add('state');
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\Offices'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backendbundle_offices';
    }


}
