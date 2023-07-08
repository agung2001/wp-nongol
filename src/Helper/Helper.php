<?php

namespace Nongol\Helper;

!defined('WPINC ') or die();

/**
 * Helper library for Nongol framework
 *
 * @package    Nongol
 * @subpackage Nongol\Includes
 */

class Helper
{
	/** Load Trait */
	use File;
	use Directory;
	use Text;
	use Option;
	use Plan;

	/**
	 * Define const which will be used within the framework
	 * @param   object   $framework     WordPress theme object
	 * @return void
	 */
	public function defineConst($framework)
	{
		define('NONGOL_NAME', $framework->getName());
		define('NONGOL_VERSION', $framework->getVersion());
		define('NONGOL_PRODUCTION', $framework->isProduction());
		define('NONGOL_PATH', json_encode($framework->getPath()));
	}

	/**
	 * Convert html relative path into absolute path
	 * @var     string  $path   WordPress base path
	 * @var     string  $html   Html string
	 * @return  void
	 */
	public function convertImagesRelativetoAbsolutePath($path, $html)
	{
		$pattern = '/<img([^>]*) ' . "src=\"([^http|ftp|https][^\"]*)\"/";
		$replace = "<img\${1} src=\"" . $path . "\${2}\"";
		return preg_replace($pattern, $replace, $html);
	}

	/**
	 * Extract templates from config files
	 * @var     array   $config         Lists of config templates
	 * @var     array   $templates      Lists of templates, to return
	 */
	public function getTemplatesFromConfig($config, $templates = [])
	{
		foreach ($config as $template) {
			foreach ($template->children as $children) {
				$templates[$children->id] = $children;
			}
		}
		return $templates;
	}
}
