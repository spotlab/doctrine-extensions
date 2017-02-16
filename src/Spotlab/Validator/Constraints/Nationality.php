<?php

namespace Spotlab\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Nationality extends Constraint
{
    public $message = 'Nationality unknown';

    public function validatedBy()
    {
        return 'NationalityValidator';
    }
}
