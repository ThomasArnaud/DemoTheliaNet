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
use Symfony\Component\HttpFoundation\RedirectResponse;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Security\AccessManager;
use Thelia\Core\Security\Resource\AdminResources;
use Thelia\Tools\URL;

/**
 * Class RedirectActionOnLanguage
 * @package DemoTheliaNet\Controller
 * @author Thomas Arnaud <tarnaud@openstudio.fr>
 */
class RedirectActionOnLanguage extends BaseAdminController
{
    public function redirect()
    {
        if (null !== $response = $this->checkAuth(
            AdminResources::MODULE,
            [DemoTheliaNet::DOMAIN_NAME],
            AccessManager::UPDATE
        )) {
            return $response;
        }

        return $this->redirectToLanguagesConfigurationPage();
    }

    /**
     * Redirect to the configuration page
     */
    protected function redirectToLanguagesConfigurationPage()
    {
        return RedirectResponse::create(URL::getInstance()->absoluteUrl('/admin/configuration/languages'));
    }
}
