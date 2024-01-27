<?php

// src/Form/AlimentoType.php

namespace App\Form;

use App\Entity\Alimento;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlimentoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class)
            ->add('calorie', IntegerType::class)
            ->add('proteine', IntegerType::class)
            ->add('grassi', IntegerType::class)
            ->add('carboidrati', IntegerType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Alimento::class,
        ]);
    }
}
