<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Class ItemHydratorFactory
 * @package WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket
 */
class ItemHydratorFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $hydrator = new ClassMethods(false);

        $hydrator->addStrategy('unitGrossAmount', $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\AmountHydratorStrategy'));
        $hydrator->addStrategy('unitNetAmount', $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\AmountHydratorStrategy'));
        $hydrator->addStrategy('unitTaxAmount', $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\AmountHydratorStrategy'));

        return $hydrator;
    }

}