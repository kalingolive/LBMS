<?php

namespace App\Form;

use App\Entity\Industry;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class IndustryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name' ,TextType::class,['label'=>'የኢንደስትሪው ስም'])
            ->add('kebele',TextType::class,['label'=>'ቀበሌ '] )
            ->add('location' ,TextType::class,['label'=>'ኢንደስትሪው የሚገኝበት/መንደር '])
            ->add('houseNo' ,TextType::class,['label'=>'የቤት ቁጥር '])
            ->add('phoneNo' ,TextType::class,['label'=>'ስልክ ቁጥር '])
            ->add('rYear' ,TextType::class,['label'=>'የተመሰረተበት ዘመን(ዓ።ም '])
            ->add('Icatagory' ,ChoiceType::class, [
    'choices' => [
        'ምግብና መጠጥ ማዘጋጀት' => 'ምግብና መጠጥ ማዘጋጀት',
        'ቆዳና የቆዳ ዉጤቶች' => 'ቆዳና የቆዳ ዉጤቶች',
		'ብረታ ብረትና ኢንጅነሪንግ' => 'ብረታ ብረትና ኢንጅነሪንግ',
		'ብረታ ብረትና እንጨት ስራ' => 'ብረታ ብረትና እንጨት ስራ',
		'እንጨት ስራ' => 'እንጨት ስራ',
		'ከተማ ግብርና' => 'ከተማ ግብርና',
		'ኬ/የኬሚካል ዉጤቶች' => 'ኬ/የኬሚካል ዉጤቶች',
		'ኮንስትራክሽን ግብአት' => 'ኮንስትራክሽን ግብአት',
		'የዕጽዋት ተዋጽኦ ማቀነባበር' => 'የዕጽዋት ተዋጽኦ ማቀነባበር',
		'ጨርቃ ጨርቅና አልባሳት' => 'ጨርቃ ጨርቅና አልባሳት',		
		
    ],'label'=>'የተሰማራበት ኑኡስ ዘርፍ '])
            ->add('IWorkType' ,TextType::class,['label'=>'የተሰማራበት የስራ ዘርፍ '])
            ->add('IorganizedType' ,ChoiceType::class, [
    'choices' => [
        'ህ/ስ/ማ' => 'ህ/ስ/ማ',
        'በን/ማ' => 'በን/ማ',
		'በግል' => 'በግል',
		'አ.ማ' => 'አ.ማ',
		'አ/ማ' => 'አ/ማ',
		
		
    ],'label'=>'የአደራጃጀት ዓይነት '])
            ->add('tinNo' ,TextType::class,['label'=>'የግብር ከፋይነት መለያ ቁጥር '])
            ->add('SCapitalAmount' ,TextType::class,['label'=>'ሲመሠረት የነበረው ካፒታል መጠን '])
            ->add('SCapitalSource' ,TextType::class,['label'=>'ምንጭ '])
            ->add('CCapitalCash' ,TextType::class,['label'=>'አሁን ያለው ካፒታል በጥሬ ገንዘብ ብር '])
            ->add('CCapitalAsset' ,TextType::class,['label'=>'በቋሚና ተንቀሳቃሽ ንብረቶች ግምት ብር '])
            ->add('progressLevel' ,ChoiceType::class, [
    'choices' => [
        'አነስተኛ' => 'አነስተኛ',
        'መካከለኛ' => 'መካከለኛ',
		'ከፍተኛ' => 'ከፍተኛ',

		
		
    ],'label'=>'የእድገት  ደረጃ '])
            ->add('IMemberMale' ,null,['label'=>'የኢንደስትሪው አባላት ብዛት ወንድ '])
            ->add('IMemberFemale' ,null,['label'=>'የኢንደስትሪው አባላት ብዛት ሴት  '])
			->add('IMember16To29' ,null,['label'=>'የኢንደስትሪው አባላት ብዛት ከ16-29 '])
            ->add('IMemberAbove29' ,null,['label'=>'የኢንደስትሪው አባላት ብዛት ከ29 በላይ '])
            ->add('IDisabledMemberMale' ,null,['label'=>'የአካል ወንድ '])
            ->add('IDisabledMemberFemale' ,null,['label'=>'የአካል ሴት '])
            ->add('BEmployeeMale' ,null,['label'=>'የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ሰራተኛ ብዛት ወንድ '])
            ->add('BEmployeeFemale' ,null,['label'=>'የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ሰራተኛ ብዛት ሴት'])
            ->add('BFixedTermMale' ,null,['label'=>'የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ቋሚ ቅጥር  ወንድ '])
            ->add('BFixedTermFemale' ,null,['label'=>'የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ቋሚ ቅጥር ሴት '])
            ->add('BContratMale' ,null,['label'=>'የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ጊዜያዊ ቅጥር ወንድ '])
            ->add('BContratFemale' ,null,['label'=>'የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ጊዜያዊ ቅጥር ሴት '])
            ->add('CEmployeeMale' ,null,['label'=>'የኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ሰራተኛ ብዛት ወንድ '])
            ->add('CEmployeeFemale' ,null,['label'=>'የኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ሰራተኛ ብዛት ሴት '])
            ->add('CFixedTermMale' ,null,['label'=>'የኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ቋሚ ቅጥር  ወንድ '])
            ->add('CFixedTermFemale' ,null,['label'=>'የኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ቋሚ ቅጥር  ሴት '])
            ->add('CContratMale' ,null,['label'=>'የኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ጊዜያዊ ቅጥር  ወንድ '])
            ->add('CContratFemale' ,null,['label'=>'የኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ጊዜያዊ ቅጥር  ሴት '])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Industry::class,
        ]);
    }
}
