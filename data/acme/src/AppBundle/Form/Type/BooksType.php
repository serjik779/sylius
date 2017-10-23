<?php

namespace AppBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Bridge\Doctrine\Form\DataTransformer\CollectionToArrayTransformer;
use Symfony\Component\Form\FormBuilderInterface;

final class BooksType extends AbstractResourceType
{


    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addModelTransformer(new CollectionToArrayTransformer());
    }
//    public function buildForm(FormBuilderInterface $builder, array $options)
//    {
//        $builder
//            ->add('title', TextType::class, [
//                'label' => 'sylius.form.books.title',
//                'required' => true,
//            ])
//            ->add('description', CKEditorType::class, [
//                'label' => 'sylius.form.books.title',
//                'required' => true,
//                'config_name' => 'my_config',
//                'config' => array('toolbar' => 'full'),
//            ])
//            ->add('yearIssue', DateType::class, [
//                'label' => 'sylius.form.books.year',
//                'required' => true,
//                'widget' => 'choice',
//            ])
////            ->add('authors', CollectionType::class, [
////                'label' => 'sylius.form.books.authors',
////                'entry_type' => ChoiceType::class,
////                'allow_add' => true,
////                'allow_delete' => true,
////                'by_reference' => false,
////                'entry_options' => array(
////                    'choices' => function (Options $options) {
////                        $arr = $this->authorsRepository->findAll();
////                        $array = array();
////                        foreach ($arr as $a) {
////                            $array[] = $a->getLastname();
////                        }
////                        return array('asd'=>'asd');
////                    },
////                )
////            ])
//        ;
//    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'sylius_books';
    }
}