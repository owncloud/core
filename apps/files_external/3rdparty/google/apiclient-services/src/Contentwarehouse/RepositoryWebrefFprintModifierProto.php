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

namespace Google\Service\Contentwarehouse;

class RepositoryWebrefFprintModifierProto extends \Google\Model
{
  /**
   * @var string
   */
  public $capitalization;
  /**
   * @var string
   */
  public $enclosing;
  /**
   * @var int
   */
  public $language;
  /**
   * @var string
   */
  public $namespaceType;
  /**
   * @var string
   */
  public $punctuation;
  /**
   * @var string
   */
  public $sentence;
  /**
   * @var string
   */
  public $sourceType;
  /**
   * @var string
   */
  public $stemming;
  /**
   * @var string
   */
  public $style;
  /**
   * @var string
   */
  public $tokenType;

  /**
   * @param string
   */
  public function setCapitalization($capitalization)
  {
    $this->capitalization = $capitalization;
  }
  /**
   * @return string
   */
  public function getCapitalization()
  {
    return $this->capitalization;
  }
  /**
   * @param string
   */
  public function setEnclosing($enclosing)
  {
    $this->enclosing = $enclosing;
  }
  /**
   * @return string
   */
  public function getEnclosing()
  {
    return $this->enclosing;
  }
  /**
   * @param int
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return int
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setNamespaceType($namespaceType)
  {
    $this->namespaceType = $namespaceType;
  }
  /**
   * @return string
   */
  public function getNamespaceType()
  {
    return $this->namespaceType;
  }
  /**
   * @param string
   */
  public function setPunctuation($punctuation)
  {
    $this->punctuation = $punctuation;
  }
  /**
   * @return string
   */
  public function getPunctuation()
  {
    return $this->punctuation;
  }
  /**
   * @param string
   */
  public function setSentence($sentence)
  {
    $this->sentence = $sentence;
  }
  /**
   * @return string
   */
  public function getSentence()
  {
    return $this->sentence;
  }
  /**
   * @param string
   */
  public function setSourceType($sourceType)
  {
    $this->sourceType = $sourceType;
  }
  /**
   * @return string
   */
  public function getSourceType()
  {
    return $this->sourceType;
  }
  /**
   * @param string
   */
  public function setStemming($stemming)
  {
    $this->stemming = $stemming;
  }
  /**
   * @return string
   */
  public function getStemming()
  {
    return $this->stemming;
  }
  /**
   * @param string
   */
  public function setStyle($style)
  {
    $this->style = $style;
  }
  /**
   * @return string
   */
  public function getStyle()
  {
    return $this->style;
  }
  /**
   * @param string
   */
  public function setTokenType($tokenType)
  {
    $this->tokenType = $tokenType;
  }
  /**
   * @return string
   */
  public function getTokenType()
  {
    return $this->tokenType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefFprintModifierProto::class, 'Google_Service_Contentwarehouse_RepositoryWebrefFprintModifierProto');
