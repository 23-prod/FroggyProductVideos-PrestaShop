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
 *  @author Froggy Commerce <contact@froggy-commerce.com>
 *  @copyright  2013-2014 Froggy Commerce
 */

var froggyproductvideos_flag = 0;

$(document).ready(function() {
	$("input[name='reference']").parent().parent().prev().before('<tr><td class="col-left">' + label_product_video_froggy + ' ' + key.toUpperCase() + ':</td><td style="padding-bottom:5px;"></td></tr>');
});


