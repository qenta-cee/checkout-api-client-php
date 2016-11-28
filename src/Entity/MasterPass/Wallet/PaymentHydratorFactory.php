<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Class PaymentHydratorFactory
 * @package WirecardCheckoutApiClient\Entity\MasterPass\Wallet
 */
class PaymentHydratorFactory implements FactoryInterface {

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $hydrator = new ClassMethods(false);

        $hydrator->addStrategy('totalAmount', $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\AmountHydratorStrategy'));
        $hydrator->addStrategy('depositAmount', $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\AmountHydratorStrategy'));
        $hydrator->addStrategy('approveAmount', $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\AmountHydratorStrategy'));

        return $hydrator;
    }
}
