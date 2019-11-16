<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GroupScheduleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class,['attr'=>['class'=>'form-control']])
                ->add('toleranceBeforeIn',IntegerType::class,['attr'=>['class'=>'form-control','onkeypress'=>'return event.charCode >= 48','min'=>'1' ]])
                ->add('toleranceAfterIn',IntegerType::class, ['attr'=>['class'=>'form-control','onkeypress'=>'return event.charCode >= 48','min'=>'1']])
                ->add('toleranceBeforeOut',IntegerType::class, ['attr'=>['class'=>'form-control','onkeypress'=>'return event.charCode >= 48','min'=>'1']])
                ->add('toleranceAfterOut',IntegerType::class, ['attr'=>['class'=>'form-control','onkeypress'=>'return event.charCode >= 48','min'=>'1']]);
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\GroupSchedule'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backendbundle_groupschedule';
    }


}
