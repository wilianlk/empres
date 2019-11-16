<?php

namespace AppBundle\Form;

use BackendBundle\Entity\Benefits;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UseBenefitType extends AbstractType
{


    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idEmployee',EntityType::class,
                ['class'=>'BackendBundle\Entity\Employees',
                    'label'=>'Empleado',
                    'choice_label' => 'empfullname',
                    'required'  => false,
                    'attr'=> ['class'=>'form-control']])

            ->add('idBeneficio',EntityType::class,
                ['class'=>'BackendBundle\Entity\Benefits',
                    'label'=>'Beneficio',
                    'choice_label' => 'nombre',
                    'required'  => false,
                    'attr'=> ['class'=>'form-control']])

            ->add('quantity',IntegerType::class,
                [ 'label'=>'Cantidad',
                   'attr'=>['class'=>'form-control'],
                   'required' => false
                ])

            ->add('unitMeasure', ChoiceType::class, [
                'label' => 'Unidad de Medida',
                'attr' => ['class' => 'form-control'],
                'required' => false,
                'choices' => [
                    'Dias' => 'dias',
                    'Horas' => 'horas',
                ],
            ])
            ->add('startDate', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('endDate', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('createdAt',HiddenType::class,
                [
                    'attr'=>['class'=>'form-control'],
                ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\UseBenefit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_usebenefit';
    }
}
