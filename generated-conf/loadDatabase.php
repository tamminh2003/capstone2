<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMaps(array (
  'default' => 
  array (
    0 => '\\Propel\\Map\\DiseaseTableMap',
    1 => '\\Propel\\Map\\PoctDeviceAditionalInfoTableMap',
    2 => '\\Propel\\Map\\PoctDeviceDetailsTimestampsTableMap',
    3 => '\\Propel\\Map\\PoctDeviceHasDiseaseTableMap',
    4 => '\\Propel\\Map\\PoctDeviceTableMap',
    5 => '\\Propel\\Map\\UsersTableMap',
  ),
));
