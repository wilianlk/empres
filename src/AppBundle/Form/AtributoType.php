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
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AtributoType extends AbstractType
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
            ->add('descripcion',TextareaType::class, array(
                'label' => 'Descripcion Español',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-descripcion form-control'
                )
            ))
            ->add('descripcionIng',TextareaType::class, array(
                'label' => 'Descripcion Ingles',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-descripcion-ing form-control'
                )
            ))
            ->add('keywordsEsp',TextType::class, array(
                'label' => 'Keywords Español',
                'required' => false,
                'attr' => array(
                    'class' => 'form-keywordsEsp form-control'
                )
            ))
            ->add('keywordsIng',TextType::class, array(
                'label' => 'Keywords Ingles',
                'required' => false,
                'attr' => array(
                    'class' => 'form-keywordsIng form-control'
                )
            ))
            ->add('idDepartamento',HiddenType::class,array(
                'label' => 'Departamento',
                'attr' => array(
                    'class' => 'form-departamentohidden form-control',
                )
            ))
            ->add('idTipo',HiddenType::class,array(
                'label' => 'Tipo',
                'attr' => array(
                    'class' => 'form-tipohidden form-control',
                )
            ))
            ->add("Guardar",SubmitType::class,array(
                "attr" => array(
                    "class" => "form-submit btn btn-success margenSuperiorBoton"
                )
            ));
    }

    /**
     * {@inheritdoc}
     */
    //RECOMENDABLE DEFINIR CONCISAMENTE EL QUE DE ESTE METODO
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\ProdDeptoAtributo'
        ));
    }

    /**
     * {@inheritdoc}
     */
    //RECOMENDABLE DEFINIR CONCISAMENTE EL QUE DE ESTE METODO
    public function getBlockPrefix()
    {
        return 'backendbundle_atributo';
    }


}
