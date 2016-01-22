# Demo Thelia Net

This module add some features and some restrictions to the demonstration website.

## Installation

### Manually

* Copy the module into ```<thelia_root>/local/modules/``` directory and be sure that the name of the module is DemoTheliaNet.
* Activate it in your thelia administration panel

### Composer

Add it in your main thelia composer.json file

```
composer require your-vendor/demo-thelia-net-module:~1.0
```

## Usage

This module prevents the activation, desactivation, deletion, update and configuration of any over module.
It also prevents from doing anything to the Thelia system variables and the only action allowed on the languages is the update.

The module prefills the connexion fields of the admin and the customer with datas that you can update in the module configuration.
By default :

the admin username : thelia2
the admin password : thelia2

the customer email : test@thelia.net
the customer password : thelia



