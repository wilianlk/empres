<?php

namespace AppBundle\Form;

use BackendBundle\Entity\Employees;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContractHistoryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idEmployee', EntityType::class,
                ['class' => 'BackendBundle\Entity\Employees',
                    'choice_label' => 'empfullname',
                    'required' => true,
                    'attr' => ['class' => 'form-control']])
            ->add('startDate', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('endDate', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('idTypeContract', EntityType::class,
                ['class' => 'BackendBundle\Entity\ContractTypes',
                    'choice_label' => 'contractName',
                    'required' => false,
                    'attr' => ['class' => 'form-control']]);


    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\ContractHistory'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backendbundle_contracthistory';
    }


}
