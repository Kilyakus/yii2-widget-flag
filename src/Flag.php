<?php
namespace kilyakus\widget\flag;

use Yii;
use yii\helpers\Html;
use yii\helpers\Inflector;

/*
	For example:
	
	echo Flag::widget([
		'type' => Widget\Flag::TYPE_SVG,
		'flag' => Widget\Flag::FLAG_RU,
		'options' => [],
	])
*/
class Flag extends \yii\base\Widget
{
	public $pluginName = 'flag';
	public $pluginSupport = false;

	const TYPE_SVG = 'svg';
	// const TYPE_PNG = 'png';

	const FLAG_RU = 'ru';
	const FLAG_EN = 'en';
	const FLAG_FR = 'fr';

	public $type = self::TYPE_SVG;

	public $flag = self::FLAG_RU;

	public $options = [];

	protected static $_formatTypes = [
		self::TYPE_SVG,
	];

	protected static $_flags = [
		self::FLAG_RU,
		self::FLAG_EN,
		self::FLAG_FR,
	];

	public function init()
	{
		if($this->pluginSupport === true){

          $this->_supportInfo();
          
        }
	}

	public function run()
	{
		$assetLink = $this->registerAssetBundle();

		$assetLink .= $this->flag . '.' . $this->type;

		echo Html::img($assetLink, $this->options);
	}

	public function registerAssetBundle()
	{
		$view = $this->getView();

		if (in_array($this->type, self::$_formatTypes)) {
			$bundleClass = __NAMESPACE__ . '\Flag' . Inflector::id2camel($this->type) . 'Asset';
			$assetLink = $bundleClass::register($view)->baseUrl;
		}

		$this->registerPlugin($this->pluginName);

		return $assetLink;
	}

	private function _supportInfo()
    {
        echo "<pre>
	For example:

	echo Flag::widget([
		'type' => Widget\Flag::TYPE_SVG,
		'flag' => Widget\Flag::FLAG_RU,
		'options' => [],
	])
          </pre>";
    }
}
