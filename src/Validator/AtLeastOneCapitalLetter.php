<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class AtLeastOneCapitalLetter extends Constraint
{
    public $message = 'Ciąg znaków "{{ string }}" musi posiadać co najmniej jedną dużą literę';
}