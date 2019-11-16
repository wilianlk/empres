<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TipoatributoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    //RECOMENDABLE DEFINIR CONCISAMENTE EL QUE DE ESTE METODO
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class, array(
                'label' => 'Nombre Español',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-nombre form-control'
                )
            ))
            ->add('nombreIng',TextType::class, array(
                'label' => 'Nombre Ingles',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-nombreing form-control'
                )
            ))
            ->add("Guardar",SubmitType::class,array(
                "attr" => array(
                    "class" => "form-submit btn btn-success"
                )
            ));
    }/**
     * {@inheritdoc}
     */
    //RECOMENDABLE DEFINIR CONCISAMENTE EL QUE DE ESTE METODO
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\ProdDeptoTipoAtributo'
        ));
    }

    /**
     * {@inheritdoc}
     */
    //RECOMENDABLE DEFINIR CONCISAMENTE EL QUE DE ESTE METODO
    public function getBlockPrefix()
    {
        return 'backendbundle_tipoatributo';
    }


}
