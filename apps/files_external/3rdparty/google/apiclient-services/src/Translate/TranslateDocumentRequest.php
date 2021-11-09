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

class TranslateDocumentRequest extends \Google\Model
{
  protected $documentInputConfigType = DocumentInputConfig::class;
  protected $documentInputConfigDataType = '';
  protected $documentOutputConfigType = DocumentOutputConfig::class;
  protected $documentOutputConfigDataType = '';
  protected $glossaryConfigType = TranslateTextGlossaryConfig::class;
  protected $glossaryConfigDataType = '';
  public $labels;
  public $model;
  public $sourceLanguageCode;
  public $targetLanguageCode;

  /**
   * @param DocumentInputConfig
   */
  public function setDocumentInputConfig(DocumentInputConfig $documentInputConfig)
  {
    $this->documentInputConfig = $documentInputConfig;
  }
  /**
   * @return DocumentInputConfig
   */
  public function getDocumentInputConfig()
  {
    return $this->documentInputConfig;
  }
  /**
   * @param DocumentOutputConfig
   */
  public function setDocumentOutputConfig(DocumentOutputConfig $documentOutputConfig)
  {
    $this->documentOutputConfig = $documentOutputConfig;
  }
  /**
   * @return DocumentOutputConfig
   */
  public function getDocumentOutputConfig()
  {
    return $this->documentOutputConfig;
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
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setModel($model)
  {
    $this->model = $model;
  }
  public function getModel()
  {
    return $this->model;
  }
  public function setSourceLanguageCode($sourceLanguageCode)
  {
    $this->sourceLanguageCode = $sourceLanguageCode;
  }
  public function getSourceLanguageCode()
  {
    return $this->sourceLanguageCode;
  }
  public function setTargetLanguageCode($targetLanguageCode)
  {
    $this->targetLanguageCode = $targetLanguageCode;
  }
  public function getTargetLanguageCode()
  {
    return $this->targetLanguageCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TranslateDocumentRequest::class, 'Google_Service_Translate_TranslateDocumentRequest');
