<?php

namespace Spotlab\Form\Extension\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Spotlab\Helper;

class NationalityType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => SpotlabHelper::getNationalities(),
        ));
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}