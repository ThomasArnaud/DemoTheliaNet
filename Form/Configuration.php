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

namespace DemoTheliaNet\Form;

use DemoTheliaNet\DemoTheliaNet;
use DemoTheliaNet\Model\Config\DemoTheliaNetConfigValue;
use Thelia\Form\BaseForm;

/**
 * Class Configuration
 * @package DemoTheliaNet\Form
 * @author Thomas Arnaud <tarnaud@openstudio.fr>
 */
class Configuration extends BaseForm
{

    protected function buildForm()
    {
        $this->formBuilder
            ->add(
                "admin_password",
                "text",
                array(
                    "label" => "The Admin Password",
                    "label_attr" => [
                        "for" => "password",
                    ],
                    "required" => false,
                    "constraints" => array(),
                    "data" => DemoTheliaNet::getConfigValue(DemoTheliaNetConfigValue::ADMIN_PASSWORD, null),
                )
            )
            ->add(
                "admin_username",
                "text",
                array(
                    "label" => "The Admin Username",
                    "label_attr" => [
                        "for" => "username",
                    ],
                    "required" => false,
                    "constraints" => array(),
                    "data" => DemoTheliaNet::getConfigValue(DemoTheliaNetConfigValue::ADMIN_USERNAME, null),
                )
            )
            ->add(
                "customer_password",
                "text",
                array(
                    "label" => "The Customer Password",
                    "label_attr" => [
                        "for" => "username",
                    ],
                    "required" => false,
                    "constraints" => array(),
                    "data" => DemoTheliaNet::getConfigValue(DemoTheliaNetConfigValue::CUSTOMER_PASSWORD, null),
                )
            )
            ->add(
                "customer_email",
                "text",
                array(
                    "label" => "The Customer Email",
                    "label_attr" => [
                        "for" => "username",
                    ],
                    "required" => false,
                    "constraints" => array(),
                    "data" => DemoTheliaNet::getConfigValue(DemoTheliaNetConfigValue::CUSTOMER_EMAIL, null),
                )
            );
    }

    /**
     * @return string the name of you form. This name must be unique
     */
    public function getName()
    {
        return "demo_thelia_net_configuration_form";
    }
}
