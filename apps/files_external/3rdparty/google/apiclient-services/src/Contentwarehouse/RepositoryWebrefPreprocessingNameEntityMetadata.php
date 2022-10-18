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

class RepositoryWebrefPreprocessingNameEntityMetadata extends \Google\Model
{
  /**
   * @var bool
   */
  public $isBypassedName;
  /**
   * @var bool
   */
  public $isCompoundName;
  /**
   * @var bool
   */
  public $isCompoundRetrievalKey;
  /**
   * @var bool
   */
  public $isDictionaryTerm;
  /**
   * @var bool
   */
  public $isEventRetrievalKey;
  /**
   * @var bool
   */
  public $isGeneratedName;
  /**
   * @var bool
   */
  public $isGeneratedStreetname;
  /**
   * @var bool
   */
  public $isHierarchyPropagated;
  /**
   * @var bool
   */
  public $isIsbn;
  /**
   * @var bool
   */
  public $isLyricsContent;
  /**
   * @var bool
   */
  public $isPhoneNumber;
  /**
   * @var bool
   */
  public $isRefconName;
  /**
   * @var bool
   */
  public $isReferenceName;
  /**
   * @var bool
   */
  public $isRefpageUrl;
  /**
   * @var bool
   */
  public $isReverseUniquePropertyName;
  /**
   * @var bool
   */
  public $isStrongIdentifier;
  /**
   * @var bool
   */
  public $isSynonymOrFuzzyMatch;
  /**
   * @var bool
   */
  public $isTrustedAllcapsName;
  /**
   * @var bool
   */
  public $isUnnormalizedName;
  /**
   * @var bool
   */
  public $notGeneratedName;
  protected $originalNamesType = RepositoryWebrefPreprocessingOriginalNames::class;
  protected $originalNamesDataType = '';
  /**
   * @var bool
   */
  public $suppressTokenization;

