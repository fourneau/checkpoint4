<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface as FormFormBuilderInterface;
use Symfony\Component\Form\Test\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactType extends AbstractType
{

    public function buildForm(FormFormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('firstname', null, array('attr' => array
        ('placeholder' => 'Prénom' , 'style' => 'border-radius:1rem;
        height:2.5rem; background-color:#ebebeb; text-align:center')))
        ->add('lastname', null, array('attr' => array
        ('placeholder' => 'Nom' , 'style' => 'border-radius:1rem;
        height:2.5rem; background-color:#ebebeb; text-align:center')))
        ->add('email', null, array('attr' => array
        ('placeholder' => 'Email', 'style' => 'border-radius:1rem;
        height:2.5rem; background-color:#ebebeb; text-align:center')))
        ->add('phone_number', null, array('attr' => array
        ('placeholder' => 'Téléphone', 'style' => 'border-radius:1rem;
        height:2.5rem; background-color:#ebebeb; text-align:center')))
        ->add('message', null, array('attr' => array
        ('placeholder' => 'Message:', 'style' => 'height: 20rem;
        background-color:#ebebeb; border-radius:1rem')))
        ->add('checkbox', CheckboxType::class, [
        'label' => 'En cochant cette case, j\'accepte que le cabinet me contacte pour répondre à ma demande',
        'required' => true,
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
