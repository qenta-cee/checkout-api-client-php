<?php

return Array(
    'service_manager' => Array(
        'invokables' => Array(
            'WirecardCheckoutApiClient\\Http\\Client' => 'Zend\\Http\\Client',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\ShippingProfileHydrator' => 'Zend\\Stdlib\\Hydrator\\ClassMethods',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\AmountHydrator' => 'Zend\\Stdlib\\Hydrator\\ClassMethods',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Card\\PlainHydrator' => 'Zend\\Stdlib\\Hydrator\\ClassMethods',
        ),
        'factories' => Array(
            'WirecardCheckoutApiClient\\Entity\\AmountHydratorStrategy' => 'WirecardCheckoutApiClient\\Entity\\AmountHydratorStrategyFactory',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemHydrator' => 'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemHydratorFactory',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemHydratorStrategy' => 'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemHydratorStrategyFactory',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemCollection' => 'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemCollectionFactory',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemCollectionHydratorStrategy' => 'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemCollectionHydratorStrategyFactory',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\BasketHydrator' => 'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\BasketHydratorFactory',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\BasketHydratorStrategy' => 'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\BasketHydratorStrategyFactory',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\CardHydratorStrategy' => 'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\CardHydratorStrategyFactory',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\CardHydrator' => 'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\CardHydratorFactory',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Card\\PlainHydratorStrategy' => 'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Card\\PlainHydratorStrategyFactory',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\WalletHydrator' => 'WirecardCheckoutApiClient\\Entity\\MasterPass\\WalletHydratorFactory',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\TransactionHydrator' => 'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\TransactionHydratorFactory',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\PaymentHydrator' => 'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\PaymentHydratorFactory',
            'WirecardCheckoutApiClient\\Service\\OAuth2Service' => 'WirecardCheckoutApiClient\\Service\\OAuth2ServiceFactory',
            'WirecardCheckoutApiClient\\Service\\MasterPass\\ShippingProfileResourceService' => 'WirecardCheckoutApiClient\\Service\\MasterPass\\ShippingProfileResourceServiceFactory',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\ShippingProfileCollection' => 'WirecardCheckoutApiClient\\Entity\\MasterPass\\ShippingProfileCollectionFactory',
            'WirecardCheckoutApiClient\\Service\\MasterPass\\WalletResourceService' => 'WirecardCheckoutApiClient\\Service\\MasterPass\\WalletResourceServiceFactory',
            'WirecardCheckoutApiClient\\Service\\MasterPass\\PostBackResourceService' => 'WirecardCheckoutApiClient\\Service\\MasterPass\\PostBackResourceServiceFactory',
            'WirecardCheckoutApiClient\\Service\\MasterPass\\PaymentResourceService' => 'WirecardCheckoutApiClient\\Service\\MasterPass\\PaymentResourceServiceFactory',
        ),
        'aliases' => Array(
            'WCAPI\\MasterPass\\ShippingProfileService' => 'WirecardCheckoutApiClient\\Service\\MasterPass\\ShippingProfileResourceService',
            'WCAPI\\MasterPass\\ShippingProfileCollection' => 'WirecardCheckoutApiClient\\Entity\\MasterPass\\ShippingProfileCollection',
            'WCAPI\\MasterPass\\WalletService' => 'WirecardCheckoutApiClient\\Service\\MasterPass\\WalletResourceService',
            'WCAPI\\MasterPass\\ItemCollection' => 'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemCollection',
            'WCAPI\\MasterPass\\PostBackService' => 'WirecardCheckoutApiClient\\Service\\MasterPass\\PostBackResourceService',
            'WCAPI\\MasterPass\\PaymentService' => 'WirecardCheckoutApiClient\\Service\\MasterPass\\PaymentResourceService',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\ShippingAddressHydrator' => 'WirecardCheckoutApiClient\\Entity\\ClassMethodsHydrator',
            'WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\BillingAddressHydrator' => 'WirecardCheckoutApiClient\\Entity\\ClassMethodsHydrator',
        )
    ),

    'rest_api' => Array(
        'base_uri' => 'https://checkout.wirecard.com'
    )
);