  /**
   * @param bool
   */
  public function setIsBypassedName($isBypassedName)
  {
    $this->isBypassedName = $isBypassedName;
  }
  /**
   * @return bool
   */
  public function getIsBypassedName()
  {
    return $this->isBypassedName;
  }
  /**
   * @param bool
   */
  public function setIsCompoundName($isCompoundName)
  {
    $this->isCompoundName = $isCompoundName;
  }
  /**
   * @return bool
   */
  public function getIsCompoundName()
  {
    return $this->isCompoundName;
  }
  /**
   * @param bool
   */
  public function setIsCompoundRetrievalKey($isCompoundRetrievalKey)
  {
    $this->isCompoundRetrievalKey = $isCompoundRetrievalKey;
  }
  /**
   * @return bool
   */
  public function getIsCompoundRetrievalKey()
  {
    return $this->isCompoundRetrievalKey;
  }
  /**
   * @param bool
   */
  public function setIsDictionaryTerm($isDictionaryTerm)
  {
    $this->isDictionaryTerm = $isDictionaryTerm;
  }
  /**
   * @return bool
   */
  public function getIsDictionaryTerm()
  {
    return $this->isDictionaryTerm;
  }
  /**
   * @param bool
   */
  public function setIsEventRetrievalKey($isEventRetrievalKey)
  {
    $this->isEventRetrievalKey = $isEventRetrievalKey;
  }
  /**
   * @return bool
   */
  public function getIsEventRetrievalKey()
  {
    return $this->isEventRetrievalKey;
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
  public function setIsGeneratedStreetname($isGeneratedStreetname)
  {
    $this->isGeneratedStreetname = $isGeneratedStreetname;
  }
  /**
   * @return bool
   */
  public function getIsGeneratedStreetname()
  {
    return $this->isGeneratedStreetname;
  }
  /**
   * @param bool
   */
  public function setIsHierarchyPropagated($isHierarchyPropagated)
  {
    $this->isHierarchyPropagated = $isHierarchyPropagated;
  }
  /**
   * @return bool
   */
  public function getIsHierarchyPropagated()
  {
    return $this->isHierarchyPropagated;
  }
  /**
   * @param bool
   */
  public function setIsIsbn($isIsbn)
  {
    $this->isIsbn = $isIsbn;
  }
  /**
   * @return bool
   */
  public function getIsIsbn()
  {
    return $this->isIsbn;
  }
  /**
   * @param bool
   */
  public function setIsLyricsContent($isLyricsContent)
  {
    $this->isLyricsContent = $isLyricsContent;
  }
  /**
   * @return bool
   */
  public function getIsLyricsContent()
  {
    return $this->isLyricsContent;
  }
  /**
   * @param bool
   */
  public function setIsPhoneNumber($isPhoneNumber)
  {
    $this->isPhoneNumber = $isPhoneNumber;
  }
  /**
   * @return bool
   */
  public function getIsPhoneNumber()
  {
    return $this->isPhoneNumber;
  }
  /**
   * @param bool
   */
  public function setIsRefconName($isRefconName)
  {
    $this->isRefconName = $isRefconName;
  }
  /**
   * @return bool
   */
  public function getIsRefconName()
  {
    return $this->isRefconName;
  }
  /**
   * @param bool
   */
  public function setIsReferenceName($isReferenceName)
  {
    $this->isReferenceName = $isReferenceName;
  }
  /**
   * @return bool
   */
  public function getIsReferenceName()
  {
    return $this->isReferenceName;
  }
  /**
   * @param bool
   */
  public function setIsRefpageUrl($isRefpageUrl)
  {
    $this->isRefpageUrl = $isRefpageUrl;
  }
  /**
   * @return bool
   */
  public function getIsRefpageUrl()
  {
    return $this->isRefpageUrl;
  }
  /**
   * @param bool
   */
  public function setIsReverseUniquePropertyName($isReverseUniquePropertyName)
  {
    $this->isReverseUniquePropertyName = $isReverseUniquePropertyName;
  }
  /**
   * @return bool
   */
  public function getIsReverseUniquePropertyName()
  {
    return $this->isReverseUniquePropertyName;
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
  public function setIsSynonymOrFuzzyMatch($isSynonymOrFuzzyMatch)
  {
    $this->isSynonymOrFuzzyMatch = $isSynonymOrFuzzyMatch;
  }
  /**
   * @return bool
   */
  public function getIsSynonymOrFuzzyMatch()
  {
    return $this->isSynonymOrFuzzyMatch;
  }
  /**
   * @param bool
   */
  public function setIsTrustedAllcapsName($isTrustedAllcapsName)
  {
    $this->isTrustedAllcapsName = $isTrustedAllcapsName;
  }
  /**
   * @return bool
   */
  public function getIsTrustedAllcapsName()
  {
    return $this->isTrustedAllcapsName;
  }
  /**
   * @param bool
   */
  public function setIsUnnormalizedName($isUnnormalizedName)
  {
    $this->isUnnormalizedName = $isUnnormalizedName;
  }
  /**
   * @return bool
   */
  public function getIsUnnormalizedName()
  {
    return $this->isUnnormalizedName;
  }
  /**
   * @param bool
   */
  public function setNotGeneratedName($notGeneratedName)
  {
    $this->notGeneratedName = $notGeneratedName;
  }
  /**
   * @return bool
   */
  public function getNotGeneratedName()
  {
    return $this->notGeneratedName;
  }
  /**
   * @param RepositoryWebrefPreprocessingOriginalNames
   */
  public function setOriginalNames(RepositoryWebrefPreprocessingOriginalNames $originalNames)
  {
    $this->originalNames = $originalNames;
  }
  /**
   * @return RepositoryWebrefPreprocessingOriginalNames
   */
  public function getOriginalNames()
  {
    return $this->originalNames;
  }
  /**
   * @param bool
   */
  public function setSuppressTokenization($suppressTokenization)
  {
    $this->suppressTokenization = $suppressTokenization;
  }
  /**
   * @return bool
   */
  public function getSuppressTokenization()
  {
    return $this->suppressTokenization;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefPreprocessingNameEntityMetadata::class, 'Google_Service_Contentwarehouse_RepositoryWebrefPreprocessingNameEntityMetadata');
