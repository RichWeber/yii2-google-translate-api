<?php
/**
 * @copyright Copyright &copy; Roman Bahatyi, richweber.net, 2015
 * @package yii2-google-translate-api
 * @version 1.0.0
 */

namespace richweber\google\translate;

use yii\helpers\Json;
use yii\helpers\Html;

/**
 * Yii2 extension for Google Translate API
 *
 * @link https://cloud.google.com/translate/v2/using_rest
 * @author Roman Bahatyi <rbagatyi@gmail.com>
 * @since 1.0
 */
class Translation
{
    /**
     * API key
     * @var string
     */
    public $key;

    /**
     * API URL
     */
    const API_URL = 'https://www.googleapis.com/language/translate/v2';

    /**
     * You can translate text from one language
     * to another language
     * @param string $source Source language
     * @param string $target Target language
     * @param string $text   Source text string
     * @return array
     */
    public function translate($source, $target, $text)
    {
        return $this->getResponse($this->getRequest('', $text, $source, $target));
    }

    /**
     * You can discover the supported languages of this API
     * @return array Array supported languages
     */
    public function discover()
    {
        return $this->getResponse($this->getRequest('languages'));
    }

    /**
     * You can detect the language of a text string
     * @param  string $text Source text string
     * @return array        Data properties
     */
    public function detect($text)
    {
        return $this->getResponse($this->getRequest('detect', $text));
    }

    /**
     * Forming query parameters
     * @param  string $method API method
     * @param  string $text   Source text string
     * @param  string $source Source language
     * @param  string $target Target language
     * @return array          Data properties
     */
    protected function getRequest($method, $text = '', $source = '', $target = '')
    {
        $request = self::API_URL . '/' . $method . '?' . http_build_query(
            [
                'key' => $this->key,
                'source' => $source,
                'target' => $target,
                'q' => Html::encode($text),
            ]
        );

        return $request;
    }

    /**
     * Getting response
     * @param string $request
     * @return array
     */
    protected function getResponse($request)
    {
        $response = file_get_contents($request);
        return Json::decode($response, true);
    }
}
