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

class TranslateDocumentResponse extends \Google\Model
{
  protected $documentTranslationType = DocumentTranslation::class;
  protected $documentTranslationDataType = '';
  protected $glossaryConfigType = TranslateTextGlossaryConfig::class;
  protected $glossaryConfigDataType = '';
  protected $glossaryDocumentTranslationType = DocumentTranslation::class;
  protected $glossaryDocumentTranslationDataType = '';
  /**
   * @var string
   */
  public $model;

  /**
   * @param DocumentTranslation
   */
  public function setDocumentTranslation(DocumentTranslation $documentTranslation)
  {
    $this->documentTranslation = $documentTranslation;
  }
  /**
   * @return DocumentTranslation
   */
  public function getDocumentTranslation()
  {
    return $this->documentTranslation;
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
   * @param DocumentTranslation
   */
  public function setGlossaryDocumentTranslation(DocumentTranslation $glossaryDocumentTranslation)
  {
    $this->glossaryDocumentTranslation = $glossaryDocumentTranslation;
  }
  /**
   * @return DocumentTranslation
   */
  public function getGlossaryDocumentTranslation()
  {
    return $this->glossaryDocumentTranslation;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TranslateDocumentResponse::class, 'Google_Service_Translate_TranslateDocumentResponse');
