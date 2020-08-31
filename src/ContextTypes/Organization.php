<?php

namespace JsonLd\ContextTypes;

class Organization extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    private $extendedStructure = [
        'address' => PostalAddress::class,
        'logo' => ImageObject::class,
        'contactPoint' => ContactPoint::class,
        'email' => null,
        'hasPOS' => Place::class,
    ];

    /**
     * Organization constructor. Merges extendedStructure up
     *
     * @param array $attributes
     * @param array $extendedStructure
     */
    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct(
            $attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure)
        );
    }

    /**
     * Set the contactPoints
     *
     * @param array $items
     *
     * @return array
     */
    protected function setContactPointAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        if (is_array(reset($items)) === false) {
            return $this->getNestedContext(ContactPoint::class, $items);
        }

        return array_map(function ($item) {
            return $this->getNestedContext(ContactPoint::class, $item);
        }, $items);
    }


    /**
     * Set the hasPOS
     *
     * @param array $items
     * @return array
     */
    protected function setHasPOSAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        if (is_array(reset($items)) === false) {
            return $this->getNestedContext(Place::class, $items);
        }

        return array_map(function ($item) {
            return $this->getNestedContext(Place::class, $item);
        }, $items);
    }
}
