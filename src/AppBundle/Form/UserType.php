<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nombre', TextType::class, [
                    'label' => ' Nombre ',
                    'attr' => ['class' => 'form-control'],
                ])
                ->add('password', TextType::class, [
                    'label' => 'Password ',
                    'attr' => ['class' => 'form-control'],
                ])
                ->add('telefono', TextType::class, [
                    'label' => 'Telefono ',
                    'attr' => ['class' => 'form-control'],
                ])
                ->add('mail', TextType::class, [
                    'label' => 'Email ',
                    'attr' => ['class' => 'form-control'],
                ])
                ->add('roles', TextType::class, [
                    'label' => 'Roles',
                    'attr' => ['class' => 'form-control'],
                ])
                ->add('save', SubmitType::class, array('label' => 'Continue', 'attr' => array('class' => 'btn btn-primary')));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_user';
    }

}
