<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DayScheduleGroupType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dayOfWeek',IntegerType::class,['attr'=>['class'=>'form-control']])
            ->add('idGroupSchedule',EntityType::class,
                ['class'=>'BackendBundle\Entity\GroupSchedule',
                    'choice_label' => 'name',
                    'required'  => false,
                    'attr'=> ['class'=>'form-control Schedule']])
            ->add('hourIn',TimeType::class,['attr'=>['class'=>'form-control']])
            ->add('hourOut',TextType::class,['attr'=>['class'=>'form-control']]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\DayScheduleGroup'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_dayschedulegroup';
    }


}
