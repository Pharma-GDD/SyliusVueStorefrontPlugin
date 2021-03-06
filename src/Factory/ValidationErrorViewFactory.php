<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusVueStorefrontPlugin\Factory;

use BitBag\SyliusVueStorefrontPlugin\View\ValidationErrorView;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

final class ValidationErrorViewFactory implements ValidationErrorViewFactoryInterface
{
    /** @var string */
    private $validationErrorViewClass;

    public function __construct(string $validationErrorViewClass)
    {
        $this->validationErrorViewClass = $validationErrorViewClass;
    }

    public function create(ConstraintViolationListInterface $validationResults): ValidationErrorView
    {
        /** @var ValidationErrorView $errorMessage */
        $errorMessage = new $this->validationErrorViewClass();
        $errorMessage->code = Response::HTTP_BAD_REQUEST;

        $message = [];

        /** @var ConstraintViolationInterface $result */
        foreach ($validationResults as $result) {
            $message[] = $result->getMessage();
        }

        $errorMessage->result = \implode(' ', $message);

        return $errorMessage;
    }
}
