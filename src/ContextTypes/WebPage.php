<?php

namespace JsonLd\ContextTypes;

class WebPage extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        '@id' => null,
        'url' => null,
    ];

    /**
     * WebPage constructor.
     * @param array $attributes
     * @param array $extendedStructure
     */
    public function __construct(array $attributes, array $extendedStructure = [])
    {
        $this->structure = array_merge($this->structure, $extendedStructure);

        parent::__construct($attributes);
    }

    /**
     * Set the canonical URL of the article page.
     *
     * @param string $url
     *
     * @return array
     */
    protected function setUrlAttribute($url)
    {
        // The URL is used as an ID
        $this->properties['@id'] = $url;

        return null;
    }
}