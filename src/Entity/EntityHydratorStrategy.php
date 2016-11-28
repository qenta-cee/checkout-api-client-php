<?php
namespace WirecardCheckoutApiClient\Entity;

use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

class EntityHydratorStrategy implements StrategyInterface
{
    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    /**
     * @var EntityInterface
     */
    protected $prototype;

    public function __construct(HydratorInterface $hydrator, EntityInterface $prototype) {
        $this->hydrator = $hydrator;
        $this->prototype = $prototype;
    }

    /**
     * Converts the given value so that it can be extracted by the hydrator.
     *
     * @param mixed $value The original value.
     * @param object $object (optional) The original object for context.
     * @return mixed Returns the value that should be extracted.
     */
    public function extract($value)
    {
        if(is_object($value)) {
            return $this->hydrator->extract($value);
        } else {
            return $value;
        }
    }

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param mixed $value The original value.
     * @param array $data (optional) The original data for context.
     * @return mixed Returns the value that should be hydrated.
     */
    public function hydrate($value)
    {
        return $this->hydrator->hydrate($value, clone $this->prototype);
    }

}