<?php 

namespace FlowCode\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('name');
        $builder->add('description');
    }

    public function getName()
    {
        return 'product';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'FlowCode\SiteBundle\Entity\Product',
        );
    }   
    
}