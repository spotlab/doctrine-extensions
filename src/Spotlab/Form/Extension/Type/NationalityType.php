<?php

namespace Spotlab\Form\Extension\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Spotlab\Helper\SpotlabHelper;

class NationalityType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => SpotlabHelper::getNationalities(),
            'choice_translation_domain' => false,
        ));
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}