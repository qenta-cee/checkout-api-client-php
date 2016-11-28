<?php

use WirecardCheckoutApiClient\Entity\EntityHydratorStrategy;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\BillingAddress;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\ShippingAddress;
use Zend\Stdlib\Hydrator\ClassMethods;

return Array(
  'service_manager' => Array(
      'factories' => Array(
          'WirecardCheckoutApiClient\\Entity\\ClassMethodsHydrator' => function ($serviceLocator) {
              return new ClassMethods(false);
          },
          'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\ShippingAddressHydratorStrategy' => function ($serviceLocator) {
              $hydrator = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\ShippingAddressHydrator');
              $prototype = new ShippingAddress();
              $hydratorStrategy = new EntityHydratorStrategy($hydrator, $prototype);
              return $hydratorStrategy;
          },
          'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\BillingAddressHydratorStrategy' => function ($serviceLocator) {
              $hydrator = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\BillingAddressHydrator');
              $prototype = new BillingAddress();
              $hydratorStrategy = new EntityHydratorStrategy($hydrator, $prototype);
              return $hydratorStrategy;
          }
      )
  )
);
