						<?CMax::checkRestartBuffer();?>
						<?IncludeTemplateLangFile(__FILE__);?>
							<?if(!$isIndex):?>
								<?if($isHideLeftBlock && !$isWidePage):?>
									</div> <?// .maxwidth-theme?>
								<?endif;?>
								</div> <?// .container?>
							<?else:?>
								<?CMax::ShowPageType('indexblocks');?>
							<?endif;?>
							<?CMax::get_banners_position('CONTENT_BOTTOM');?>
						</div> <?// .middle?>
					<?//if(($isIndex && $isShowIndexLeftBlock) || (!$isIndex && !$isHideLeftBlock) && !$isBlog):?>
					<?if(($isIndex && ($isShowIndexLeftBlock || $bActiveTheme)) || (!$isIndex && !$isHideLeftBlock)):?>
						</div> <?// .right_block?>
						<?if($APPLICATION->GetProperty("HIDE_LEFT_BLOCK") != "Y" && !defined("ERROR_404")):?>
							<?CMax::ShowPageType('left_block');?>
						<?endif;?>
					<?endif;?>
					</div> <?// .container_inner?>
				<?if($isIndex):?>
					</div>
				<?elseif(!$isWidePage):?>
					</div> <?// .wrapper_inner?>
				<?endif;?>
			</div> <?// #content?>
			<?CMax::get_banners_position('FOOTER');?>
		</div><?// .wrapper?>
		<? if ($APPLICATION->GetCurPage() == "/"): ?>
			<review-lab data-widgetid="63bbe556471605630f63c98a"></review-lab>
			<script src="https://app.reviewlab.ru/widget/index-es2015.js" defer></script>
		<? endif ?>
		<footer id="footer">
			<?include_once(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'include/footer_include/under_footer.php'));?>
			<?include_once(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'include/footer_include/top_footer.php'));?>
		</footer>
		<?include_once(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'include/footer_include/bottom_footer.php'));?>



<script type="text/javascript"> var digiScript = document.createElement('script');
digiScript.src = '//cdn.diginetica.net/3419/client.js';
digiScript.defer = true;
digiScript.async = true;
document.body.appendChild(digiScript);

</script>
<script>


</script>
<script type="text/javascript">    
$(function() {
  // Проверяем запись в куках о посещении
  // Если запись есть - ничего не происходит
     if (!$.cookie('hideModal')) {
  // если cookie не установлено появится окно
  // с задержкой 
	var delay_popup = 1000;
	setTimeout(() => {
		   $('#header').find('.js_city_chooser').click();
  console.log('test');
}, 1000);
}
     $.cookie('hideModal', true, {
   // Время хранения cookie в днях
	expires: 7,
	path: '/'
   });
});
</script>






	</body>



</html>