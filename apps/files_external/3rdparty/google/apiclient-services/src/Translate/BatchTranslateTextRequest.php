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

class BatchTranslateTextRequest extends \Google\Collection
{
  protected $collection_key = 'targetLanguageCodes';
  protected $glossariesType = TranslateTextGlossaryConfig::class;
  protected $glossariesDataType = 'map';
  protected $inputConfigsType = InputConfig::class;
  protected $inputConfigsDataType = 'array';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string[]
   */
  public $models;
  protected $outputConfigType = OutputConfig::class;
  protected $outputConfigDataType = '';
  /**
   * @var string
   */
  public $sourceLanguageCode;
  /**
   * @var string[]
   */
  public $targetLanguageCodes;

  /**
   * @param TranslateTextGlossaryConfig[]
   */
  public function setGlossaries($glossaries)
  {
    $this->glossaries = $glossaries;
  }
  /**
   * @return TranslateTextGlossaryConfig[]
   */
  public function getGlossaries()
  {
    return $this->glossaries;
  }
  /**
   * @param InputConfig[]
   */
  public function setInputConfigs($inputConfigs)
  {
    $this->inputConfigs = $inputConfigs;
  }
  /**
   * @return InputConfig[]
   */
  public function getInputConfigs()
  {
    return $this->inputConfigs;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string[]
   */
  public function setModels($models)
  {
    $this->models = $models;
  }
  /**
   * @return string[]
   */
  public function getModels()
  {
    return $this->models;
  }
  /**
   * @param OutputConfig
   */
  public function setOutputConfig(OutputConfig $outputConfig)
  {
    $this->outputConfig = $outputConfig;
  }
  /**
   * @return OutputConfig
   */
  public function getOutputConfig()
  {
    return $this->outputConfig;
  }
  /**
   * @param string
   */
  public function setSourceLanguageCode($sourceLanguageCode)
  {
    $this->sourceLanguageCode = $sourceLanguageCode;
  }
  /**
   * @return string
   */
  public function getSourceLanguageCode()
  {
    return $this->sourceLanguageCode;
  }
  /**
   * @param string[]
   */
  public function setTargetLanguageCodes($targetLanguageCodes)
  {
    $this->targetLanguageCodes = $targetLanguageCodes;
  }
  /**
   * @return string[]
   */
  public function getTargetLanguageCodes()
  {
    return $this->targetLanguageCodes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BatchTranslateTextRequest::class, 'Google_Service_Translate_BatchTranslateTextRequest');
