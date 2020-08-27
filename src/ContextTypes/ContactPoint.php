<?php

namespace JsonLd\ContextTypes;

class ContactPoint extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'areaServed' => null,
        'telephone' => null,
        'contactType' => null,
        'email' => null,
    ];
}
