<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Обзоры");
$APPLICATION->SetTitle("Обзоры");
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"landings", 
	array(
		"ADD_ELEMENT_CHAIN" => "Y",
		"IBLOCK_CATALOG_ID" => "38",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "100000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "landings",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"COUNT_IN_LINE" => "3",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "DETAIL_TEXT",
			4 => "DETAIL_PICTURE",
			5 => "",
		),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "LINK_BRANDS",
			1 => "LINK_VACANCY",
			2 => "LINK_LANDINGS",
			3 => "LINK_NEWS",
			4 => "LINK_REVIEWS",
			5 => "LINK_PARTNERS",
			6 => "LINK_PROJECTS",
			7 => "LINK_STAFF",
			8 => "LINK_BLOG",
			9 => "LINK_TIZERS",
			10 => "LINK_SERVICES",
			11 => "SITE",
			12 => "PHONE",
			13 => "DOCUMENTS",
			14 => "PHOTOS",
			15 => "SIDE_IMAGE",
			16 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_NAME" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "21",
		"IBLOCK_TYPE" => "aspro_max_content",
		"IMAGE_POSITION" => "left",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "SITE",
			2 => "PHONE",
			3 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "300",
		"SEF_FOLDER" => "/landings/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "Y",
		"SHOW_DETAIL_LINK" => "Y",
		"SHOW_SECTION_PREVIEW_DESCRIPTION" => "Y",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "Y",
		"USE_SEARCH" => "N",
		"VIEW_TYPE" => "table",
		"STRICT_SECTION_CHECK" => "N",
		"T_REVIEWS" => "",
		"T_DOCS" => "",
		"T_PROJECTS" => "",
		"LINKED_PRODUCTS_PROPERTY" => "BRAND",
		"SHOW_LINKED_PRODUCTS" => "Y",
		"PRICE_CODE" => array(
			0 => "",
			1 => "BASE",
			2 => "OPT",
			3 => "",
		),
		"STORES" => array(
			0 => "",
			1 => "1",
			2 => "",
		),
		"T_GOODS" => "",
		"T_GALLERY" => "Галерея",
		"SHOW_GALLERY" => "Y",
		"GALLERY_PRODUCTS_PROPERTY" => "PHOTOS",
		"SECTION_ELEMENTS_TYPE_VIEW" => "FROM_MODULE",
		"ELEMENT_TYPE_VIEW" => "element_1",
		"T_GOODS_SECTION" => "",
		"LIST_VIEW" => "slider",
		"LINKED_ELEMENST_PAGE_COUNT" => "20",
		"SHOW_MEASURE" => "N",
		"DEFAULT_LIST_TEMPLATE" => "block",
		"SHOW_UNABLE_SKU_PROPS" => "Y",
		"SHOW_ARTICLE_SKU" => "N",
		"SHOW_MEASURE_WITH_RATIO" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_DISCOUNT_PERCENT_NUMBER" => "N",
		"ALT_TITLE_GET" => "NORMAL",
		"SHOW_DISCOUNT_TIME" => "Y",
		"SHOW_DISCOUNT_TIME_EACH_SKU" => "N",
		"SHOW_RATING" => "Y",
		"DISPLAY_COMPARE" => "Y",
		"DISPLAY_WISH_BUTTONS" => "Y",
		"SHOW_OLD_PRICE" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"LIST_PROPERTY_CATALOG_CODE" => array(
			0 => "",
			1 => "",
		),
		"SORT_BUTTONS" => array(
			0 => "POPULARITY",
			1 => "NAME",
			2 => "PRICE",
		),
		"SORT_PRICES" => "REGION_PRICE",
		"SORT_REGION_PRICE" => "Субдилер IN HOUM (-23%)",
		"IBLOCK_CATALOG_TYPE" => "catalog_1c",
		"SALE_STIKER" => "-",
		"STIKERS_PROP" => "-",
		"OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
		"OFFER_TREE_PROPS" => array(
			0 => "SIZES",
			1 => "COLOR_REF",
			2 => "SIZES3",
			3 => "SIZES4",
			4 => "SIZES5",
		),
		"OFFER_HIDE_NAME_PROPS" => "N",
		"LIST_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "SIZES",
			1 => "COLOR_REF",
			2 => "SIZES3",
			3 => "SIZES4",
			4 => "SIZES5",
			5 => "",
		),
		"LIST_OFFERS_LIMIT" => "5",
		"OFFERS_CART_PROPERTIES" => "",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"DEPTH_LEVEL_BRAND" => "2",
		"USE_PRICE_COUNT" => "N",
		"CONVERT_CURRENCY" => "N",
		"HIDE_NOT_AVAILABLE" => "N",
		"FILE_404" => "",
		"USE_SHARE" => "Y",
		"NUM_NEWS" => "20",
		"NUM_DAYS" => "30",
		"YANDEX" => "N",
		"SIDE_LEFT_BLOCK" => "FROM_MODULE",
		"TYPE_LEFT_BLOCK" => "FROM_MODULE",
		"SIDE_LEFT_BLOCK_DETAIL" => "FROM_MODULE",
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
		"IBLOCK_LINK_LANDINGS_ID" => "20",
		"BLOCK_SERVICES_NAME" => "Услуги",
		"BLOCK_NEWS_NAME" => "Новости",
		"BLOCK_TIZERS_NAME" => "",
		"BLOCK_REVIEWS_NAME" => "Отзывы",
		"BLOCK_STAFF_NAME" => "Сотрудники",
		"BLOCK_VACANCY_NAME" => "Вакансии",
		"BLOCK_PROJECTS_NAME" => "Проекты",
		"BLOCK_BRANDS_NAME" => "Бренды",
		"BLOCK_BLOG_NAME" => "Статьи",
		"BLOCK_LANDINGS_NAME" => "Категории производителя",
		"IBLOCK_LINK_PARTNERS_ID" => "26",
		"BLOCK_PARTNERS_NAME" => "Партнеры",
		"GALLERY_TYPE" => "small",
		"STAFF_TYPE_DETAIL" => "list",
		"DETAIL_LINKED_GOODS_SLIDER" => "Y",
		"DETAIL_BLOCKS_ALL_ORDER" => "tizers,preview_text,char,docs,services,news,vacancy,blog,projects,brands,staff,gallery,partners,form_order,landings,reviews,goods_sections,goods,goods_catalog,desc,comments",
		"DETAIL_USE_COMMENTS" => "Y",
		"DETAIL_BLOG_USE" => "Y",
		"DETAIL_VK_USE" => "N",
		"DETAIL_FB_USE" => "N",
		"DETAIL_BLOG_URL" => "catalog_comments",
		"COMMENTS_COUNT" => "5",
		"BLOG_TITLE" => "Комментарии",
		"DETAIL_BLOG_EMAIL_NOTIFY" => "N",
		"SHOW_ICONS_SECTION" => "N",
		"SHOW_COUNT_ELEMENTS" => "Y",
		"AJAX_FILTER_CATALOG" => "Y",
		"SHOW_GALLERY_GOODS" => "Y",
		"MAX_GALLERY_GOODS_ITEMS" => "5",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"ADD_DETAIL_TO_SLIDER" => "Y",
		"SIZE_IN_ROW" => "4",
		"BG_POSITION" => "top left",
		"ONLY_ELEMENT_DISPLAY_VARIANT" => "N",
		"USE_SUBSCRIBE_IN_TOP" => "N",
		"SHOW_ONE_CLICK_BUY" => "Y",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"PRICE_VAT_INCLUDE" => "Y",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
			"rss" => "rss/",
			"rss_section" => "#SECTION_ID#/rss/",
		)
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>