<?php


namespace JsonLd\ContextTypes;


/**
 * Class MonetaryAmount
 */
class MonetaryAmount extends StructuredValue
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'currency' => null,
        'maxValue' => null,
        'minValue' => null,
        'validFrom' => null,
        'validThrough' => null,
        'value' => null
    ];

    /**
     * Thing constructor. Merges extendedStructure up
     *
     * @param array $attributes
     * @param array $extendedStructure
     */
    public function __construct(array $attributes, array $extendedStructure = [])
    {
        $this->structure = array_merge($this->structure, $extendedStructure);

        parent::__construct($attributes);
    }
}
