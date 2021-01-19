<?php

namespace App\Form;

use App\Entity\SubCategory;
use App\Entity\BusinessType;
use App\Entity\Industries;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class IndustriesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name' , null,['label'=>'ስም'])
            ->add('Year' , null,['label'=>'የተመሰረተበት ዘመን(ዓ።ም)'])
            ->add('organizedType' , null,['label'=>'የአደራጃጀት ዓይነት'])
            ->add('TinNo' , null,['label'=>'የግብር ከፋይነት መለያ ቁጥር'])
            ->add('startingCapital' , null,['label'=>'ሲመሠረት የነበረው ካፒታል መጠን'])
            ->add('source' , null,['label'=>'ምንጭ'])
            ->add('CurCashCapital' , null,['label'=>'አሁን ያለው ካፒታል በጥሬ ገንዘብ ብር'])
            ->add('CurAssetCapital' , null,['label'=>'በቋሚና ተንቀሳቃሽ ንብረቶች ግምት ብር '])
            ->add('progressLevel' , null,['label'=>'የእድገት  ደረጃ'])
            ->add('subCategory' , EntityType::class, [
    // looks for choices from this entity
    'class' => Subcategory::class,

    // uses the User.username property as the visible option string
    'choice_label' => 'name',

    // used to render a select box, check boxes or radios
    // 'multiple' => true,
    // 'expanded' => true,
'label'=>'የተሰማራበት ኑኡስ ዘርፍ'])
            ->add('businessType' , EntityType::class, [
    'class' => BusinessType::class,
    'choice_label' => 'name',
	'label'=>'የተሰማራበት የስራ ዘርፍ'
])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Industries::class,
        ]);
    }
}
