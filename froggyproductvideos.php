<?php
/*
* 2013-2014 Froggy Commerce
*
* NOTICE OF LICENSE
*
* You should have received a licence with this module.
* If you didn't buy this module on Froggy-Commerce.com, ThemeForest.net
* or Addons.PrestaShop.com, please contact us immediately : contact@froggy-commerce.com
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to benefit the updates
* for newer PrestaShop versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author Froggy Commerce <contact@froggy-commerce.com>
*  @copyright  2013-2014 Froggy Commerce
*/

// Security
defined('_PS_VERSION_') || require dirname(__FILE__).'/index.php';

// Include Froggy Library
if (!class_exists('FroggyModule', false)) require_once _PS_MODULE_DIR_.'/froggyproductvideos/froggy/FroggyModule.php';
require_once _PS_MODULE_DIR_.'/froggyproductvideos/classes/FroggyProductVideosLinkObject.php';

class FroggyProductVideos extends FroggyModule
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();

		$this->displayName = $this->l('Froggy Product Videos');
		$this->description = $this->l('Allow you to add videos to your products');
	}

	/*
	 *  Retrocompat 1.4
	 */
	public function getContent() { return $this->hookGetContent(array()); }
	public function hookBackOfficeHeader($params) { return $this->hookDisplayBackOfficeHeader($params); }
	public function hookExtraLeft($params) { return $this->hookDisplayLeftColumnProduct($params); }
	public function hookDisplayProductButtons($params) { return $this->hookDisplayLeftColumnProduct($params); }
}