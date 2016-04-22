<?php

namespace tests;

/**
 * Class AssetManager
 * @package tests
 */
class AssetManager extends \yii\web\AssetManager
{
    /**
     * @var array
     */
    private $_hashes = [];

    /**
     * @var int
     */
    private $_count = 0;

    /**
     * @param string $path
     * @return mixed
     */
    public function hash($path)
    {
        if (!isset($this->_hashes[$path])) {
            $this->_hashes[$path] = $this->_count++;
        }

        return $this->_hashes[$path];
    }
}
