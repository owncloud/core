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

class Google_Service_Translate_BatchTranslateTextRequest extends Google_Collection
{
  protected $collection_key = 'targetLanguageCodes';
  protected $glossariesType = 'Google_Service_Translate_TranslateTextGlossaryConfig';
  protected $glossariesDataType = 'map';
  protected $inputConfigsType = 'Google_Service_Translate_InputConfig';
  protected $inputConfigsDataType = 'array';
  public $labels;
  public $models;
  protected $outputConfigType = 'Google_Service_Translate_OutputConfig';
  protected $outputConfigDataType = '';
  public $sourceLanguageCode;
  public $targetLanguageCodes;

  /**
   * @param Google_Service_Translate_TranslateTextGlossaryConfig
   */
  public function setGlossaries($glossaries)
  {
    $this->glossaries = $glossaries;
  }
  /**
   * @return Google_Service_Translate_TranslateTextGlossaryConfig
   */
  public function getGlossaries()
  {
    return $this->glossaries;
  }
  /**
   * @param Google_Service_Translate_InputConfig
   */
  public function setInputConfigs($inputConfigs)
  {
    $this->inputConfigs = $inputConfigs;
  }
  /**
   * @return Google_Service_Translate_InputConfig
   */
  public function getInputConfigs()
  {
    return $this->inputConfigs;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setModels($models)
  {
    $this->models = $models;
  }
  public function getModels()
  {
    return $this->models;
  }
  /**
   * @param Google_Service_Translate_OutputConfig
   */
  public function setOutputConfig(Google_Service_Translate_OutputConfig $outputConfig)
  {
    $this->outputConfig = $outputConfig;
  }
  /**
   * @return Google_Service_Translate_OutputConfig
   */
  public function getOutputConfig()
  {
    return $this->outputConfig;
  }
  public function setSourceLanguageCode($sourceLanguageCode)
  {
    $this->sourceLanguageCode = $sourceLanguageCode;
  }
  public function getSourceLanguageCode()
  {
    return $this->sourceLanguageCode;
  }
  public function setTargetLanguageCodes($targetLanguageCodes)
  {
    $this->targetLanguageCodes = $targetLanguageCodes;
  }
  public function getTargetLanguageCodes()
  {
    return $this->targetLanguageCodes;
  }
}
