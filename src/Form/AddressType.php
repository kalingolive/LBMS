<?php

namespace App\Form;

use App\Entity\Kebele;
use App\Entity\Location;
use App\Entity\Industries;
use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AddressType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('houseNo' , null,['label'=>'የቤት ቁጥር'])
            ->add('phoneNo' , null,['label'=>'ስልክ ቁጥር'])
            
            ->add('kebele' , EntityType::class, [
    'class' => Kebele::class,
    'choice_label' => 'name',
	'label'=>'መንደር',
])
            ->add('location' , EntityType::class, [
    'class' => Location::class,
    'choice_label' => 'name',
	'label'=>'ቀበሌ',
])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
