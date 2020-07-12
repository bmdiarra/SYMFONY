<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricule_etu',TextType::class,[
                "required"=>false
                ])
            ->add('nom_etu')
            ->add('prenom_etu')
            ->add('email_etu')
            ->add('telephone_etu')
            ->add('type_etu',ChoiceType::class,[
                'choices' => [
                    '--' => NULL,
                    'boursier'    => 'boursier',
                    'nonboursier' => 'nonboursier'
                ]
            ])
            ->add('datenaiss_etu')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
