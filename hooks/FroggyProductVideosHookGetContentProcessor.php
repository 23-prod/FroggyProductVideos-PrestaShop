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

class FroggyProductVideosHookGetContentProcessor extends FroggyHookProcessor
{
	/**
	 * Init Helper
	 * @return string HTML
	 */
	public function initHelper()
	{
		$configuration = array(
			'key' => 'configuration',
			'label' => $this->module->l('Configuration'),
			'form' => array(
				'Options' => array(
					'label' => $this->module->l('Options'),
					'fields' => array(
						array('type' => 'text', 'label' => $this->module->l('Video width:'), 'name' => 'FC_PV_WIDTH', 'default_value' => Configuration::get('FC_PV_WIDTH')),
						array('type' => 'text', 'label' => $this->module->l('Video height:'), 'name' => 'FC_PV_HEIGHT', 'default_value' =>  Configuration::get('FC_PV_HEIGHT')),
					)
				),
			)
		);

		$helper = new FroggyHelperFormList();

		$helper->setFormUrl($this->module->configuration_url);
		$helper->setContext($this->context);
		$helper->setModule($this->module);

		$helper->setConfiguration($configuration);
		$helper->prefillFormFields();
		$result = $helper->render();

		return $result;
	}

	public function processOptions()
	{
		Configuration::updateValue('FC_PV_WIDTH', Tools::getValue('FC_PV_WIDTH'));
		Configuration::updateValue('FC_PV_HEIGHT', Tools::getValue('FC_PV_HEIGHT'));

		return true;
	}

	/**
	 * Configuration method
	 * @return string $html
	 */
	public function run()
	{
		$form_result = false;
		if (Tools::isSubmit('froggyproductvideos-configuration-submit'))
			$form_result = $this->processOptions();

		$assign = array(
			'module_dir' => $this->path,
			'helper_display' => $this->initHelper(),
			'form_result' => $form_result,
		);

		$this->smarty->assign($this->module->name, $assign);
		return $this->module->fcdisplay(__FILE__, 'getContent.tpl');
	}
}