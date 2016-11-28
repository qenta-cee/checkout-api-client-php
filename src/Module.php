<?php
namespace WirecardCheckoutApiClient;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface {
    /**
     * provides the module configuration
     *
     * @see ConfigProviderInterface
     * @return array
     */
    public function getConfig()
    {
        return array_merge_recursive(
            include __DIR__ . '/../config/module.config.php',
            include __DIR__ . '/../config/entityHydratorStrategy.config.php'
        );
    }

}
