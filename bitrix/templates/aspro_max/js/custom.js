/*
You can use this file with your scripts.
It will not be overwritten when you upgrade solution.
*/

//window.onerror = function (msg, url, line, col, exception) { BX.ajax.get('/ajax/error_log_logic.php', { data: { msg: msg, exception: exception, url: url, line: line, col: col } }); }
$(document).ready(function() {
    // Функция для копирования текста в буфер обмена
    function copyToClipboard(text, element) {
        navigator.clipboard.writeText(text).then(function() {
            showCopiedMessage(element);
        }).catch(function(err) {
            console.error('Ошибка при копировании: ', err);
        });
    }

    // Показать сообщение "Скопировано"
    function showCopiedMessage(element) {
        var $message = $('<span class="copied-message">Скопировано в буфер обмена</span>');

        // Удаляем предыдущее сообщение, если оно уже было
        $(element).find('.copied-message').remove();

        $(element).append($message);
        $message.fadeIn();

        // Убираем сообщение через 2 секунды
        setTimeout(function() {
            $message.fadeOut(function() {
                $(this).remove();
            });
        }, 2000);
    }

    // Обработчик для первого блока с классом article_block
    $('.article_block').on('click', function() {
        var article = $(this).data('value');
        copyToClipboard(article, this);
    });

    // Обработчик для второго блока с классом article
    $('.article').on('click', function() {
        var article = $(this).find('.article__value').text().trim();
        copyToClipboard(article, this);
    });
});
$(document).ready(function(){
	$(document).on('click', '.mobile_regions .city_item', function(e){
		e.preventDefault();
		var _this = $(this);
		$.removeCookie('current_region');
		$.cookie('current_region', _this.data('id'), {path: '/',domain: 'next.aspro-partner.ru'});
	});

	$(document).on('click', '.region_wrapper .more_item:not(.current) span', function(e){
		$.removeCookie('current_region');
		$.cookie('current_region', $(this).data('region_id'), {path: '/',domain: 'next.aspro-partner.ru'});
	});

	$(document).on('click', '.confirm_region .aprove', function(e){
		var _this = $(this);
		$.removeCookie('current_region');
		$.cookie('current_region', _this.data('id'), {path: '/',domain: 'next.aspro-partner.ru'});
	});

	$(document).on('click', '.cities .item a', function(e){
    	e.preventDefault();
    	var _this = $(this);
    	$.removeCookie('current_region');
		$.cookie('current_region', _this.data('id'), {path: '/',domain: 'next.aspro-partner.ru'});
    });

    $(document).on('click', '.popup_regions .ui-menu a', function(e){
    	e.preventDefault();
    	var _this = $(this);
    	var href = _this.attr('href')
    	if(typeof arRegions !== 'undefined' && arRegions.length){
	    	$.removeCookie('current_region');
	    	for(i in arRegions){
	    		var region = arRegions[i];
	    		if(region.HREF == href){
					$.cookie('current_region', region.ID, {path: '/',domain: 'next.aspro-partner.ru'});
	    		}
	    	}
    	}
		window.location.reload()
		//location.href = href;
    });


	// $('.header__top-wrap').width($('.header__top-item .search_wrap').width());

});

// Сохраняем текущий URL
let currentUrl = window.location.href;

// Функция для проверки изменений URL
function checkUrlChange() {
	if (window.location.href !== currentUrl) {
		console.log(`Адрес изменён: ${window.location.href}`);

		// Проверяем, содержит ли новый URL подстроку "/apply/"
		if (window.location.href.includes('/apply/')) {
			console.log(`В адресе появился /apply/`);

			// Прокручиваем страницу к элементу с классом "main-catalog-wrapper"
			const targetElement = document.querySelector('.main-catalog-wrapper');
			if (targetElement) {
				const targetOffset = targetElement.getBoundingClientRect().top + window.scrollY - 100; // 100px от верхней части окна
				window.scrollTo({
					top: targetOffset,
					behavior: 'smooth' // Плавная прокрутка
				});
			}
		}

		currentUrl = window.location.href; // Обновляем текущий URL
	}
}

// Устанавливаем интервал проверки каждые 1000 мс (1 секунда)
setInterval(checkUrlChange, 1000);
