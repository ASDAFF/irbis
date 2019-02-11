<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?global $USER, $arTheme;?>
<?$bParent = $arResult && $USER->IsAuthorized();?>
<?$this->setFrameMode(true);?>
<!-- noindex -->
<div class="menu middle">
	<ul>
		<li>
            <?if (($USER->IsAuthorized() && SITE_ID == "s2") || ($USER->IsAuthorized() && SITE_ID == "s1")) {?>
			<a rel="nofollow" title="Авторизация для партнеров" class="dark-color" href="http://b2b.td-irbis.ru/personal/">
				<?=CNext::showIconSvg("cabinet", SITE_TEMPLATE_PATH."/images/svg/".($USER->IsAuthorized() ? 'User' : 'Lock')."_black.svg");?>
				<span><?=GetMessage('CABINET_LINK2')?></span>
				<?if($bParent):?>
					<span class="arrow"><i class="svg svg_triangle_right"></i></span>
				<?endif;?>
			</a>
            <?} else {?>
                <a rel="nofollow" title="Авторизация для партнеров" class="dark-color" href="http://b2b.td-irbis.ru/auth/" target="_blank">
                    <?=CNext::showIconSvg("cabinet", SITE_TEMPLATE_PATH."/images/svg/".($USER->IsAuthorized() ? 'User' : 'Lock')."_black.svg");?>
                    <span><?=GetMessage('CABINET_LINK2')?></span>
                    <?if($bParent):?>
                        <span class="arrow"><i class="svg svg_triangle_right"></i></span>
                    <?endif;?>
                </a>
            <?}?>
		</li>
	</ul>
</div>
<!-- /noindex -->