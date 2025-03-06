<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?
global $arTheme, $arRegion, $bLongHeader, $bColoredHeader;

$arRegions = CMaxRegionality::getRegions();
$bIncludeRegionsList = $arRegions || ($arTheme['USE_REGIONALITY']['VALUE'] !== 'Y' && $arTheme['USE_REGIONALITY']['DEPENDENT_PARAMS']['REGIONALITY_IPCITY_IN_HEADER']['VALUE'] !== 'N');

if($arRegion)
	$bPhone = ($arRegion['PHONES'] ? true : false);
else
	$bPhone = ((int)$arTheme['HEADER_PHONES'] ? true : false);

$logoClass = ($arTheme['COLORED_LOGO']['VALUE'] !== 'Y' ? '' : ' colored');
$bLongHeader = true;
$bColoredHeader = true;

$sectionId = null;
$rsSections = CIBlockSection::GetList(array(), array('IBLOCK_ID' => 43), false, array('ID', 'NAME'));
while ($arSection = $rsSections->Fetch()) {
    if ($arSection['NAME'] == $arRegion['NAME']) {
        $sectionId = $arSection['ID'];
        break;
    }
}

if ($sectionId !== null) {
    $arSelect = array("ID", "NAME", "PROPERTY_STREAT", "PROPERTY_EMAIL");
    $arFilter = array("IBLOCK_ID" => 43, "SECTION_ID" => $sectionId);
    $res = CIBlockElement::GetList(array(), $arFilter, false, array(), $arSelect);
    while ($ob = $res->Fetch()) {
        $arFields[] = $ob;
    }
}

$streetArray = [];
$emailArray = [];

foreach($arFields as $field) {
    $street = $field["PROPERTY_STREAT_VALUE"];
    $email = $field["PROPERTY_EMAIL_VALUE"];

    // If the street value does not exist in street array then add the field to street array
	if (!array_key_exists($street, $streetArray)) {

        $streetArray[$street] = $field;
    }

    // If the email value does not exist in email array then add the field to email array
    if (!array_key_exists($email, $emailArray)) {

        $emailArray[$email] = $field;
    }
}


$staticHtmlCache = \Bitrix\Main\Data\StaticHtmlCache::getInstance();
$staticHtmlCache->deleteAll();
?>
<script>
    $(document).ready(function () {
        let c = window.location.href;
        if (c.includes('clear_cache')) {
            c = c.replace('?clear_cache=Y', '');
            history.pushState({}, null, c);
        }
    });
</script>

<div class="header-wrapper fix-logo header-v6">
	<div class="logo_and_menu-row logo_and_menu-row--nested-menu icons_top">
			<div class="maxwidth-theme logo-row">
				<div class ="header__sub-inner">
						<div class = "header__left-part ">
							<div class="logo-block1 header__main-item">
								<div class="line-block line-block--16">
									<div class="logo<?=$logoClass?> line-block__item no-shrinked">
										<?=CMax::ShowLogo();?>
									</div>
								</div>	
							</div>
						</div>	
						<div class="content-block header__right-part">
							<div class="subtop lines-block header__top-part  ">
									<div class="content-block header__right-part">
							      <div class="wrapp_block logo-row">
         <div class="items-wrapper header__top-inner">
            <?if($bIncludeRegionsList):?>
               <div class="header__top-item">
                  <div class="top-description no-title wicons">
                     <?\Aspro\Functions\CAsproMax::showRegionList();?>
                  </div>
               </div>

            <?endif;?>
            <div class="header__top-wrap">
               <div class="header__top-item" style="display: flex;text-align: center;align-items: center;">
                  <div class="phone-block icons">
                     <?if($bPhone):?>
                     <div class="inline-block">
						 <?CMax::ShowHeaderPhones();?>
                     </div>
                     <?endif?>
                     <?$callbackExploded = explode(',', $arTheme['SHOW_CALLBACK']['VALUE']);
                        if( in_array('HEADER', $callbackExploded) ):?>
                     <div class="inline-block">
                        <span class="callback-block animate-load font_upper_xs colored" data-event="jqm" data-param-form_id="CALLBACK" data-name="callback"><?=GetMessage("CALLBACK")?></span>
                     </div>
                     <?endif;?>
                  </div>
               </div>
				
                    <div class="header__top-item new-blocks-hidden">
                        <div class="phone-block icons">
                            <!--'start_frame_cache_allregions-list-block2'-->
                            <div class="region_wrapper">
                                <div class="io_wrapper">
									<i class="svg svg-inline-mark  inline" style="display: inline; top: 5px; left: -18px;">
                                    	<svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 9.5H2C1.46957 9.5 0.960858 9.28929 0.585785 8.91422C0.210712 8.53914 0 8.03043 0 7.5V2.5C0 1.96957 0.210712 1.46086 0.585785 1.08578C0.960858 0.710712 1.46957 0.5 2 0.5H9C9.53043 0.5 10.0391 0.710712 10.4142 1.08578C10.7893 1.46086 11 1.96957 11 2.5V7.5C11 8.03043 10.7893 8.53914 10.4142 8.91422C10.0391 9.28929 9.53043 9.5 9 9.5ZM9 7.5V4.461L6 6.5H5L2 4.464V7.5H9ZM2.366 2.5L5.51099 4.57899L8.634 2.5H2.366Z" fill="#999999"/>
                                        </svg>
									</i>
                                    <div class="js_city_chooser dark-color list" style="overflow: visible; font-size: 14px;">
                                        <?php foreach ($emailArray as $emailFirst): ?>
											<?php if (count($emailArray) > 1): ?>
                                            <a href="mailto:<?= $emailFirst['PROPERTY_EMAIL_VALUE']; ?>">
                                                <?= $emailFirst['PROPERTY_EMAIL_VALUE']; ?>
                                            </a>
											<?php else: ?>
											<span>
                                                <?= $emailFirst['PROPERTY_EMAIL_VALUE']; ?>
                                            </span>
											<?php endif; ?>
                                            <?php break; ?>
                                        <?php endforeach; ?>

                                		<?php if (count($emailArray) > 1): ?>
                                        <span class="arrow">
                                            <i class="svg inline  svg-inline-down" aria-hidden="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="5" height="3" viewBox="0 0 5 3">
                                                    <path class="cls-1" d="M250,80h5l-2.5,3Z" transform="translate(-250 -80)"></path>
                                                </svg>
                                            </i>
                                        </span>
										<?php endif; ?>
                                    </div>
                                </div>
								<?php if (count($emailArray) > 1): ?>
                                <div class="dropdown">
                                    <div class="wrap">
                                        <?php foreach ($emailArray as $email): ?>
                                            <div class="more_item current">
                                                <a href="mailto:<?= $emailFirst['PROPERTY_EMAIL_VALUE']; ?>">
                                                    <?= $email['PROPERTY_EMAIL_VALUE']; ?>
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
								<?php endif; ?>
                            </div>
                            <!--'end_frame_cache_allregions-list-block2'-->
                        </div>
                    </div>
               <div class="header__top-item addr-block">
                  <!--<a href="https://b2b.ros-elektro.ru" target="_blank" class="b2b_btn">B2B-портал</a>-->
                  <!--<<a href="https://b2b.ros-elektro.ru" target="_blank">
                     <img src="<?= SITE_TEMPLATE_PATH. "/images/svg/b2b.svg" ?>">
                  </a>-->
