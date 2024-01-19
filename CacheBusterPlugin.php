<?php
/**
 * @file plugins/generic/cacheBuster/CacheBusterPlugin.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2003-2021 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class CacheBusterPlugin
 * @ingroup plugins_generic_cachebuster
 *
 * @brief Clear the CSS and Template cache on every page load.
 */

namespace APP\plugins\generic\cacheBuster;

use APP\core\Application;
use APP\template\TemplateManager;
use PKP\cache\CacheManager;
use PKP\plugins\GenericPlugin;

class CacheBusterPlugin extends GenericPlugin
{
    /**
     * @copydoc Plugin::register
     */
    public function register($category, $path, $mainContextId = null): bool
    {
        $success = parent::register($category, $path);
        if ($success && $this->getEnabled()) {
            $templateMgr = TemplateManager::getManager(Application::get()->getRequest());
            $templateMgr->clearTemplateCache();
            $templateMgr->clearCssCache();

            $cacheMgr = CacheManager::getManager();
            $cacheMgr->flush();
        }
        return $success;
    }

    /**
     * @copydoc PKPPlugin::getDisplayName
     */
    public function getDisplayName(): string
    {
        return __('plugins.generic.cacheBuster.displayName');
    }

    /**
     * @copydoc PKPPlugin::getDescription
     */
    public function getDescription(): string
    {
        return __('plugins.generic.cacheBuster.description');
    }
}

// For backwards compatibility -- expect this to be removed approx. OJS/OMP/OPS 3.6
if (!PKP_STRICT_MODE) {
    class_alias('\APP\plugins\generic\cacheBusterPlugin\CacheBusterPlugin', '\CacheBusterPlugin');
}
