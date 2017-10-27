<?php

/**
 * @defgroup plugins_generic_cachebuster
 */

/**
 * @file plugins/generic/cacheBuster/index.php
 *
 * Copyright (c) 2014-2017 Simon Fraser University
 * Copyright (c) 2003-2017 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @ingroup plugins_generic_cachebuster
 * @brief Wrapper for the Cache Buster plugin.
 *
 */
require_once('CacheBusterPlugin.inc.php');

return new CacheBusterPlugin();

?>
