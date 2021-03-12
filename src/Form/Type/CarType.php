<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Car;
use  Symfony\Component\Form\Form;


class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brands', TextType::class)
            ->add('model', TextType::class)
            ->add('registration', TextType::class)
            ->add('fuel', TextType::class)
            ->add('numberOfPlaces', IntegerType::class)
            ->add('numberOfDoors', IntegerType::class)
            ->add('description', TextType::class)
            ->add('price', IntegerType::class)
            ->add('stars', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
            'csrf_protection' => false,
        ]);
    }

    public static function getErrors(Form $form)
    {
        $errors = [];
        foreach ($form->all() as $field) {
            $fieldKey = $field->getName();
            foreach ($field->getErrors(true) as $error) {
                if(array_key_exists($fieldKey, $errors)) {
                    $errors[$fieldKey][] = $error->getMessage();
                } else {
                    $errors[$fieldKey] = [$error->getMessage()];
                }
            }
        }

        return $errors;
    }
}