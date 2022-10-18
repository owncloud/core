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

class MapsQualitySpecialWordsFlags extends \Google\Model
{
  /**
   * @var bool
   */
  public $isCommonWord;
  /**
   * @var bool
   */
  public $isDeconstructible;
  /**
   * @var bool
   */
  public $isDirectionalModifier;
  /**
   * @var bool
   */
  public $isForbiddenWord;
  /**
   * @var bool
   */
  public $isHouseIdIdentifier;
  /**
   * @var bool
   */
  public $isIntersectionConnector;
  /**
   * @var bool
   */
  public $isLandmarkIdentifier;
  /**
   * @var bool
   */
  public $isLanguageIndicator;
  /**
   * @var bool
   */
  public $isNameSynonym;
  /**
   * @var bool
   */
  public $isNotForLegacyStreetNumberDetection;
  /**
   * @var bool
   */
  public $isNotOptionalizable;
  /**
   * @var bool
   */
  public $isNumber;
  /**
   * @var bool
   */
  public $isNumberSuffix;
  /**
   * @var bool
   */
  public $isOptional;
  /**
   * @var bool
   */
  public $isOrdinalNumber;
  /**
   * @var bool
   */
  public $isPenalizedIfMissing;
  /**
   * @var bool
   */
  public $isPersonalTitle;
  /**
   * @var bool
   */
  public $isStopWord;
  /**
   * @var bool
   */
  public $isStreetNumberIdentifier;

  /**
   * @param bool
   */
  public function setIsCommonWord($isCommonWord)
  {
    $this->isCommonWord = $isCommonWord;
  }
  /**
   * @return bool
   */
  public function getIsCommonWord()
  {
    return $this->isCommonWord;
  }
  /**
   * @param bool
   */
  public function setIsDeconstructible($isDeconstructible)
  {
    $this->isDeconstructible = $isDeconstructible;
  }
  /**
   * @return bool
   */
  public function getIsDeconstructible()
  {
    return $this->isDeconstructible;
  }
  /**
   * @param bool
   */
  public function setIsDirectionalModifier($isDirectionalModifier)
  {
    $this->isDirectionalModifier = $isDirectionalModifier;
  }
  /**
   * @return bool
   */
  public function getIsDirectionalModifier()
  {
    return $this->isDirectionalModifier;
  }
  /**
   * @param bool
   */
  public function setIsForbiddenWord($isForbiddenWord)
  {
    $this->isForbiddenWord = $isForbiddenWord;
  }
  /**
   * @return bool
   */
  public function getIsForbiddenWord()
  {
    return $this->isForbiddenWord;
  }
  /**
   * @param bool
   */
  public function setIsHouseIdIdentifier($isHouseIdIdentifier)
  {
    $this->isHouseIdIdentifier = $isHouseIdIdentifier;
  }
  /**
   * @return bool
   */
  public function getIsHouseIdIdentifier()
  {
    return $this->isHouseIdIdentifier;
  }
  /**
   * @param bool
   */
  public function setIsIntersectionConnector($isIntersectionConnector)
  {
    $this->isIntersectionConnector = $isIntersectionConnector;
  }
  /**
   * @return bool
   */
  public function getIsIntersectionConnector()
  {
    return $this->isIntersectionConnector;
  }
  /**
   * @param bool
   */
  public function setIsLandmarkIdentifier($isLandmarkIdentifier)
  {
    $this->isLandmarkIdentifier = $isLandmarkIdentifier;
  }
  /**
   * @return bool
   */
  public function getIsLandmarkIdentifier()
  {
    return $this->isLandmarkIdentifier;
  }
  /**
   * @param bool
   */
  public function setIsLanguageIndicator($isLanguageIndicator)
  {
    $this->isLanguageIndicator = $isLanguageIndicator;
  }
  /**
   * @return bool
   */
  public function getIsLanguageIndicator()
  {
    return $this->isLanguageIndicator;
  }
  /**
   * @param bool
   */
  public function setIsNameSynonym($isNameSynonym)
  {
    $this->isNameSynonym = $isNameSynonym;
  }
  /**
   * @return bool
   */
  public function getIsNameSynonym()
  {
    return $this->isNameSynonym;
  }
  /**
   * @param bool
   */
  public function setIsNotForLegacyStreetNumberDetection($isNotForLegacyStreetNumberDetection)
  {
    $this->isNotForLegacyStreetNumberDetection = $isNotForLegacyStreetNumberDetection;
  }
  /**
   * @return bool
   */
  public function getIsNotForLegacyStreetNumberDetection()
  {
    return $this->isNotForLegacyStreetNumberDetection;
  }
  /**
   * @param bool
   */
  public function setIsNotOptionalizable($isNotOptionalizable)
  {
    $this->isNotOptionalizable = $isNotOptionalizable;
  }
  /**
   * @return bool
   */
  public function getIsNotOptionalizable()
  {
    return $this->isNotOptionalizable;
  }
  /**
   * @param bool
   */
  public function setIsNumber($isNumber)
  {
    $this->isNumber = $isNumber;
  }
  /**
   * @return bool
   */
  public function getIsNumber()
  {
    return $this->isNumber;
  }
  /**
   * @param bool
   */
  public function setIsNumberSuffix($isNumberSuffix)
  {
    $this->isNumberSuffix = $isNumberSuffix;
  }
  /**
   * @return bool
   */
  public function getIsNumberSuffix()
  {
    return $this->isNumberSuffix;
  }
  /**
   * @param bool
   */
  public function setIsOptional($isOptional)
  {
    $this->isOptional = $isOptional;
  }
  /**
   * @return bool
   */
  public function getIsOptional()
  {
    return $this->isOptional;
  }
  /**
   * @param bool
   */
  public function setIsOrdinalNumber($isOrdinalNumber)
  {
    $this->isOrdinalNumber = $isOrdinalNumber;
  }
  /**
   * @return bool
   */
  public function getIsOrdinalNumber()
  {
    return $this->isOrdinalNumber;
  }
  /**
   * @param bool
   */
  public function setIsPenalizedIfMissing($isPenalizedIfMissing)
  {
    $this->isPenalizedIfMissing = $isPenalizedIfMissing;
  }
  /**
   * @return bool
   */
  public function getIsPenalizedIfMissing()
  {
    return $this->isPenalizedIfMissing;
  }
  /**
   * @param bool
   */
  public function setIsPersonalTitle($isPersonalTitle)
  {
    $this->isPersonalTitle = $isPersonalTitle;
  }
  /**
   * @return bool
   */
  public function getIsPersonalTitle()
  {
    return $this->isPersonalTitle;
  }
  /**
   * @param bool
   */
  public function setIsStopWord($isStopWord)
  {
    $this->isStopWord = $isStopWord;
  }
  /**
   * @return bool
   */
  public function getIsStopWord()
  {
    return $this->isStopWord;
  }
  /**
   * @param bool
   */
  public function setIsStreetNumberIdentifier($isStreetNumberIdentifier)
  {
    $this->isStreetNumberIdentifier = $isStreetNumberIdentifier;
  }
  /**
   * @return bool
   */
  public function getIsStreetNumberIdentifier()
  {
    return $this->isStreetNumberIdentifier;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MapsQualitySpecialWordsFlags::class, 'Google_Service_Contentwarehouse_MapsQualitySpecialWordsFlags');