<a class="opt_link" href="https://b2b.ros-elektro.ru" target="_blank">
<span class="opt_span">Оптовая система для юр. лиц</span>
<svg width="207" height="34" viewBox="0 0 207 34" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="207" height="34" rx="3" fill="url(#paint0_linear_1_5)"/>
<defs>
<linearGradient id="paint0_linear_1_5" x1="0" y1="34" x2="206.871" y2="-0.768929" gradientUnits="userSpaceOnUse">
<stop stop-color="#2F2482"/>
<stop offset="1" stop-color="#230ADE"/>
</linearGradient>
</defs>
</svg>
</a>

                  <div><?//CMax::showAddress('address tables inline-block');?></div>
               </div>
            </div>
  
         </div>
      </div>
						</div>
								
							</div>
							<div class="subbottom header__main-part">
								<div class="header__main-item flex1">	
											<div class="menu">
												<div class="menu-only">
													<nav class="mega-menu sliced">
														<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
															array(
																"COMPONENT_TEMPLATE" => ".default",
																"PATH" => SITE_DIR."include/menu/menu.subtop_content.php",
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
								
									<div class="header__main-item">
										<div class="auth">
											<div class="wrap_icon inner-table-block person  with-title">
												<?=CMax::showCabinetLink(true, true, 'big');?>
											</div>
										</div>
									</div>	
								
							</div>	
						</div>
				</div>
			</div>	

	</div>
	<div class="logo_and_menu-row header__top-part menu-row middle-block bg<?=strtolower($arTheme["MENU_COLOR"]["VALUE"]);?>">
		<div class="maxwidth-theme">
			<div class="header__main-part menu-only">
				<div class="<?=$basketViewNormal ? "header__top-item" : "";?> menu-only-wr margin0">
					<nav class="mega-menu">
						<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
							array(
								"COMPONENT_TEMPLATE" => ".default",
								"PATH" => SITE_DIR."include/menu/menu.only_catalog.php",
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "",
								"AREA_FILE_RECURSIVE" => "Y",
								"EDIT_TEMPLATE" => "include_area.php"
							),
							false, array("HIDE_ICONS" => "Y")
						);?>
					</nav>
				</div>
				<div class="header__top-item search-block">
					<div class="inner-table-block">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => SITE_DIR."include/top_page/search.title.catalog.php",
								"EDIT_TEMPLATE" => "include_area.php",
								'SEARCH_ICON' => 'Y'
							),
							false, array("HIDE_ICONS" => "Y")
						);?>
					</div>

				</div>
            <?if (CMax::GetFrontParametrValue("ORDER_BASKET_VIEW") === "NORMAL"):?>
            <div class="right-icons  wb line-block__item header__top-item">
               <div class="line-block line-block--40 line-block--40-1200">
                  <?=CMax::ShowBasketWithCompareLink('', 'big', '', 'wrap_icon wrap_basket baskets line-block__item');?>
               </div>
            </div>
            <?endif;?>
			</div>
		</div>
	</div>
	<div class="line-row visible-xs"></div>
</div>