<?
	// ############################################################################################
	// Поймать событие
	\Bitrix\Main\EventManager::getInstance()->addEventHandlerCompatible(
	    'название_модуля',
	    'название_события',
	    'обработчик'
	);


	// ############################################################################################
	// Записать данные в лог
	\Bitrix\Main\Diag\Debug::dumpToFile($arr,"Name log", "/bitrix/php_interface/log.txt"); 


	// ############################################################################################
	// JSON encode / decode
	\Bitrix\Main\Web\Json::encode();
	\Bitrix\Main\Web\Json::decode();


	// ############################################################################################
	// lazyload
	\Bitrix\Main\UI\Extension::load("ui.vue");
	\Bitrix\Main\UI\Extension::load("ui.vue.directives.lazyload");

		// *** html
		<img 
			v-bx-lazyload 
			data-lazyload-dont-hide 
			class="lazyload" 
			src="/img/loader.gif" 
			data-lazyload-src="/img/original.jpg">

		// *** JS
		(function () {
			let elements;
			elements = document.querySelectorAll(".lazyloadimg");

			if(elements.length)
				for(let i = 0; i < elements.length; i++)
					BX.Vue.create({ el: elements[i] });
		})();


	// ############################################################################################
	// Resize img
	\CFile::ResizeImageGet(
		$ID,['width' => 250,'height' => 150],
	 	BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
	 	true
	);


	// ############################################################################################
	// Подключение JQ из ядра 
    \CJSCore::Init(array("jquery"));


	// ############################################################################################
    // Подключение скриптов в шаблоне
    use Bitrix\Main\Page\Asset;
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/fix.js");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/styles/fix.css");
	Asset::getInstance()->addString("<link>"); 

	$this->addExternalCss("/local/styles.css");
	$this->addExternalJS("/local/liba.js");


	// ############################################################################################
	// Отправка письмо на почту
	\Bitrix\Main\Mail\Event::send(array(
	    "EVENT_NAME" => "NEW_USER",
	    "LID" => "s1",
	    "C_FIELDS" => array(
	        "EMAIL" => "info@intervolga.ru",
	        "USER_ID" => 42
	    ),
	)); 


	// ############################################################################################
	// Получить элемент инфоблока
	\CIBlockElement::GetByID($ID);


	// ############################################################################################
	// Получить службу доставки (подключить модуль sale)
	\Bitrix\Sale\Delivery\Services\Manager::getById(2);
	// Получить все активные службы доставки (подключить модуль sale)
	\Bitrix\Sale\Delivery\Services\Manager::getActiveList(); 


	// ############################################################################################
	// Сохранение кода и его получение 
	// *** Генерация кода
	$code = 1234;
	$user->update($USER_ID, ["CHECKWORD" => $code]);
	// *** Проверка кода
	$checkword = $user->GetByID($USER_ID)->fetch()['CHECKWORD'];
	\Bitrix\Main\Security\Password::equals($checkword, $code);


	// ############################################################################################
	// Ручное кеширование результата 
	$cacheTime = 3600;
	$cacheId = 'myUniqueCacheId';
	$cachePath = '/my/cache/path';
	$obCache = new CPHPCache();

	if ($obCache->InitCache($cacheTime, $cacheId, $cachePath))
	{
	  $arResult = $obCache->GetVars();
	  $obCache->Output();
	}
	else
	{
	    $obCache->StartDataCache();
	    // *** Делаем выборку из базы, например
	    // *** после чего сохраняем результат выборки в кеш
	    $obCache->EndDataCache($arResult);
	}


	// ############################################################################################
	// Подключение модуля
	\CModule::IncludeModule("sale");


	// ############################################################################################
	// Запрос BX AJAX
	BX.ajax.post(
		BX.message('SITE_TEMPLATE_PATH') + "/ajax.php",
		data,
		function(result){}
	);

	BX.ajax({
	    url: "/",
	    method: "POST",
	    data: {},
	    dataType: "html",
	    async: true,
	    onsuccess: function (response) {}
	});

	// ############################################################################################
	// BX куки
	\Bitrix\Main\HttpRequest::getCookie("NAME");

	// ###########################################################################################
	// Обрезать текст
	TruncateText("test", 10);

	// ###########################################################################################
	// Получить request d7
	\Bitrix\Main\Context::getCurrent()->getRequest();


	// ###########################################################################################
	// Всплывающее окно
	new BX.PopupWindow("POPUP_ID", /*POSITION*/null, {
		content: "---",
		bindOnResize: false,
		zIndex: 0,
		offsetTop: 1,
		offsetLeft: 0,
		className: 'class242424',
		lightShadow: true,
		closeIcon: "",
		closeByEsc: true,
		params: {},
		overlay: {
		    backgroundColor: "fff",
		    opacity: 1
		},
		events: {
		    onAfterPopupShow: function (e) {},
		    onPopupDestroy: function (e) {},
		    onPopupShow: function (e) {}
		}
	});

	// ###########################################################################################
	// Отформатировать цену
	\CCurrencyLang::CurrencyFormat(50, "RUB");

	// ###########################################################################################
	// ** В данной константе содержится значение кодировки, указанной в секции Параметры формы настроек текущего сайта.
	LANG_CHARSET
	// ** URL от корня сайта до папки текущего шаблона.
	SITE_TEMPLATE_PATH


	// Получение сткутурных элементов Bitrix
	CIBlockElement::GetList($order,$filter,$group, $params, $select);
	CIBlockSection::GetList($order, $filter, $cnt, $select, $params);


	// ###########################################################################################
	// Работа с iblock D7
	\Bitrix\Iblock\TypeTable::getList(); // типы инфоблоков
	\Bitrix\Iblock\IblockTable::getList(); // инфоблоки
	\Bitrix\Iblock\PropertyTable::getList(); // свойства инфоблоков
	\Bitrix\Iblock\PropertyEnumerationTable::getList(); // значения свойств, например списков
	\Bitrix\Iblock\SectionTable::getList(); // Разделы инфоблоков
	\Bitrix\Iblock\ElementTable::getList(); // Элементы инфоблоков 
	\Bitrix\Iblock\InheritedPropertyTable::getList(); // Наследуемые свойства (seo шаблоны)
	
		// Методы 
		add(array $data) // добавление элемента
		addMulti($rows, $ignoreEvents = false)
		checkFields(Result $result, $primary, array $data) // метод проверяет поля данных перед записью в БД.
		delete($primary) // удаление элемента по ID
		getById($id) // получение элемента по ID
		getByPrimary($primary, array $parameters = array()) // метод возвращает выборку по первичному ключу сущности и по опциональным параметрам \Bitrix\Main\Entity\DataManager::getList.
		getConnectionName() // метод возвращает имя соединения для сущности. 12.0.9
		getCount($filter = array(), array $cache = array()) // метод выполняет COUNT запрос к сущности и возвращает результат. 12.0.10
		getEntity() // метод возвращает объект сущности.
		getList(array $parameters = array()) // получение элементов, подробнее было выше
		getMap() // метод возвращает описание карты сущностей. 12.0.7
		getRow(array $parameters) // метод возвращает один столбец (или null) по параметрам для \Bitrix\Main\Entity\DataManager::getList.
		getRowById($id) // метод возвращает один столбец (или null) по первичному ключу сущности. 14.0.0
		getTableName() // метод возвращает имя таблицы БД для сущности. 12.0.7
		query() // метод создаёт и возвращает объект запроса для сущности.
		update($primary, array $data) // обновление элемента по ID
		updateMulti($primaries, $data, $ignoreEvents = false)
		enableCrypto($field, $table = null, $mode = true) // метод устанавливает флаг поддержки шифрования для поля. 17.5.14
		cryptoEnabled($field, $table = null) // метод возвращает true если шифрование разрешено для поля. 17.5.14

	// ###########################################################################################
	// spacename ланг
	use \Bitrix\Main\Localization\Loc;

	// ###########################################################################################
	// Кеширование
	use \Bitrix\Main\Data\Cache;
	$cache = Cache::createInstance(); // получаем экземпляр класса
	if ($cache->initCache(7200, "cache_key")) { // проверяем кеш и задаём настройки
	    $vars = $cache->getVars(); // достаем переменные из кеша
	}
	elseif ($cache->startDataCache()) {
	    // некоторые действия...
	    $cache->endDataCache(array("key" => "value")); // записываем в кеш
	}

	// ###########################################################################################
	// Пролог без шаблона
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');


	// ###########################################################################################
	// Работа с заказом
	// Получение заказа
	\Bitrix\Sale\Order::load($orderId);