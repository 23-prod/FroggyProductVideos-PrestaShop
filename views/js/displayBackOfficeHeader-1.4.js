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

$(document).ready(function() {
	$("#seo").parent().parent().next().next().next().after('<tr><td style="padding-bottom:5px;" colspan="2"><hr style="width:100%;"></td></tr>');
	for (var key in value_product_video_froggy)
		$("#seo").parent().parent().next().next().next().after('<tr><td class="col-left">' + label_product_video_froggy + ' ' + key.toUpperCase() + ':</td><td style="padding-bottom:5px;"><input name="froggyproductvideos[' + key + ']" type="text" value="' + value_product_video_froggy[key] + '" style="width:330px" /> </td></tr>');
	$("#seo").parent().parent().next().next().next().after('<tr><td style="padding-bottom:5px;" colspan="2"><hr style="width:100%;"></td></tr>');
});


