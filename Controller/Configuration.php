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

namespace DemoTheliaNet\Controller;

use DemoTheliaNet\DemoTheliaNet;
use DemoTheliaNet\Model\Config\DemoTheliaNetConfigValue;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Security\AccessManager;
use Thelia\Core\Security\Resource\AdminResources;
use Thelia\Form\Exception\FormValidationException;
use Thelia\Tools\URL;

/**
 * Class Configuration
 * @package DemoTheliaNet\Controller
 * @author Thomas Arnaud <tarnaud@openstudio.fr>
 */
class Configuration extends BaseAdminController
{
    public function editConfiguration()
    {
        if (null !== $response = $this->checkAuth(
            AdminResources::MODULE,
            [DemoTheliaNet::DOMAIN_NAME],
            AccessManager::UPDATE
        )) {
            return $response;
        }

        $form = $this->createForm('demothelianet.configuration.form');
        $error_message = null;

        try {
            $validateForm = $this->validateForm($form);
            $data = $validateForm->getData();

            DemoTheliaNet::setConfigValue(DemoTheliaNetConfigValue::ADMIN_USERNAME, $data["admin_username"]);
            DemoTheliaNet::setConfigValue(DemoTheliaNetConfigValue::ADMIN_PASSWORD, $data["admin_password"]);
            DemoTheliaNet::setConfigValue(DemoTheliaNetConfigValue::CUSTOMER_EMAIL, $data["customer_email"]);
            DemoTheliaNet::setConfigValue(DemoTheliaNetConfigValue::CUSTOMER_PASSWORD, $data["customer_password"]);

            return $this->redirectToConfigurationPage();

        } catch (FormValidationException $e) {
            $error_message = $this->createStandardFormValidationErrorMessage($e);
        }

        if (null !== $error_message) {
            $this->setupFormErrorContext(
                'configuration',
                $error_message,
                $form
            );
            $response = $this->render("module-configure", ['module_code' => 'DemoTheliaNet']);
        }
        return $response;
    }

    /**
     * Redirect to the configuration page
     */
    protected function redirectToConfigurationPage()
    {
        return RedirectResponse::create(URL::getInstance()->absoluteUrl('/admin/module/DemoTheliaNet'));
    }
}
