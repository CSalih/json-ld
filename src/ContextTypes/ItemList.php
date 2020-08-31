<?php


namespace JsonLd\ContextTypes;


class ItemList extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $extendedStructure = [
        'itemListElement' => [],
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
     * Set the itemListElement
     *
     * @param array $items
     * @return array
     */
    protected function setItemListElementAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        if (is_array(reset($items)) === false) {
            return $this->getNestedContext(Thing::class, $items);
        }

        return array_map(function ($item) {
            return $this->getNestedContext(Thing::class, $item);
        }, $items);
    }
}