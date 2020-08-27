<?php


namespace JsonLd\ContextTypes;

class Question extends CreativeWork
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $extendedStructure = [
        'acceptedAnswer' => Answer::class,
    ];

    /**
     * Constructor. Merges extendedStructure up
     *
     * @param array $attributes
     * @param array $extendedStructure
     */
    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure));
    }
}