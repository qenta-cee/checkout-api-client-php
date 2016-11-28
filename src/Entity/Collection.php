<?php
namespace WirecardCheckoutApiClient\Entity;

use Zend\Stdlib\Hydrator\HydratorAwareInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

/**
 * Class Collection
 * @package WirecardCheckoutApiClient\Entity
 */
class Collection implements HydratorAwareInterface
{
    /**
     * @var mixed[]
     */
    protected $items = Array();

    /**
     * @var EntityInterface
     */
    protected $prototype;

    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    /**
     * Constructor
     *
     * @param EntityInterface $prototype
     */
    public function __construct(EntityInterface $prototype, HydratorInterface $hydrator = null)
    {
        $this->setPrototype($prototype);
        $this->hydrator = $hydrator;
    }

    /**
     * setter for the Prototype used for hydration
     *
     * @param EntityInterface $prototype
     * @return Collection $this
     */
    public function setPrototype(EntityInterface $prototype)
    {
        $this->prototype = $prototype;
        return $this;
    }


    //TODO: remove hydration from collection class
    /**
     * Set hydrator
     *
     * @param  HydratorInterface $hydrator
     * @return Collection
     */
    public function setHydrator(HydratorInterface $hydrator)
    {
        $this->hydrator = $hydrator;
        return $this;
    }

    /**
     * Retrieve hydrator
     *
     * @return HydratorInterface
     */
    public function getHydrator()
    {
        return $this->hydrator;
    }

    /**
     * add an item to the Collection
     *
     * @param $entity
     */
    public function addItem($entity)
    {
        if (!$entity instanceof EntityInterface) {
            $entity = $this->getHydrator()->hydrate($entity, clone $this->prototype);
        }
        $this->items[(string)$entity] = $entity;
    }

    /**
     * get an item by id or null if item does not exist
     *
     * @param string $id
     * @return mixed|null
     */
    public function getItem($id)
    {
        return $this->hasItem($id) ? $this->items[$id] : null;
    }

    /**
     * check if the item with given id exists in this collection
     *
     * @param $id
     * @return bool
     */
    public function hasItem($id)
    {
        return array_key_exists($id, $this->items);
    }

    /**
     * add multiple items to the Collection
     *
     * @param array $items
     * @return Collection $this
     */
    public function addItems(Array $items)
    {
        foreach ($items as $item) {
            $this->addItem($item);
        }
        return $this;
    }

    /**
     * get all items from this Collection
     *
     * @return mixed[]
     */
    public function getItems()
    {
        return array_values($this->items);
    }

    //TODO: add array access

    /**
     * @return string
     */
    public function __toString()
    {
        //collection does not have a string interpretation.
        return md5(json_encode(array_map(function($item) {
            return (string)$item;
        }, $this->getItems())));
    }
}