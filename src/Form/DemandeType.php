<?php

namespace App\Form;

use App\Entity\Application;
use App\Entity\Client;
use App\Entity\Demande;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->add('idapp' ,EntityType::class, [
                // looks for choices from this entity
                'class' => Application::class,

                'choice_label' => 'nom',

            ])

            ->add('rdvdepo')
            ->add('rdvrec')
            ->add('nommachine')
            ->add('remarque')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Demande::class,
        ]);
    }
}
