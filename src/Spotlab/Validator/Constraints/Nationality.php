<?php

namespace Spotlab\Form\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Nationality extends Constraint
{
    public $message = 'validator.nationality';

    public function validatedBy()
    {
        return 'NationalityValidator';
    }
}
