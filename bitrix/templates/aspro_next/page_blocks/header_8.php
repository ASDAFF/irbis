<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?
global $arTheme, $arRegion;
$arRegions = CNextRegionality::getRegions();
if($arRegion)
	$bPhone = ($arRegion['PHONES'] ? true : false);
else
	$bPhone = ((int)$arTheme['HEADER_PHONES'] ? true : false);
$logoClass = ($arTheme['COLORED_LOGO']['VALUE'] !== 'Y' ? '' : ' colored');
?>
<div class="header-v8 header-wrapper">
	<div class="logo_and_menu-row">
		<div class="logo-row">
			<div class="maxwidth-theme">
				<div class="row">
					<div class="logo-block col-md-2 col-sm-3">
						<div class="logo<?=$logoClass?>">
							<?=CNext::ShowLogo();?>
						</div>
					</div>
					<div class="col-md-2 visible-lg">
						<div class="top-description">
							<?$APPLICATION->IncludeFile(SITE_DIR."include/top_page/slogan.php", array(), array(
									"MODE" => "html",
									"NAME" => "Text in title",
									"TEMPLATE" => "include_area.php",
								)
							);?>
						</div>
					</div>
					<?if($arRegions):?>
						<div class="inline-block pull-left">
							<div class="top-description">
								<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
									array(
										"COMPONENT_TEMPLATE" => ".default",
										"PATH" => SITE_DIR."include/top_page/regionality.list.php",
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_SUFFIX" => "",
										"AREA_FILE_RECURSIVE" => "Y",
										"EDIT_TEMPLATE" => "include_area.php"
									),
									false
								);?>
							</div>
						</div>
					<?endif;?>
					<div class="col-md-<?=($arRegions ? 3 : 4);?> search_wrap">
						<div class="search-block inner-table-block">
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
					<div class="right-icons pull-right">
						<div class="phone-block with_btn">
							<?if($bPhone):?>
								<div class="inner-table-block">
									<?CNext::ShowHeaderPhones();?>
									<div class="schedule">
										<?$APPLICATION->IncludeFile(SITE_DIR."include/header-schedule.php", array(), array("MODE" => "html","NAME" => GetMessage('HEADER_SCHEDULE'),"TEMPLATE" => "include_area.php"));?>
									</div>
								</div>
							<?endif?>
							<?if($arTheme['SHOW_CALLBACK']['VALUE'] == 'Y'):?>
								<div class="inner-table-block">
									<span class="callback-block animate-load twosmallfont colored  white btn-default btn" data-event="jqm" data-param-form_id="CALLBACK" data-name="callback"><?=GetMessage("CALLBACK")?></span>
								</div>
							<?endif;?>
						</div>
					</div>
				</div>
			</div>
		</div><?// class=logo-row?>
	</div>
	<div class="menu-row middle-block bg<?=strtolower($arTheme["MENU_COLOR"]["VALUE"]);?> sliced">
		<div class="maxwidth-theme">
			<div class="row">
				<div class="col-md-12">
					<div class="right-icons pull-right">
						<div class="pull-right">
							<?=CNext::ShowBasketWithCompareLink('', '', false, 'wrap_icon inner-table-block');?>
						</div>
						<div class="pull-right">
							<div class="wrap_icon inner-table-block">
<!--								--><?//=CNext::showCabinetLink(true, false, '');?>
                                <a rel="nofollow" title="Авторизация для партнеров" class="personal-link dark-color" href="http://b2b.td-irbis.ru/auth/" target="_blank"><i class="svg inline  svg-inline-cabinet" aria-hidden="true" title="Мой кабинет"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="17" viewBox="0 0 14 17">
                                            <defs>
                                                <style>
                                                    .uscls-1 {
                                                        fill: #222;
                                                        fill-rule: evenodd;
                                                    }
                                                </style>
                                            </defs>
                                            <path class="uscls-1" d="M13.969,16a1,1,0,1,1-2,0H11.927C11.578,14.307,9.518,13,7,13s-4.575,1.3-4.924,3H2.031a1,1,0,0,1-2,0,0.983,0.983,0,0,1,.1-0.424C0.7,12.984,3.54,11,7,11S13.332,13,13.882,15.6a1.023,1.023,0,0,1,.038.158c0.014,0.082.048,0.159,0.058,0.243H13.969ZM7,10a5,5,0,1,1,5-5A5,5,0,0,1,7,10ZM7,2a3,3,0,1,0,3,3A3,3,0,0,0,7,2Z"></path>
                                        </svg>
                                    </i>
                                </a>
							</div>
						</div>
					</div>
					<div class="menu-only">
						<nav class="mega-menu sliced">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
								array(
									"COMPONENT_TEMPLATE" => ".default",
									"PATH" => SITE_DIR."include/menu/menu.top.php",
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "",
									"AREA_FILE_RECURSIVE" => "Y",
									"EDIT_TEMPLATE" => "include_area.php"
								),
								false, array("HIDE_ICONS" => "Y")
							);?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="line-row visible-xs"></div>
</div>