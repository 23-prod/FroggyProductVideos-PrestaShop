{*
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
*  @author Froggy Commerce <contact@froggy-commerce.com>
*  @copyright  2013-2015 Froggy Commerce
*}

{if isset($smarty.get.id_product) && ((isset($smarty.get.controller) && $smarty.get.controller eq 'AdminProducts') || (isset($smarty.get.tab) && $smarty.get.tab eq 'AdminCatalog'))}
<script>
    var value_product_video_froggy = new Array();
	{foreach from=$froggyproductvideos.languages item=lang}
        value_product_video_froggy['{$lang.iso_code}'] = '{if isset($froggyproductvideos.links[$lang.iso_code].link)}{$froggyproductvideos.links[$lang.iso_code].link}{/if}';
    {/foreach}
    var label_product_video_froggy = '{l s='Product video'}';
</script>
<script type="text/javascript" src="{$froggyproductvideos.module_dir}views/js/displayBackOfficeHeader-{$froggyproductvideos.ps_version}.js"></script>
{/if}
