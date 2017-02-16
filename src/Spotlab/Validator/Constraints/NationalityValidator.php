<?php

namespace Spotlab\Validator\Constraints;

use Spotlab\Helper\SpotlabHelper;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * Validates whether a value is a valid nationality code.
 *
 */
class NationalityValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        try {
            $nationality = SpotlabHelper::getNationality($value);
        }
        catch (\Exception $e) {
            $this->context->addViolation($constraint->message);
        }
    }
}
