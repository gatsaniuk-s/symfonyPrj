<?php

namespace Acme\ProjBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('author', 'text', array(
            'required' => true
        ))
        ->add('date', 'date', array(
            'widget' => 'choice',
            'format' => 'dd-MM-yyyy',
            'required' => true
        ))
        ->add('site', 'url', array(
            'required' => true
        ))
        ->add('comment', 'textarea')
        ->add('rating', 'choice', array(
            'choices' => array(
                '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5',
                '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10',
            ),
            'required' => true
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\ProjBundle\Entity\Comment',
        ));
    }

    public function getName()
    {
        return 'comment';
    }
}