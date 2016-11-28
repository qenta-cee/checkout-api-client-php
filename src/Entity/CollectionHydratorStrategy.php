<?php
namespace WirecardCheckoutApiClient\Entity;

use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

class CollectionHydratorStrategy implements StrategyInterface
{
    /**
     * @var Collection
     */
    protected $collection;

    /**
     * @param Collection $collection
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * Converts the given value so that it can be extracted by the hydrator.
     *
     * @param mixed $value The original value.
     * @return mixed Returns the value that should be extracted.
     */
    public function extract($value)
    {
        $items = Array();
        if($value instanceof Collection) {
            foreach($value->getItems() AS $item) {
                $items[] = $this->collection->getHydrator()->extract($item);
            }
        }
        return $items;
    }

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param mixed $value The original value.
     * @return mixed Returns the value that should be hydrated.
     */
    public function hydrate($value)
    {
        foreach ($value As $item) {
            $this->collection->addItem($item);
        }
        return $this->collection;
    }

}