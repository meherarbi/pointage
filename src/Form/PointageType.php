<?php

// src/Form/PointageType.php

namespace App\Form;

use App\Entity\Pointage;
use App\Entity\Employe; // Assurez-vous d'importer l'entité Employe
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PointageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateHeure', DateTimeType::class, [
                'label' => 'Date et Heure',
                // Configurer d'autres options selon les besoins
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Type de pointage',
                'choices'  => [
                    'Arrivée' => 'arrivee',
                    'Départ' => 'depart',
                ],
                // Configurer d'autres options selon les besoins
            ])
            ->add('employe', EntityType::class, [
                'class' => Employe::class,
                'choice_label' => 'nom',
                // Configurer d'autres options selon les besoins
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pointage::class,
        ]);
    }
}
