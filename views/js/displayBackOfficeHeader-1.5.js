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

	$('.translatable').each(function () {
		if (froggyproductvideos_flag == 2)
		{
			$(this).parent().parent().parent().parent().after('<div class="separation"></div>');
			for (var key in value_product_video_froggy)
				$(this).parent().parent().parent().parent().after('<table cellpadding="5" style="width: 50%; margin-right: 20px; "><tbody><tr><td class="col-left"><label>' + label_product_video_froggy + ' ' + key.toUpperCase() + ':</label></td><td style="padding-bottom:5px;"><input name="froggyproductvideos[' + key + ']" type="text" value="' + value_product_video_froggy[key] + '" style="width:320px" /> </td></tr></tbody></table>');
			$(this).parent().parent().parent().parent().after('<div class="separation"></div>');
		}
		froggyproductvideos_flag++;
	});
});