<?php

namespace AppBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeTimeGroupType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idEmployee',EntityType::class,
                ['class'=>'BackendBundle\Entity\Employees',
                    'choice_label' => 'empfullname',
                    'required'  => false,
                    'attr'=> ['class'=>'form-control']])
            ->add('idGroupSchedule',EntityType::class,
                ['class'=>'BackendBundle\Entity\GroupSchedule',
                    'choice_label' => 'name',
                    'required'  => false,
                    'attr'=> ['class'=>'form-control','onchange'=>'mostrarField(this)']])
            ->add('startDate',TextType::class,
                ['attr'=> ['class'=> 'control']]);
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\EmployeeTimeGroup'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_employeetimegroup';
    }


}
