<?php

namespace AppBundle\Form;

use BackendBundle\Entity\TypeOfPermitsRequired;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SupervisorNotificationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('state', CheckboxType::class, array(
                'required' => false,
                'value' => 1,
            ))
            ->add('typeOfPermit')

            ->add('nota', TextareaType::class, ['attr' => ['class' => 'form-control', 'placeholder' => 'Ingresa una nota']])
            ->add('idEmployee', TextType::class, ['attr' => ['class' => 'form-control']]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\SupervisorNotification'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_supervisornotification';
    }


}
