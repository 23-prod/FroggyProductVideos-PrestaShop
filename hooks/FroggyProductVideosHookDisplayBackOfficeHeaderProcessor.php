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

class FroggyProductVideosHookDisplayBackOfficeHeaderProcessor extends FroggyHookProcessor
{
	public function postProcess($languages, $links)
	{
		$values = Tools::getValue('froggyproductvideos');
		foreach ($languages as $l)
			if (isset($values[$l['iso_code']]) && !empty($values[$l['iso_code']]))
			{
				$fpv = new FroggyProductVideosLinkObject();
				if (isset($links[$l['iso_code']]) && $links[$l['iso_code']]['id_fpv_video_link'] > 0)
					$fpv = new FroggyProductVideosLinkObject((int)$links[$l['iso_code']]['id_fpv_video_link']);
				$fpv->id_lang = (int)$l['id_lang'];
				$fpv->id_product = (int)Tools::getValue('id_product');
				$fpv->link = $values[$l['iso_code']];
				$fpv->date_upd = date('Y-m-d H:i:s');
				$fpv->save();
			}
	}

	public function run()
	{
		if ((int)Tools::getValue('id_product') < 1)
			return '';

		// Retrieve datas
		$languages = Language::getLanguages();
		$links = FroggyProductVideosLinkObject::getVideoLinks((int)Tools::getValue('id_product'));

		// Save new datas
		if (Tools::getIsset('submitAddproduct') || Tools::getIsset('submitAddproductAndStay'))
			$this->postProcess($languages, $links);

		// Assign to Smarty and display
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