<?php

use StellarWP\Configuration\Configuration;
use StellarWP\Configuration\ConfigurationLoader;
use StellarWP\Configuration\Provider\ConstantsProvider;

require_once 'vendor/autoload.php';

$loader = new ConfigurationLoader();
$loader->add(new ConstantsProvider());
$cnfig = new Configuration($loader);

var_dump($cnfig->get('bob'), $cnfig->has('bob'), $cnfig->all());