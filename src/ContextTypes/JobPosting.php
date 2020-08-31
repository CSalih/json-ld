<?php


namespace JsonLd\ContextTypes;


/**
 * Class JobPosting
 */
class JobPosting extends Intangible
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'title' => null,
        'description' => null,
        'datePosted' => null,
        'hiringOrganization' => Organization::class,
        'jobLocation' => Place::class,
        'baseSalary' => MonetaryAmount::class,
        'salaryCurrency' => null,
        'employmentType' => null,
        'validThrough' => null,
        'jobBenefits' => null,
        'qualifications' => null,
        'responsibilities' => null
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
