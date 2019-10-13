<?php
namespace kilyakus\widget\flag;

class FlagSvgAsset extends \kilyakus\widgets\AssetBundle
{
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets/svg');
        parent::init();
    }
}
