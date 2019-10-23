<?php

namespace LFDPP\AdminBundle\Form;

use LFDPP\AdminBundle\Entity\MessageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessagesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('title')
        ->add('userId')
        ->add('objectId', EntityType::class, array(
            'class' => 'AdminBundle:MessageType',
            'choice_label' => 'name',
            'multiple'     => false
        ))
        ->add('textMessage')
        ->add('creationDate')
        ->add('langId', EntityType::class, array(
            'class' => 'AdminBundle:Lang',
            'choice_label' => 'name',
            'multiple'     => false
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LFDPP\AdminBundle\Entity\Messages'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lfdpp_adminbundle_messages';
    }


}
