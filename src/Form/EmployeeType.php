<?php

namespace App\Form;

use App\Entity\Industries;
use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName' , null,['label'=>'ስም '])
            ->add('middleName' , null,['label'=>'የአባት ስም'])
            ->add('lastName' , null,['label'=>'የአያት ስም'])
            ->add('gender' ,ChoiceType::class, [
    'choices' => [
        'ወንድ' => 'ወንድ',
        'ሴት' => 'ሴት',
		
		
	]	
    ,'label'=>'ፆታ'])
             ->add('age' , null,['label'=>'እድሜ'])
            ->add('residentialId' , null,['label'=>'መታወቂያ ቁጥር'])
            ->add('phoneNo' , null,['label'=>'ስልክ ቁጥር'])
              ->add('isDisabled' , null,['label'=>'የአካል ጉዳት'])
            ->add('isStarter' , null,['label'=>'ሲጀመር ነበረ?'])
            ->add('isAvailable' , null,['label'=>'አሁን በስራ ላይ ነው?'])
         
			 ->add('contract' ,ChoiceType::class, [
    'choices' => [
        'ጊዜያዊ' => 'ጊዜያዊ',
        'ቋሚ' => 'ቋሚ',
		
		
	]	
    ,'label'=>'የቅጥር ሁኔታ'])
			

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
