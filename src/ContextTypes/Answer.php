<?php


namespace Styleflasher\SemanticWebBundle\SemanticContext;


use JsonLd\ContextTypes\Comment;

class Answer extends Comment
{
    /**
     * Constructor. Merges extendedStructure up
     *
     * @param array $attributes
     * @param array $extendedStructure
     */
    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $extendedStructure));
    }
}