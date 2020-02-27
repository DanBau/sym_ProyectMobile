<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Marca;
use AppBundle\Entity\User;
use AppBundle\Repository\MarcaRepository;
use AppBundle\Repository\UserRepository;

class ProductoType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nombre', TextType::class, [
        'label' => 'Nombre: ',
        'attr' => ['class' => 'form-control'],
        ])
        ->add('bateria', TextType::class, [
        'label' => 'Bateria: ',
        'attr' => ['class' => 'form-control'],
        ])
        ->add('ram', TextType::class, [
        'label' => 'RAM: ',
        'attr' => ['class' => 'form-control'],
        ])
        ->add('rom', TextType::class, [
        'label' => 'ROM: ',
        'attr' => ['class' => 'form-control'],
        ])
        ->add('sistema', TextType::class, [
        'label' => 'Sistema: ',
        'attr' => ['class' => 'form-control'],
        ])
        ->add('pulgadas', TextType::class, [
        'label' => 'Pulgadas: ',
        'attr' => ['class' => 'form-control'],
        ])
        ->add('resolucion', TextType::class, [
        'label' => 'Resolucion: ',
        'attr' => ['class' => 'form-control'],
        ])
        ->add('marca', EntityType::class, [
        'label' => 'Marca: ',
        'attr' => ['class' => 'form-control'],
        'class' => Marca::class,
        'query_builder' => function(MarcaRepository $r) {
        return $r->getMarcasQueryBuilder();
        }
        ])
        ->add('user', EntityType::class, [
        'label' => 'User: ',
        'attr' => ['class' => 'form-control'],
        'class' => User::class,
        'query_builder' => function(UserRepository $r) {
        return $r->getUserQueryBuilder();
        }
        ])
        ->add('save', SubmitType::class, array('label' => 'Continue', 'attr' => array('class' => 'btn btn-primary')));

        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Producto'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_producto';
    }

}
