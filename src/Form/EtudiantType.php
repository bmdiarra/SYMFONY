<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricule_etu')
            ->add('nom_etu')
            ->add('prenom_etu')
            ->add('email_etu')
            ->add('telephone_etu')
            ->add('type_etu')
            ->add('datenaiss_etu')
            ->add('loger')
            ->add('type_bourse')
            ->add('adresse_etu')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
