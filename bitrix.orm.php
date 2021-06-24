<?
    // ############################################################################################
    // Добавить в ORM автоматическую сериализацию и десериализацию
    use \Bitrix\Main\ORM\Fields\TextField;
    new TextField(
        'params',
        [
            'title' => Loc::getMessage('TEXT_FIELD'),
            'save_data_modification' => function () {
                return array(
                    function ($value) {
                        return serialize($value);
                    }
                );
            },
            'fetch_data_modification' => function () {
                return array(
                    function ($value) {
                        return unserialize($value);
                    }
                );
            }
        ]
    ),

	// ############################################################################################
    // getList select объединение строк и подсчет
    new \Bitrix\Main\Entity\ExpressionField('CNT', 'COUNT(%s)', ["id"]),
	new \Bitrix\Main\Entity\ExpressionField('ids', 'GROUP_CONCAT(%s)', ["id"]),

	// ############################################################################################
	// Подключение референса к таблице
	new \Bitrix\Main\Entity\ReferenceField(
	    'city',
	    'Skyweb24\Ozd\Entity\CityTable',
	    ['=this.id_city' => 'ref.id'],
	    ['join_type' => 'LEFT']
	)