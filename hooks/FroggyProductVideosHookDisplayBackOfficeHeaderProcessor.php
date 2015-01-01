<?php
/**
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
 * @author    Froggy Commerce <contact@froggy-commerce.com>
 * @copyright 2013-2014 Froggy Commerce
 * @license   Unauthorized copying of this file, via any medium is strictly prohibited
 */

class FroggyProductVideosHookDisplayBackOfficeHeaderProcessor extends FroggyHookProcessor
{
	public function run()
	{
		if ((int)Tools::getValue('id_product') < 1)
			return '';

		$languages = Language::getLanguages();
		$links = FroggyProductVideosLinkObject::getVideoLinks((int)Tools::getValue('id_product'));

		$assign = array(
			'module_dir' => $this->path,
			'ps_version' => substr(_PS_VERSION_, 0, 3),
			'languages' => $languages,
			'links' => $links,
		);
		$this->smarty->assign($this->module->name, $assign);
		return $this->module->fcdisplay(__FILE__, 'displayBackOfficeHeader.tpl');
	}
}