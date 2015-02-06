<?php
/**
 * 2013-2015 Froggy Commerce
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
 * @copyright 2013-2015 Froggy Commerce
 * @license   Unauthorized copying of this file, via any medium is strictly prohibited
 */

class FroggyProductVideosHookDisplayProductTabContentProcessor extends FroggyHookProcessor
{
	public function run()
	{
		// Assign to Smarty and display
		$id_product = (int)Tools::getValue('id_product');
		$id_lang = (int)$this->context->language->id;
		$assign = array('link' => FroggyProductVideosLinkObject::getVideoLinks($id_product, $id_lang));
		$this->smarty->assign($this->module->name, $assign);
		return $this->module->fcdisplay(__FILE__, 'displayProductTabContent.tpl');
	}
}