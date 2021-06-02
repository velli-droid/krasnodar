<?php
/**
 * @author Pavel Nikitin <pavelykt86@gmail.com>
 * @company Itex <www.itexweb.ru>
 * Date: 05.05.2016
 * Time: 12:39
 *
 * @var CMain $APPLICATION
 * @var array $arResult
 * @var array $arParams
 * @var CBitrixComponentTemplate $this
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

// echo '<pre style="background: #fff; border: 2px solid #ccc; text-align: left; padding: 10px 20px;">';
// print_r($arResult);
// echo '</pre>';

$prevLevel = 1;
?>

<?php /*?>
<?php if (!empty($arResult)) : ?>
  <ul class="h-catalog-menu">
    <?php foreach ($arResult as $key => $arItem) : ?>
      <?php if ($prevLevel > $arItem['DEPTH_LEVEL']) : ?>
        </ul>
				</div>
				</div>
				</div>
				</li>
			<?php else : ?>
        <?/* </li>*  /?>
      <?php endif ?>
      <?php if ($arItem['DEPTH_LEVEL'] == 1) :?>
        <li<?= $arItem['SELECTED'] ? ' class="on"' : '' ?>>
          <a href="<?= $arItem['LINK'] ?>"><?= $arItem['TEXT'] ?> <?php if (!empty($arItem['DOP_TEXT'])) : ?><span class="dop-name"><?= $arItem['DOP_TEXT'] ?></span><?php endif ?></a>
            <?php if ($arItem['IS_PARENT']) : ?>
              <div class="menuIn">
                <div class="container_full">
                  <div class="row">
										<!--right-block begin-->
                                        <?php if (isset($arResult['BANNER_PRODUCT']) && is_array($arResult['BANNER_PRODUCT']) && count($arResult['BANNER_PRODUCT'])): ?>
                                            <div class="h-catalog-menu-right-block">
                                                <div class="right_block_img">
                                                    <img src="<?=$arResult['BANNER_PRODUCT']['PICTURE']['src']?>" />
                                                </div>
                                                <p>Наш выбор: <a href="<?=$arResult['BANNER_PRODUCT']['DETAIL_PAGE_URL']?>"><?=$arResult['BANNER_PRODUCT']['NAME']?></a></p>
                                            </div>
                                        <?php endif; ?>
										<!--right-block end-->
                    <ul<?if($arItem["COUNT_ITEMS"] < 4){?> style="text-align: center;"<?}elseif($arItem["COUNT_ITEMS"] > 3){?> class="subs"<?}?>>
											<?php else: ?></li>
											<?php endif ?>
											<?php else :?>
											<?php
												if($arItem['DEPTH_LEVEL'] == 2 && $arResult[$key - 1]['DEPTH_LEVEL'] == 1):
											?>
											<li class="h-catalog-menu-section-link">
												<a href="<?= $arResult[$key - 1]['LINK'] ?>"><?= 'Все '.strtolower($arResult[$key - 1]['TEXT']) ?></a>
											</li>
											<?php endif;?>
											<li<?= $arItem['SELECTED'] ? ' class="on"' : '' ?>>
												<a href="<?= $arItem['LINK'] ?>"><?= $arItem['TEXT'] ?><span></span></a>
											</li>
											<?php  endif ?>
											<?php $prevLevel = $arItem['DEPTH_LEVEL']; ?>
											
											<?php endforeach; ?>
											
                      <?if ($prevLevel > 1)://close last item tags?>
												
												
                        <?=str_repeat("</ul></div></div></div></li>", ($prevLevel-1) );?>
												
                      <?endif?>
					</ul>
				<?php endif ?>
<?php */?>