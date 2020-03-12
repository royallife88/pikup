<?php
require_once 'vendor/autoload.php';

// Import the necessary classes
use Cartalyst\Cart\Cart;
use Cartalyst\Cart\Storage\NativeSession;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Session\FileSessionHandler;
use Illuminate\Session\Store;

// Require the cart config file
$config = require_once 'vendor/cartalyst/cart/src/config/config.php';

// Instantiate a new Session storage
$fileSessionHandler = new FileSessionHandler(new Filesystem(), __DIR__.'/storage/sessions');

$store = new Store('your_app_session_name', $fileSessionHandler);

$session = new NativeSession($store, $config['instance'], $config['session_key']);

// Instantiate the Cart and set the necessary configuration
$cart = new Cart($session, new Dispatcher);

$cart->setRequiredIndexes($config['requiredIndexes']);