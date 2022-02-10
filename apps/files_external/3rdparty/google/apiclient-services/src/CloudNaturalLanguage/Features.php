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

namespace Google\Service\CloudNaturalLanguage;

class Features extends \Google\Model
{
  /**
   * @var bool
   */
  public $classifyText;
  /**
   * @var bool
   */
  public $extractDocumentSentiment;
  /**
   * @var bool
   */
  public $extractEntities;
  /**
   * @var bool
   */
  public $extractEntitySentiment;
  /**
   * @var bool
   */
  public $extractSyntax;

  /**
   * @param bool
   */
  public function setClassifyText($classifyText)
  {
    $this->classifyText = $classifyText;
  }
  /**
   * @return bool
   */
  public function getClassifyText()
  {
    return $this->classifyText;
  }
  /**
   * @param bool
   */
  public function setExtractDocumentSentiment($extractDocumentSentiment)
  {
    $this->extractDocumentSentiment = $extractDocumentSentiment;
  }
  /**
   * @return bool
   */
  public function getExtractDocumentSentiment()
  {
    return $this->extractDocumentSentiment;
  }
  /**
   * @param bool
   */
  public function setExtractEntities($extractEntities)
  {
    $this->extractEntities = $extractEntities;
  }
  /**
   * @return bool
   */
  public function getExtractEntities()
  {
    return $this->extractEntities;
  }
  /**
   * @param bool
   */
  public function setExtractEntitySentiment($extractEntitySentiment)
  {
    $this->extractEntitySentiment = $extractEntitySentiment;
  }
  /**
   * @return bool
   */
  public function getExtractEntitySentiment()
  {
    return $this->extractEntitySentiment;
  }
  /**
   * @param bool
   */
  public function setExtractSyntax($extractSyntax)
  {
    $this->extractSyntax = $extractSyntax;
  }
  /**
   * @return bool
   */
  public function getExtractSyntax()
  {
    return $this->extractSyntax;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Features::class, 'Google_Service_CloudNaturalLanguage_Features');
