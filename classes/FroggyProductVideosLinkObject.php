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

class FroggyProductVideosLinkObject extends ObjectModel
{
	public $id;

	/** @var integer Lang ID */
	public $id_lang;

	/** @var integer Product ID */
	public $id_product;

	/** @var string link */
	public $link;

	/** @var string Date */
	public $date_add;

	/** @var string Date */
	public $date_upd;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'fpv_video_link',
		'primary' => 'id_fpv_video_link',
		'multilang' => false,
		'fields' => array(
			'id_lang' => 					array('type' => 1, 'validate' => 'isUnsignedId', 'required' => true),
			'id_product' => 				array('type' => 1, 'validate' => 'isUnsignedId', 'required' => true),
			'link' => 						array('type' => 3, 'validate' => 'isString', 'required' => true),
			'date_add' => 					array('type' => 5, 'validate' => 'isDateFormat', 'copy_post' => false),
			'date_upd' => 					array('type' => 5, 'validate' => 'isDateFormat', 'copy_post' => false),
		),
	);
	/*	Can't use constant if we want to be compliant with PS 1.4
	 * 	const TYPE_INT = 1;
	 * 	const TYPE_BOOL = 2;
	 * 	const TYPE_STRING = 3;
	 * 	const TYPE_FLOAT = 4;
	 * 	const TYPE_DATE = 5;
	 * 	const TYPE_HTML = 6;
	 * 	const TYPE_NOTHING = 7;
	 */


	/*** Retrocompatibility 1.4 ***/

	protected $fieldsRequired = array('id_lang', 'id_product', 'link');
	protected $fieldsSize = array('id_lang' => 32, 'id_product' => 32, 'link' => 512);
	protected $fieldsValidate = array('id_lang' => 'isUnsignedInt', 'id_product' => 'isUnsignedInt', 'link' => 'isString');

	protected $table = 'fpv_video_link';
	protected $identifier = 'id_fpv_video_link';

	public function getFields()
	{
		if (version_compare(_PS_VERSION_, '1.5') >= 0)
			return parent::getFields();

		parent::validateFields();

		$fields = array();
		$fields['id_lang'] = (int)$this->id_lang;
		$fields['id_product'] = (int)$this->id_product;
		$fields['link'] = pSQL($this->link);
		$fields['date_add'] = pSQL($this->date_add);
		$fields['date_upd'] = pSQL($this->date_upd);

		return $fields;
	}

	/*** End of Retrocompatibility 1.4 ***/

	public static function getEmbedCode($infos)
	{
		$videos_sources = array(
			'youtube.com' => '<iframe width="{WIDTH}" height="{HEIGHT}" src="//www.youtube.com/embed/{KEY}?vq=hd1080" frameborder="0" allowfullscreen></iframe>',
			'vimeo.com' => '<iframe src="//player.vimeo.com/video/{KEY}?portrait=0&amp;badge=0" width="{WIDTH}" height="{HEIGHT}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>',
			'dailymotion.com' => '<iframe frameborder="0" width="{WIDTH}" height="{HEIGHT}" src="//www.dailymotion.com/embed/video/{KEY}?logo=0&quality=720" allowfullscreen></iframe>',
		);

		foreach ($videos_sources as $domain => $embed)
		{
			if (strpos($infos['link'], $domain))
			{
				if ($domain == 'youtube.com')
				{
					$parse = parse_url($infos['link']);
					parse_str($parse['query'], $output);
					$key = $output['v'];
				}
				else if ($domain == 'vimeo.com')
				{
					$parse = explode('/', $infos['link']);
					$parse = $parse[count($parse) - 1];
					$parse = explode('?', $parse);
					$key = $parse[0];
				}
				else if ($domain == 'dailymotion.com')
				{
					$parse = explode('/', $infos['link']);
					$parse = $parse[count($parse) - 1];
					$parse = explode('_', $parse);
					$key = $parse[0];
				}
				$width = Configuration::get('FC_PV_WIDTH');
				$height = Configuration::get('FC_PV_HEIGHT');
				$infos['domain'] = $domain;
				$infos['embed'] = str_replace(array('{KEY}', '{WIDTH}', '{HEIGHT}'), array($key, $width, $height), $embed);
			}
		}

		return $infos;
	}

	public static function getVideoLinks($id_product, $id_lang = false)
	{
		// Get links
		$links = Db::getInstance()->executeS('
		SELECT fvl.*, l.`iso_code`
		FROM `'._DB_PREFIX_.'fpv_video_link` fvl
		LEFT JOIN `'._DB_PREFIX_.'lang` l ON (l.`id_lang` = fvl.`id_lang`)
		WHERE fvl.`id_product` = '.(int)$id_product.'
		'.($id_lang !== false ? 'AND fvl.`id_lang` = '.(int)$id_lang : ''));

		// If one lang is requested, we send back the exact array
		if ($id_lang !== false)
			return self::getEmbedCode(array_shift($links));

		$links_by_isocode = array();
		foreach ($links as $l)
			$links_by_isocode[$l['iso_code']] = $l;

		return $links_by_isocode;
	}
}