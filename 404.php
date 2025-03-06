<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Страница не найдена");
if (strpos($APPLICATION->GetCurDir(), 'catalog') !== false) {
    LocalRedirect("/", false, "301 Moved Permanently");
}
?>
<style>.right_block.wide_, .right_block.wide_N{float:none !important;width:100% !important;}.top-block-wrapper{display: none;}</style>
<div class="maxwidth-theme">
	<div class="page_error_block">
		<div class="page_not_found" width="100%" border="0" cellpadding="0" cellspacing="0">
			<div class="image">
				<img src="/images/404error.png">
			</div>
			<div class="description">
				<div class="subtitle404">Страница не найдена</div>
				<div class="descr_text404">Возможно, она была удалена или в запросе указан неверный адрес.<br> Попробуйте воспользоваться <span style="color:#2F2482;font-weight: 500;">поиском</span>, чтобы найти нужный товар</div>
				<a class="btn btn-transparent-border-color btn-mainpage" href="/">На главную</a>
				<a class="btn btn-default btn-mainpage" href="/catalog/"><span>В каталог</span></a>
			</div>
		</div>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>