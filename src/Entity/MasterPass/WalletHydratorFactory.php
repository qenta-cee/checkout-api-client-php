<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;
use WirecardCheckoutApiClient\Entity\EntityHydratorStrategy;

/**
 * Class WalletHydratorFactory
 * @package WirecardCheckoutApiClient\Entity
 */
class WalletHydratorFactory implements FactoryInterface
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
        /**
         * @var $basketHydratorStrategy EntityHydratorStrategy
         */
        $basketHydratorStrategy = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\BasketHydratorStrategy');
        $hydrator->addStrategy('basket', $basketHydratorStrategy);

        $cardHydratorStrategy = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\CardHydratorStrategy');
        $hydrator->addStrategy('card', $cardHydratorStrategy);

        $shippingAddressHydratorStrategy = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\ShippingAddressHydratorStrategy');
        $hydrator->addStrategy('shippingAddress', $shippingAddressHydratorStrategy);

        $billingAddressHydratorStrategy = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\BillingAddressHydratorStrategy');
        $hydrator->addStrategy('billingAddress', $billingAddressHydratorStrategy);

        return $hydrator;
    }

}
