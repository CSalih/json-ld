<?php


namespace JsonLd\ContextTypes;

class FAQPage extends WebPage
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $extendedStructure = [
        'mainEntity' => Thing::class,
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

    /**
     * Set the mainEntity
     *
     * @param array $items
     * @return array
     */
    protected function setMainEntityAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        return array_map(function ($item) {
            return $this->getNestedContext(Place::class, $item);
        }, $items);
    }
}