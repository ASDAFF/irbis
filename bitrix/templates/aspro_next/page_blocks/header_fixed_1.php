<?
global $arTheme, $arRegion;
if($arRegion)
	$bPhone = ($arRegion['PHONES'] ? true : false);
else
	$bPhone = ((int)$arTheme['HEADER_PHONES'] ? true : false);
$logoClass = ($arTheme['COLORED_LOGO']['VALUE'] !== 'Y' ? '' : ' colored');
?>
<div class="wrapper_inner">
	<div class="logo-row v1 row margin0">
		<div class="pull-left">
			<div class="inner-table-block sep-left nopadding logo-block">
				<div class="logo<?=$logoClass?>">
					<?=CNext::ShowLogo();?>
				</div>
			</div>
		</div>
		<div class="pull-left">
			<div class="inner-table-block menu-block rows sep-left">
				<div class="title"><i class="svg svg-burger"></i><?=GetMessage("S_MOBILE_MENU")?>&nbsp;&nbsp;<i class="fa fa-angle-down"></i></div>
				<div class="navs table-menu js-nav">
					<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
						array(
							"COMPONENT_TEMPLATE" => ".default",
							"PATH" => SITE_DIR."include/menu/menu.top_fixed_field.php",
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "",
							"AREA_FILE_RECURSIVE" => "Y",
							"EDIT_TEMPLATE" => "include_area.php"
						),
						false, array("HIDE_ICONS" => "Y")
					);?>
				</div>
			</div>
		</div>
		<div class="pull-left col-md-3 nopadding hidden-sm hidden-xs search animation-width">
			<div class="inner-table-block">
				<?global $isFixedTopSearch;
				$isFixedTopSearch = true;?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => SITE_DIR."include/top_page/search.title.catalog.php",
						"EDIT_TEMPLATE" => "include_area.php"
					)
				);?>
			</div>
		</div>
		<div class="pull-right">
			<?CNext::ShowBasketWithCompareLink('top-btn inner-table-block', 'big');?>
		</div>
		<div class="pull-right">
			<div class="inner-table-block small-block">
				<div class="wrap_icon wrap_cabinet">
                    <a rel="nofollow" title="Мой кабинет" class="personal-link dark-color" href="http://b2b.td-irbis.ru/auth/" target="_blank"><i class="svg inline big svg-inline-cabinet" aria-hidden="true" title="Мой кабинет"><svg xmlns="http://www.w3.org/2000/svg" width="21.03" height="21" viewBox="0 0 21.03 21">
                                <defs>
                                    <style>
                                        .uscls-1 {
                                            fill: #222;
                                            fill-rule: evenodd;
                                        }
                                    </style>
                                </defs>
                                <path data-name="Rounded Rectangle 107" class="uscls-1" d="M1425.5,111a6.5,6.5,0,1,1-6.5,6.5A6.5,6.5,0,0,1,1425.5,111Zm0,2a4.5,4.5,0,1,1-4.5,4.5A4.5,4.5,0,0,1,1425.5,113Zm8.35,19c-1.09-2.325-4.24-4-6.85-4h-3c-2.61,0-5.79,1.675-6.88,4h-2.16c1.11-3.448,5.31-6,9.04-6h3c3.73,0,7.9,2.552,9.01,6h-2.16Z" transform="translate(-1414.97 -111)"></path>
                            </svg>
                        </i></a>
<!--					--><?//=CNext::ShowCabinetLink(true, false, 'big');?>
				</div>
			</div>
		</div>
		<?if($arTheme['SHOW_CALLBACK']['VALUE'] == 'Y'):?>
			<div class="pull-right">
				<div class="inner-table-block">
                    <script id="bx24_form_button" data-skip-moving="true">
                        (function(w,d,u,b){w['Bitrix24FormObject']=b;w[b] = w[b] || function(){arguments[0].ref=u;
                                (w[b].forms=w[b].forms||[]).push(arguments[0])};
                            if(w[b]['forms']) return;
                            var s=d.createElement('script');s.async=1;s.src=u+'?'+(1*new Date());
                            var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
                        })(window,document,'https://b24.irbis-td.ru/bitrix/js/crm/form_loader.js','b24form');

                        b24form({"id":"3","lang":"ru","sec":"2cizv2","type":"button","click":""});
                    </script><span class="foto_search twosmallfont colored  white btn-default btn b24-web-form-popup-btn-3"><i class="fas fa-camera"></i>Заказать по фото</span>
				</div>
			</div>
		<?endif;?>
		<?if($bPhone):?>
			<div class="pull-right logo_and_menu-row">
				<div class="inner-table-block phones">
					<?CNext::ShowHeaderPhones();?>
				</div>
			</div>
		<?endif;?>
	</div>
</div>