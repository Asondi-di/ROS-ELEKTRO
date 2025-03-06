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

let hasScrolled = false; // Флаг, указывающий, была ли выполнена прокрутка
let intervalId; // Переменная для хранения идентификатора интервала

// Функция для проверки URL и прокрутки
function checkUrlAndScroll() {
	console.log("Запуск проверки URL..."); // Лог начала проверки
	console.log("Текущий URL:", window.location.pathname); // Лог текущего URL

	if (hasScrolled) {
		console.log("Прокрутка уже выполнена, пропускаем дальнейшую проверку."); // Лог, если прокрутка уже была
		return; // Если прокрутка уже выполнена, выходим из функции
	}

	if (window.location.pathname.includes('/apply/')) {
		console.log("URL содержит '/apply/', выполняем прокрутку."); // Лог, если URL соответствует
		window.scrollTo({
			top: 100,
			behavior: 'smooth' // Анимация прокрутки
		});
		hasScrolled = true; // Устанавливаем флаг, чтобы избежать повторной прокрутки
		console.log("Прокрутка выполнена на 100 пикселей."); // Лог успешной прокрутки
		stopChecking(); // Останавливаем дальнейшие проверки
	} else {
		console.log("URL не содержит '/apply/', продолжаем проверку..."); // Лог, если URL не соответствует
	}
}

// Запускаем функцию при загрузке страницы
window.onload = function() {
	console.log("Страница загружена, запускаем начальную проверку..."); // Лог загрузки страницы
	checkUrlAndScroll();
	startChecking(); // Запускаем проверку при загрузке
};

// Функция для запуска интервала проверки
function startChecking() {
	console.log("Запуск интервала проверки URL..."); // Лог запуска интервала
	intervalId = setInterval(checkUrlAndScroll, 500);
}

// Остановка интервала
function stopChecking() {
	console.log("Остановка интервала проверки URL."); // Лог остановки интервала
	clearInterval(intervalId);
}

// Отслеживание изменений в URL
window.addEventListener('popstate', function() {
	console.log("Изменение URL обнаружено."); // Лог изменения URL
	hasScrolled = false; // Сбрасываем флаг при изменении URL
	checkUrlAndScroll(); // Проверяем новый URL
});

// Проверка URL каждые 500 мс
startChecking();