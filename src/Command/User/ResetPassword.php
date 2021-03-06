<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusVueStorefrontPlugin\Command\User;

use BitBag\SyliusVueStorefrontPlugin\Command\CommandInterface;

class ResetPassword implements CommandInterface
{
    /** @var string */
    protected $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function email(): ?string
    {
        return $this->email;
    }
}
