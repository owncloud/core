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

class RepositoryWebrefEntityJoin extends \Google\Collection
{
  protected $collection_key = 'representation';
  protected $annotatedEntityIdType = RepositoryWebrefWebrefEntityId::class;
  protected $annotatedEntityIdDataType = '';
  protected $cdocType = RepositoryWebrefSimplifiedCompositeDoc::class;
  protected $cdocDataType = 'array';
  protected $contextNameInfoType = RepositoryWebrefGlobalNameInfo::class;
  protected $contextNameInfoDataType = 'array';
  protected $debugInfoType = RepositoryWebrefEntityDebugInfo::class;
  protected $debugInfoDataType = 'array';
  protected $enricherAnnotatorProfileType = RepositoryWebrefAnnotatorProfile::class;
  protected $enricherAnnotatorProfileDataType = '';
  protected $enricherDebugDataType = RepositoryWebrefEnricherDebugData::class;
  protected $enricherDebugDataDataType = '';
  protected $extraDataType = RepositoryWebrefExtraMetadata::class;
  protected $extraDataDataType = '';
  protected $humanRatingsType = RepositoryWebrefHumanRatings::class;
  protected $humanRatingsDataType = '';
  protected $linkInfoType = RepositoryWebrefGlobalLinkInfo::class;
  protected $linkInfoDataType = 'array';
  protected $nameInfoType = RepositoryWebrefGlobalNameInfo::class;
  protected $nameInfoDataType = 'array';
  protected $nameSignalsType = RepositoryWebrefPreprocessingNameSignals::class;
  protected $nameSignalsDataType = '';
  protected $preprocessingIdType = RepositoryWebrefAbsoluteLegacyId::class;
  protected $preprocessingIdDataType = '';
  protected $refconNameInfoType = RepositoryWebrefRefconRefconNameInfo::class;
  protected $refconNameInfoDataType = 'array';
  protected $representationType = RepositoryWebrefDomainSpecificRepresentation::class;
  protected $representationDataType = 'array';

  /**
   * @param RepositoryWebrefWebrefEntityId
   */
  public function setAnnotatedEntityId(RepositoryWebrefWebrefEntityId $annotatedEntityId)
  {
    $this->annotatedEntityId = $annotatedEntityId;
  }
  /**
   * @return RepositoryWebrefWebrefEntityId
   */
  public function getAnnotatedEntityId()
  {
    return $this->annotatedEntityId;
  }
  /**
   * @param RepositoryWebrefSimplifiedCompositeDoc[]
   */
  public function setCdoc($cdoc)
  {
    $this->cdoc = $cdoc;
  }
  /**
   * @return RepositoryWebrefSimplifiedCompositeDoc[]
   */
  public function getCdoc()
  {
    return $this->cdoc;
  }
  /**
   * @param RepositoryWebrefGlobalNameInfo[]
   */
  public function setContextNameInfo($contextNameInfo)
  {
    $this->contextNameInfo = $contextNameInfo;
  }
  /**
   * @return RepositoryWebrefGlobalNameInfo[]
   */
  public function getContextNameInfo()
  {
    return $this->contextNameInfo;
  }
  /**
   * @param RepositoryWebrefEntityDebugInfo[]
   */
  public function setDebugInfo($debugInfo)
  {
    $this->debugInfo = $debugInfo;
  }
  /**
   * @return RepositoryWebrefEntityDebugInfo[]
   */
  public function getDebugInfo()
  {
    return $this->debugInfo;
  }
  /**
   * @param RepositoryWebrefAnnotatorProfile
   */
  public function setEnricherAnnotatorProfile(RepositoryWebrefAnnotatorProfile $enricherAnnotatorProfile)
  {
    $this->enricherAnnotatorProfile = $enricherAnnotatorProfile;
  }
  /**
   * @return RepositoryWebrefAnnotatorProfile
   */
  public function getEnricherAnnotatorProfile()
  {
    return $this->enricherAnnotatorProfile;
  }
  /**
   * @param RepositoryWebrefEnricherDebugData
   */
  public function setEnricherDebugData(RepositoryWebrefEnricherDebugData $enricherDebugData)
  {
    $this->enricherDebugData = $enricherDebugData;
  }
  /**
   * @return RepositoryWebrefEnricherDebugData
   */
  public function getEnricherDebugData()
  {
    return $this->enricherDebugData;
  }
  /**
   * @param RepositoryWebrefExtraMetadata
   */
  public function setExtraData(RepositoryWebrefExtraMetadata $extraData)
  {
    $this->extraData = $extraData;
  }
  /**
   * @return RepositoryWebrefExtraMetadata
   */
  public function getExtraData()
  {
    return $this->extraData;
  }
  /**
   * @param RepositoryWebrefHumanRatings
   */
  public function setHumanRatings(RepositoryWebrefHumanRatings $humanRatings)
  {
    $this->humanRatings = $humanRatings;
  }
  /**
   * @return RepositoryWebrefHumanRatings
   */
  public function getHumanRatings()
  {
    return $this->humanRatings;
  }
  /**
   * @param RepositoryWebrefGlobalLinkInfo[]
   */
  public function setLinkInfo($linkInfo)
  {
    $this->linkInfo = $linkInfo;
  }
  /**
   * @return RepositoryWebrefGlobalLinkInfo[]
   */
  public function getLinkInfo()
  {
    return $this->linkInfo;
  }
  /**
   * @param RepositoryWebrefGlobalNameInfo[]
   */
  public function setNameInfo($nameInfo)
  {
    $this->nameInfo = $nameInfo;
  }
  /**
   * @return RepositoryWebrefGlobalNameInfo[]
   */
  public function getNameInfo()
  {
    return $this->nameInfo;
  }
  /**
   * @param RepositoryWebrefPreprocessingNameSignals
   */
  public function setNameSignals(RepositoryWebrefPreprocessingNameSignals $nameSignals)
  {
    $this->nameSignals = $nameSignals;
  }
  /**
   * @return RepositoryWebrefPreprocessingNameSignals
   */
  public function getNameSignals()
  {
    return $this->nameSignals;
  }
  /**
   * @param RepositoryWebrefAbsoluteLegacyId
   */
  public function setPreprocessingId(RepositoryWebrefAbsoluteLegacyId $preprocessingId)
  {
    $this->preprocessingId = $preprocessingId;
  }
  /**
   * @return RepositoryWebrefAbsoluteLegacyId
   */
  public function getPreprocessingId()
  {
    return $this->preprocessingId;
  }
  /**
   * @param RepositoryWebrefRefconRefconNameInfo[]
   */
  public function setRefconNameInfo($refconNameInfo)
  {
    $this->refconNameInfo = $refconNameInfo;
  }
  /**
   * @return RepositoryWebrefRefconRefconNameInfo[]
   */
  public function getRefconNameInfo()
  {
    return $this->refconNameInfo;
  }
  /**
   * @param RepositoryWebrefDomainSpecificRepresentation[]
   */
  public function setRepresentation($representation)
  {
    $this->representation = $representation;
  }
  /**
   * @return RepositoryWebrefDomainSpecificRepresentation[]
   */
  public function getRepresentation()
  {
    return $this->representation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefEntityJoin::class, 'Google_Service_Contentwarehouse_RepositoryWebrefEntityJoin');
