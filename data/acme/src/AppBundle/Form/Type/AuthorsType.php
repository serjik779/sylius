<?php

namespace AppBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;

final class AuthorsType extends AbstractResourceType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'sylius.form.authors.firstname',
                'required' => true,
            ])
            ->add('lastname', TextType::class, [
                'label' => 'sylius.form.authors.lastname',
                'required' => true,
            ])
            ->add('yearBirth', DateType::class, [
                'label' => 'sylius.form.authors.yearBirth',
                'required' => true,
                'widget' => 'choice',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'sylius_authors';
    }
}