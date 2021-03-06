<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace DemoTheliaNet;

use DemoTheliaNet\Model\Config\DemoTheliaNetConfigValue;
use Propel\Runtime\Connection\ConnectionInterface;
use Thelia\Module\BaseModule;

/**
 * Class DemoTheliaNet
 * @package DemoTheliaNet
 * @author Thomas Arnaud <tarnaud@openstudio.fr>
 */
class DemoTheliaNet extends BaseModule
{
    const DOMAIN_NAME = 'demothelianet';

    public function postActivation(ConnectionInterface $con = null)
    {
        DemoTheliaNet::setConfigValue(DemoTheliaNetConfigValue::ADMIN_PASSWORD, "thelia2");
        DemoTheliaNet::setConfigValue(DemoTheliaNetConfigValue::ADMIN_USERNAME, "thelia2");
        DemoTheliaNet::setConfigValue(DemoTheliaNetConfigValue::CUSTOMER_EMAIL, "test@thelia.net");
        DemoTheliaNet::setConfigValue(DemoTheliaNetConfigValue::CUSTOMER_PASSWORD, "thelia");
    }
}
