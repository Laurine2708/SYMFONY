<?php

namespace App\Form;

use App\Entity\Distributeur;
use App\Entity\Produit;
use App\Entity\Reference;
use App\Form\ReferenceType;
use App\Form\Type\MyCheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\Form\Extension\Core\Type\NumberType; 
use Symfony\Component\Form\Extension\Core\Type\CheckboxType; 
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Form\CallbackTransformer;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //$builder
        //    ->add('nom')
        //    ->add('prix')
        //    ->add('quantite')
        //    ->add('rupture')
        //    ->add('lienImage')
        //    ->add('reference', EntityType::class, [
        //        'class' => Reference::class,
        //        'choice_label' => 'id',
        //    ])
        //    ->add('distributeurs', EntityType::class, [
        //        'class' => Distributeur::class,
        //        'choice_label' => 'id',
        //        'multiple' => true,
        //    ])
        //;

        $builder 
            ->add('nom',TextType::class,
                    array('label' => 'Nom produit :'))

            ->add('prix',NumberType::class,
                    array('label' => 'Prix :')) 

            ->add('quantite',NumberType::class,
                    array('label' => 'Quantité :')) 

            ->add('rupture',MyCheckboxType::class,
                    array('label' => 'Rupture de stock ?','required' => false)) 
            ->add('lienImage',FileType::class,
                    array('label' => 'Image :','required' => false, 'data_class' => null, 'empty_data' => 'aucune image')) 
 
            ->add('reference',ReferenceType::class,
                    array( 
                        'label' =>'Référence du poduit', 
                        "required"  => false 
                    )) 

            //->add('distributeurs', CollectionType::class,
            //        array('entry_type' => DistributeurType::class, 
            //    'allow_add' => true, 
            //    'allow_delete' =>true,
            //    'by_reference' => false,
            //    'label' => false
            //    ));
            
            ->add('distributeurs',EntityType::Class,array( 
                    'class' => Distributeur::class, 
                      'choice_label'=>'nom', 
                    'label' =>'Sélection des distributeurs', 
                    'multiple' => true, 
                    'required' => false 
                ));

        $builder->get('rupture') 
        ->addModelTransformer(new CallbackTransformer( 
        function ($activeAsString) { 
            // transform the int to boolean 
            return (bool)(int)$activeAsString; 
        }, 
        function ($activeAsBoolean) { 
            // transform the boolean to string 
            return (int)(bool)$activeAsBoolean; 
        } 
        ));

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
