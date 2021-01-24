<?php
/**
 * @file plugins/generic/cacheBuster/CacheBusterPlugin.inc.php
 *
 * Copyright (c) 2014-2017 Simon Fraser University
 * Copyright (c) 2003-2017 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class CacheBusterPlugin
 * @ingroup plugins_generic_cachebuster
 *
 * @brief Clear the CSS and Template cache on every page load.
 */
class CacheBusterPlugin extends GenericPlugin {
	/**
	 * @copydoc Plugin::register
	 */
	public function register($category, $path, $mainContextId = NULL) {
		$success = parent::register($category, $path);
		if ($success && $this->getEnabled()) {
			$templateMgr = TemplateManager::getManager($request);
			$templateMgr->clearTemplateCache();
			$templateMgr->clearCssCache();
		}
		return $success;
	}

	/**
	 * @copydoc PKPPlugin::getDisplayName
	 */
	public function getDisplayName() {
		return __('plugins.generic.cacheBuster.name');
	}

	/**
	 * @copydoc PKPPlugin::getDescription
	 */
	public function getDescription() {
		return __('plugins.generic.cacheBuster.description');
	}
}
