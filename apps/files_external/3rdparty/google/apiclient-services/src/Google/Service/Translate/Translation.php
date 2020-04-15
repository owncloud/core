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

class Google_Service_Translate_Translation extends Google_Model
{
  public $detectedLanguageCode;
  protected $glossaryConfigType = 'Google_Service_Translate_TranslateTextGlossaryConfig';
  protected $glossaryConfigDataType = '';
  public $model;
  public $translatedText;

  public function setDetectedLanguageCode($detectedLanguageCode)
  {
    $this->detectedLanguageCode = $detectedLanguageCode;
  }
  public function getDetectedLanguageCode()
  {
    return $this->detectedLanguageCode;
  }
  /**
   * @param Google_Service_Translate_TranslateTextGlossaryConfig
   */
  public function setGlossaryConfig(Google_Service_Translate_TranslateTextGlossaryConfig $glossaryConfig)
  {
    $this->glossaryConfig = $glossaryConfig;
  }
  /**
   * @return Google_Service_Translate_TranslateTextGlossaryConfig
   */
  public function getGlossaryConfig()
  {
    return $this->glossaryConfig;
  }
  public function setModel($model)
  {
    $this->model = $model;
  }
  public function getModel()
  {
    return $this->model;
  }
  public function setTranslatedText($translatedText)
  {
    $this->translatedText = $translatedText;
  }
  public function getTranslatedText()
  {
    return $this->translatedText;
  }
}
