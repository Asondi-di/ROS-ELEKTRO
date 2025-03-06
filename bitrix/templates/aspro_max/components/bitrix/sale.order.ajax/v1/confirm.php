<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var $APPLICATION CMain
 */

if ($arParams["SET_TITLE"] == "Y")
{
	$APPLICATION->SetTitle(Loc::getMessage("SOA_ORDER_COMPLETE"));
}
?>

<? if (!empty($arResult["ORDER"])): ?>
	<table class="sale_order_full_table">
		<tr>
			<td>
				<h3 class="order_success_title">Спасибо за ваш заказ!</h3>

				<i class="svg inline  svg-inline- colored" aria-hidden="true"><svg data-name="Group 252 copy" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50"><defs><style>.cls-1,.cls-2{fill:#1d7ce6;}.cls-1{fill-rule:evenodd;}.cls-2{opacity:0.1;}</style></defs><path data-name="Rounded Rectangle 1004 copy 2" class="cls-1" d="M685,369a25,25,0,1,1,25-25A25,25,0,0,1,685,369Zm0-48a23,23,0,1,0,23,23A23,23,0,0,0,685,321Zm-2.18,29.553a1.032,1.032,0,0,1-1.55.135,0.881,0.881,0,0,1-.09-0.135l-5.869-5.857a1,1,0,0,1,1.414-1.416L682,348.543l11.275-11.263a1,1,0,0,1,1.414,1.416Z" transform="translate(-660 -319)"></path><circle class="cls-2" cx="25" cy="25" r="19"></circle></svg>
                </i>
                
				<?
				/*
				echo Loc::getMessage("SOA_ORDER_SUC", array(
					"#ORDER_DATE#" => $arResult["ORDER"]["DATE_INSERT"]->toUserTime()->format('d.m.Y H:i'),
					"#ORDER_ID#" => $arResult["ORDER"]["ACCOUNT_NUMBER"]
				))
				*/
				$intOrderID = $arResult["ORDER"]["ACCOUNT_NUMBER"];
				$strOrderDate = $arResult["ORDER"]["DATE_INSERT"]->toUserTime()->format('d.m.Y');
				?>

				<p class="order_success_text">
					Заказ <b>№<?= $intOrderID ?> от <?= $strOrderDate; ?></b> оформлен,<br>
                    в ближайшее время мы свяжемся с вами для уточнения деталей доставки.<br>
                    Вы можете <a class="contact_link" target="_blank" href="/contacts/">позвонить</a> нам или дождаться звонка менеджера.<br>
                    Назовите номер заказа и вас сориентируют по срокам отгрузки.<br>
				</p>

                <h4 class="contacts_title">Наши контакты</h4>
				<p class="contacts_b">
					Екатеринбург: +7(343) 217-03-99<br>
				    Тюмень: +7(3452) 39-33-30<br>
				    Челябинск: +7(351) 211-27-07<br>
				    Москва: +7(495) 225-22-77
				</p>


				<? if (!empty($arResult['ORDER']["PAYMENT_ID"]) && false): ?>
					<?=Loc::getMessage("SOA_PAYMENT_SUC", array(
						"#PAYMENT_ID#" => $arResult['PAYMENT'][$arResult['ORDER']["PAYMENT_ID"]]['ACCOUNT_NUMBER']
					))?>
				<? endif ?>
				<? if ($arParams['NO_PERSONAL'] !== 'Y' && false): ?>
					<br /><br />
					<?=Loc::getMessage('SOA_ORDER_SUC1', ['#LINK#' => $arParams['PATH_TO_PERSONAL']])?>
				<? endif; ?>
			</td>
		</tr>
	</table>

	<?
	if ($arResult["ORDER"]["IS_ALLOW_PAY"] === 'Y')
	{
		if (!empty($arResult["PAYMENT"]))
		{
			foreach ($arResult["PAYMENT"] as $payment)
			{
				if ($payment["PAID"] != 'Y')
				{
					if (!empty($arResult['PAY_SYSTEM_LIST'])
						&& array_key_exists($payment["PAY_SYSTEM_ID"], $arResult['PAY_SYSTEM_LIST'])
					)
					{
						$arPaySystem = $arResult['PAY_SYSTEM_LIST_BY_PAYMENT_ID'][$payment["ID"]];

						if (empty($arPaySystem["ERROR"]))
						{
							?>
							<br /><br />

							<table class="sale_order_full_table">
								<tr>
									<td class="ps_logo">
										<div class="pay_name"><?=Loc::getMessage("SOA_PAY") ?></div>
										<?=CFile::ShowImage($arPaySystem["LOGOTIP"], 100, 100, "border=0\" style=\"width:100px\"", "", false) ?>
										<div class="paysystem_name"><?=$arPaySystem["NAME"] ?></div>
										<br/>
									</td>
								</tr>
								<tr>
									<td>
										<? if (strlen($arPaySystem["ACTION_FILE"]) > 0 && $arPaySystem["NEW_WINDOW"] == "Y" && $arPaySystem["IS_CASH"] != "Y"): ?>
											<?
											$orderAccountNumber = urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"]));
											$paymentAccountNumber = $payment["ACCOUNT_NUMBER"];
											?>
											<script>
												window.open('<?=$arParams["PATH_TO_PAYMENT"]?>?ORDER_ID=<?=$orderAccountNumber?>&PAYMENT_ID=<?=$paymentAccountNumber?>');
											</script>
										<?=Loc::getMessage("SOA_PAY_LINK", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&PAYMENT_ID=".$paymentAccountNumber))?>
										<? if (CSalePdf::isPdfAvailable() && $arPaySystem['IS_AFFORD_PDF']): ?>
										<br/>
											<?=Loc::getMessage("SOA_PAY_PDF", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&pdf=1&DOWNLOAD=Y"))?>
										<? endif ?>
										<? else: ?>
											<?=$arPaySystem["BUFFERED_OUTPUT"]?>
										<? endif ?>
									</td>
								</tr>
							</table>

							<?
						}
						else
						{
							?>
							<span style="color:red;"><?=Loc::getMessage("SOA_ORDER_PS_ERROR")?></span>
							<?
						}
					}
					else
					{
						?>
						<span style="color:red;"><?=Loc::getMessage("SOA_ORDER_PS_ERROR")?></span>
						<?
					}
				}
			}
		}
	}
	else
	{
		?>
		<br /><strong><?=$arParams['MESS_PAY_SYSTEM_PAYABLE_ERROR']?></strong>
		<?
	}
	?>

<? else: ?>

	<b><?=Loc::getMessage("SOA_ERROR_ORDER")?></b>
	<br /><br />

	<table class="sale_order_full_table">
		<tr>
			<td>
				<?=Loc::getMessage("SOA_ERROR_ORDER_LOST", ["#ORDER_ID#" => htmlspecialcharsbx($arResult["ACCOUNT_NUMBER"])])?>
				<?=Loc::getMessage("SOA_ERROR_ORDER_LOST1")?>
			</td>
		</tr>
	</table>

<? endif ?>