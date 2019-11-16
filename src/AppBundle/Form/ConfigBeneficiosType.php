<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfigBeneficiosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idBeneficio', EntityType::class,
                ['class' => 'BackendBundle\Entity\Benefits',
                    'label' => 'Nombre de Beneficio',
                    'required' => false,
                    'choice_label' => 'nombre',
                    'attr' => ['class' => 'form-control']])
            ->add('idConfig', EntityType::class,
                ['class' => 'BackendBundle\Entity\Configuracion',
                    'label' => 'Nombre Configuracion',
                    'required' => false,
                    'choice_label' => 'nombreConfig',
                    'attr' => ['class' => 'form-control']])
            ->add('cantidad', IntegerType::class,
                ['attr' => ['class' => 'form-control']])

            ->add('unidadMedida', ChoiceType::class, [
                'attr' => ['class' => 'form-control'],
                'required' => false,
                'choices' => [
                    'Dias' => 'dias',
                    'Horas' => 'horas',
                ],
            ])
            ->add("Guardar", SubmitType::class, array(
                "attr" => array(
                    "class" => "form-submit btn btn-primary margenSuperiorBoton"
                )
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\ConfigBeneficios'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_configbeneficios';
    }


}
