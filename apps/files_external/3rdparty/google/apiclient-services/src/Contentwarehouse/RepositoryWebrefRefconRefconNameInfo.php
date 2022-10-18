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

class RepositoryWebrefRefconRefconNameInfo extends \Google\Collection
{
  protected $collection_key = 'language';
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var float
   */
  public $idfScore;
  /**
   * @var bool
   */
  public $isGeneratedName;
  /**
   * @var bool
   */
  public $isI18nName;
  /**
   * @var bool
   */
  public $isStrongIdentifier;
  /**
   * @var bool
   */
  public $isTranslatedName;
  /**
   * @var int[]
   */
  public $language;
  /**
   * @var float
   */
  public $namePrior;
  /**
   * @var string
   */
  public $normalizedName;
  /**
   * @var string
   */
  public $originalName;
  /**
   * @var float
   */
  public $score;

  /**
   * @param float
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return float
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param float
   */
  public function setIdfScore($idfScore)
  {
    $this->idfScore = $idfScore;
  }
  /**
   * @return float
   */
  public function getIdfScore()
  {
    return $this->idfScore;
  }
  /**
   * @param bool
   */
  public function setIsGeneratedName($isGeneratedName)
  {
    $this->isGeneratedName = $isGeneratedName;
  }
  /**
   * @return bool
   */
  public function getIsGeneratedName()
  {
    return $this->isGeneratedName;
  }
  /**
   * @param bool
   */
  public function setIsI18nName($isI18nName)
  {
    $this->isI18nName = $isI18nName;
  }
  /**
   * @return bool
   */
  public function getIsI18nName()
  {
    return $this->isI18nName;
  }
  /**
   * @param bool
   */
  public function setIsStrongIdentifier($isStrongIdentifier)
  {
    $this->isStrongIdentifier = $isStrongIdentifier;
  }
  /**
   * @return bool
   */
  public function getIsStrongIdentifier()
  {
    return $this->isStrongIdentifier;
  }
  /**
   * @param bool
   */
  public function setIsTranslatedName($isTranslatedName)
  {
    $this->isTranslatedName = $isTranslatedName;
  }
  /**
   * @return bool
   */
  public function getIsTranslatedName()
  {
    return $this->isTranslatedName;
  }
  /**
   * @param int[]
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return int[]
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param float
   */
  public function setNamePrior($namePrior)
  {
    $this->namePrior = $namePrior;
  }
  /**
   * @return float
   */
  public function getNamePrior()
  {
    return $this->namePrior;
  }
  /**
   * @param string
   */
  public function setNormalizedName($normalizedName)
  {
    $this->normalizedName = $normalizedName;
  }
  /**
   * @return string
   */
  public function getNormalizedName()
  {
    return $this->normalizedName;
  }
  /**
   * @param string
   */
  public function setOriginalName($originalName)
  {
    $this->originalName = $originalName;
  }
  /**
   * @return string
   */
  public function getOriginalName()
  {
    return $this->originalName;
  }
  /**
   * @param float
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return float
   */
  public function getScore()
  {
    return $this->score;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefRefconRefconNameInfo::class, 'Google_Service_Contentwarehouse_RepositoryWebrefRefconRefconNameInfo');
