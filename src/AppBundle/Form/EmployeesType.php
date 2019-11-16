<?php

namespace AppBundle\Form;



use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// 1. Include Required Namespaces



class EmployeesType extends AbstractType
{

    /**
     * {@inheritdoc}
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('POST')

            ->add('empfullname',EntityType::class,
                ['class'=>'BackendBundle\Entity\Employees',
                 'query_builder' => function(EntityRepository $repository)
                 {
                     return $repository->createQueryBuilder('e')
                         ->select('e')
                         ->where('e.disabled =:disabled')
                         ->setParameter('disabled','0');
                 },
                 'choice_label' => 'empfullname',
                 'required'  => false,
                 'attr'=> ['class'=>'form-control']])

            ->add('employeePasswd',PasswordType::class,['attr'=>['class'=>'form-control']])

            ->add('tstamp',EntityType::class,array(
                'class'=>'BackendBundle\Entity\Punchlist',
                'choice_label' => 'punchitems',
                'required' => false,
                'attr' => ['class'=>'form-control','onchange'=>'getvalTstamp(this);']))

            ->add('office',TextType::class,['attr'=>['class'=>'form-control']])

            ->add('save',SubmitType::class,
                ['label' => 'Submit',
                 'attr'  => ['class' => 'btn btn-primary','id'=>'enviar']]);

        $builder->get('employeePasswd')->setRequired(false);
        $builder->get('office')->setRequired(false);
    }


    /**
     * {@inheritdoc}
     */

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\Employees'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backendbundle_employees';
    }

}
