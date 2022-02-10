<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Translate;

class Translation extends \Google\Model
{
  /**
   * @var string
   */
  public $detectedLanguageCode;
  protected $glossaryConfigType = TranslateTextGlossaryConfig::class;
  protected $glossaryConfigDataType = '';
  /**
   * @var string
   */
  public $model;
  /**
   * @var string
   */
  public $translatedText;

  /**
   * @param string
   */
  public function setDetectedLanguageCode($detectedLanguageCode)
  {
    $this->detectedLanguageCode = $detectedLanguageCode;
  }
  /**
   * @return string
   */
  public function getDetectedLanguageCode()
  {
    return $this->detectedLanguageCode;
  }
  /**
   * @param TranslateTextGlossaryConfig
   */
  public function setGlossaryConfig(TranslateTextGlossaryConfig $glossaryConfig)
  {
    $this->glossaryConfig = $glossaryConfig;
  }
  /**
   * @return TranslateTextGlossaryConfig
   */
  public function getGlossaryConfig()
  {
    return $this->glossaryConfig;
  }
  /**
   * @param string
   */
  public function setModel($model)
  {
    $this->model = $model;
  }
  /**
   * @return string
   */
  public function getModel()
  {
    return $this->model;
  }
  /**
   * @param string
   */
  public function setTranslatedText($translatedText)
  {
    $this->translatedText = $translatedText;
  }
  /**
   * @return string
   */
  public function getTranslatedText()
  {
    return $this->translatedText;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Translation::class, 'Google_Service_Translate_Translation');
