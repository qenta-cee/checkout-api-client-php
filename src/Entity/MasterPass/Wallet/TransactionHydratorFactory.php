<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;
use WirecardCheckoutApiClient\Entity\EntityHydratorStrategy;

/**
 * Class TransactionHydratorFactory
 * @package WirecardCheckoutApiClient\Entity\MasterPass\Wallet
 */
class TransactionHydratorFactory implements FactoryInterface {

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
         * @var $amountHydratorStrategy EntityHydratorStrategy
         */
        $amountHydratorStrategy = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\AmountHydratorStrategy');

        $hydrator->addStrategy('amount', $amountHydratorStrategy);

        return $hydrator;
    }

}
