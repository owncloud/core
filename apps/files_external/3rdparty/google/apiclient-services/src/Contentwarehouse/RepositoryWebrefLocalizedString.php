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

class RepositoryWebrefLocalizedString extends \Google\Model
{
  /**
   * @var string
   */
  public $domain;
  protected $fprintModifierType = RepositoryWebrefFprintModifierProto::class;
  protected $fprintModifierDataType = '';
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $normalizedString;
  /**
   * @var string
   */
  public $originalString;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $sourceType;

  /**
   * @param string
   */
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return string
   */
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param RepositoryWebrefFprintModifierProto
   */
  public function setFprintModifier(RepositoryWebrefFprintModifierProto $fprintModifier)
  {
    $this->fprintModifier = $fprintModifier;
  }
  /**
   * @return RepositoryWebrefFprintModifierProto
   */
  public function getFprintModifier()
  {
    return $this->fprintModifier;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setNormalizedString($normalizedString)
  {
    $this->normalizedString = $normalizedString;
  }
  /**
   * @return string
   */
  public function getNormalizedString()
  {
    return $this->normalizedString;
  }
  /**
   * @param string
   */
  public function setOriginalString($originalString)
  {
    $this->originalString = $originalString;
  }
  /**
   * @return string
   */
  public function getOriginalString()
  {
    return $this->originalString;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefLocalizedString::class, 'Google_Service_Contentwarehouse_RepositoryWebrefLocalizedString');
