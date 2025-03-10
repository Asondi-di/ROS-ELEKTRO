<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Проекты");
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"projects", 
	array(
		"IBLOCK_TYPE" => "aspro_max_content",
		"IBLOCK_ID" => "18",
		"NEWS_COUNT" => "20",
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "arProjectFilter",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ID",
		"SORT_ORDER2" => "DESC",
		"CHECK_DATES" => "Y",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/projects/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "100000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "N",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"USE_PERMISSIONS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "j F Y",
		"LIST_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"DISPLAY_NAME" => "N",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"DETAIL_ACTIVE_DATE_FORMAT" => "j F Y",
		"DETAIL_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "DETAIL_TEXT",
			3 => "DETAIL_PICTURE",
			4 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "FORM_ORDER",
			1 => "FORM_QUESTION",
			2 => "ORDERER",
			3 => "SITE",
			4 => "DATA",
			5 => "AUTHOR",
			6 => "LINK_BRANDS",
			7 => "LINK_VACANCY",
			8 => "TASK_PROJECT",
			9 => "LINK_LANDINGS",
			10 => "LINK_NEWS",
			11 => "LINK_REVIEWS",
			12 => "LINK_PARTNERS",
			13 => "LINK_PROJECTS",
			14 => "LINK_STAFF",
			15 => "LINK_BLOG",
			16 => "LINK_TIZERS",
			17 => "LINK_GOODS",
			18 => "LINK_SERVICES",
			19 => "LINK_TEAM",
			20 => "LINK_COMPANY",
			21 => "FORM_PROJECT",
			22 => "DOCUMENTS",
			23 => "PHOTOS",
			24 => "GALLEY_BIG",
			25 => "",
		),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"IMAGE_POSITION" => "left",
		"USE_SHARE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"USE_REVIEW" => "N",
		"ADD_ELEMENT_CHAIN" => "Y",
		"SHOW_DETAIL_LINK" => "Y",
		"S_ASK_QUESTION" => "",
		"S_ORDER_PROJECT" => "Заказать проект",
		"T_GALLERY" => "",
		"T_DOCS" => "",
		"T_PROJECTS" => "Похожие проекты",
		"T_CHARACTERISTICS" => "",
		"COMPONENT_TEMPLATE" => "projects",
		"SET_LAST_MODIFIED" => "N",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "Y",
		"MESSAGE_404" => "",
		"FORM_ID" => "",
		"GALLERY_TYPE" => "big",
		"T_GOODS" => "Товары",
		"T_SERVICES" => "",
		"T_REVIEWS" => "Отзыв клиента",
		"SECTION_ELEMENTS_TYPE_VIEW" => "FROM_MODULE",
		"ELEMENT_TYPE_VIEW" => "element_1",
		"LINE_ELEMENT_COUNT" => "3",
		"LINE_ELEMENT_COUNT_LIST" => "3",
		"SHOW_SECTION_PREVIEW_DESCRIPTION" => "Y",
		"SHOW_SECTION_DESCRIPTION" => "Y",
		"S_ORDER_SERVISE" => "Заказать проект",
		"SHOW_MAX_ELEMENT" => "N",
		"T_MAX_LINK" => "",
		"T_PREV_LINK" => "",
		"FORM_ID_ORDER_SERVISE" => "6",
		"IMAGE_WIDE" => "Y",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_BRAND_USE" => "Y",
		"DETAIL_BRAND_PROP_CODE" => array(
			0 => "TIZERS",
			1 => "",
		),
		"T_CLIENTS" => "",
		"STRICT_SECTION_CHECK" => "N",
		"LIST_VIEW" => "slider",
		"LINKED_ELEMENST_PAGE_COUNT" => "20",
		"SHOW_DISCOUNT_PERCENT_NUMBER" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"STORES" => array(
			0 => "",
			1 => "",
		),
		"HIDE_NOT_AVAILABLE" => "N",
		"FILE_404" => "",
		"SHOW_FILTER_DATE" => "Y",
		"SHOW_ASK_BLOCK" => "N",
		"SHOW_BORDER_ELEMENT" => "Y",
		"USE_BG_IMAGE_ALTERNATE" => "Y",
		"BG_POSITION" => "center",
		"TYPE_IMG" => "lg",
		"SIZE_IN_ROW" => "4",
		"TITLE_SHOW_FON" => "N",
		"SIDE_LEFT_BLOCK" => "FROM_MODULE",
		"TYPE_LEFT_BLOCK" => "FROM_MODULE",
		"ALL_BLOCK_BG" => "Y",
		"TYPE_HEAD_BLOCK" => "FROM_MODULE",
		"SIDE_LEFT_BLOCK_DETAIL" => "RIGHT",
		"TYPE_LEFT_BLOCK_DETAIL" => "FROM_MODULE",
		"IBLOCK_LINK_NEWS_ID" => "23",
		"IBLOCK_LINK_SERVICES_ID" => "25",
		"IBLOCK_LINK_TIZERS_ID" => "13",
		"IBLOCK_LINK_REVIEWS_ID" => "22",
		"IBLOCK_LINK_STAFF_ID" => "19",
		"IBLOCK_LINK_VACANCY_ID" => "5",
		"IBLOCK_LINK_BLOG_ID" => "20",
		"IBLOCK_LINK_PROJECTS_ID" => "18",
		"IBLOCK_LINK_BRANDS_ID" => "33",
		"IBLOCK_LINK_LANDINGS_ID" => "",
		"BLOCK_SERVICES_NAME" => "Услуги",
		"BLOCK_NEWS_NAME" => "Новости",
		"BLOCK_TIZERS_NAME" => "",
		"BLOCK_REVIEWS_NAME" => "Отзывы",
		"BLOCK_STAFF_NAME" => "Сотрудники",
		"BLOCK_VACANCY_NAME" => "Вакансии",
		"BLOCK_PROJECTS_NAME" => "Проекты",
		"BLOCK_BRANDS_NAME" => "Бренды",
		"BLOCK_BLOG_NAME" => "Статьи",
		"BLOCK_LANDINGS_NAME" => "Коллекции",
		"STAFF_TYPE_DETAIL" => "list",
		"DETAIL_BLOCKS_ALL_ORDER" => "tizers,desc,char,docs,services,goods,reviews,news,vacancy,blog,form_order,projects,staff,brands,gallery,landings,partners,comments",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_BLOG_USE" => "N",
		"DETAIL_VK_USE" => "N",
		"DETAIL_FB_USE" => "N",
		"IBLOCK_LINK_PARTNERS_ID" => "",
		"BLOCK_PARTNERS_NAME" => "Партнеры",
		"DETAIL_LINKED_GOODS_SLIDER" => "Y",
		"SHOW_TOP_PROJECT_BLOCK" => "Y",
		"TOP_GALLERY_PROPERTY_CODE" => "PHOTOS",
		"ADDITIONAL_GALLERY_PROPERTY_CODE" => "GALLEY_BIG",
		"MAIN_GALLERY_PROPERTY_CODE" => "GALLEY_BIG",
		"DETAIL_BLOG_URL" => "catalog_comments",
		"COMMENTS_COUNT" => "5",
		"BLOG_TITLE" => "Комментарии",
		"DETAIL_BLOG_EMAIL_NOTIFY" => "N",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "#SECTION_CODE_PATH#/",
			"detail" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
		)
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>