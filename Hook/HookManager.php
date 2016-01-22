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

namespace DemoTheliaNet\Hook;

use DemoTheliaNet\DemoTheliaNet;
use DemoTheliaNet\Model\Config\DemoTheliaNetConfigValue;
use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;

/**
 * Class HookManager
 * @package DemoTheliaNet\Hook
 * @author Thomas Arnaud <tarnaud@openstudio.fr>
 */
class HookManager extends BaseHook
{
    public function onMainNavbarSecondary(HookRenderEvent $event)
    {
        $event->add($this->render("button_back_office_connexion.html"));
    }

    public function onModuleConfiguration(HookRenderEvent $event)
    {
        $event->add($this->render("module_configuration.html"));
    }

    public function onMainFooterJs(HookRenderEvent $event)
    {
        $password = DemoTheliaNet::getConfigValue(DemoTheliaNetConfigValue::ADMIN_PASSWORD, null);
        $username = DemoTheliaNet::getConfigValue(DemoTheliaNetConfigValue::ADMIN_USERNAME, null);

        $event->add(
            $this->render(
                "assets/js/admin_login_information_js.html",
                ['password' => $password, 'username' => $username]
            )
        );
    }

    public function onMainJavascriptInitialization(HookRenderEvent $event)
    {
        $password = DemoTheliaNet::getConfigValue(DemoTheliaNetConfigValue::CUSTOMER_PASSWORD, null);
        $email = DemoTheliaNet::getConfigValue(DemoTheliaNetConfigValue::CUSTOMER_EMAIL, null);

        $event->add(
            $this->render(
                "assets/js/customer_toolbar_connexion_information_js.html",
                ['password' => $password, 'email' => $email]
            )
        );
    }

    public function onLoginJavascriptInitionlization(HookRenderEvent $event)
    {
        $password = DemoTheliaNet::getConfigValue(DemoTheliaNetConfigValue::CUSTOMER_PASSWORD, null);
        $email = DemoTheliaNet::getConfigValue(DemoTheliaNetConfigValue::CUSTOMER_EMAIL, null);

        $event->add(
            $this->render(
                "assets/js/login_information_js.html",
                ['password' => $password, 'email' => $email]
            )
        );
    }

    public function onModulesJs(HookRenderEvent $event)
    {
        $event->add(
            $this->render("assets/js/prevent_module_toggle_activation_js.html")
        );
    }

    public function onModulesTop(HookRenderEvent $event)
    {
        $event->add(
            $this->render("modules_information_message.html")
        );
    }

    public function onVariablesTop(HookRenderEvent $event)
    {
        $event->add(
            $this->render("variables_information_message.html")
        );
    }
}
