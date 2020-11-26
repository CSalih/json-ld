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
        'answerCount' => null,
        'acceptedAnswer' => Answer::class,
        'suggestedAnswer' => Answer::class,
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


    protected function setSuggestedAnswerAttribute($items)
    {
        if (is_array($items) === false) {
            return $items;
        }

        if (is_array(reset($items)) === false) {
            return $this->getNestedContext(Answer::class, $items);
        }

        return array_map(function ($item) {
            return $this->getNestedContext(Answer::class, $item);
        }, $items);
    }
}