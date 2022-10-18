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

class StorageGraphBfgTripleProvenance extends \Google\Collection
{
  protected $collection_key = 'sourceDocId';
  /**
   * @var string
   */
  public $accessRequired;
  /**
   * @var int
   */
  public $accessRequiredInt;
  /**
   * @var string
   */
  public $authoringTimestamp;
  /**
   * @var string
   */
  public $creator;
  /**
   * @var string
   */
  public $dataset;
  /**
   * @var string
   */
  public $extractionPattern;
  /**
   * @var string
   */
  public $extractionTimestamp;
  /**
   * @var string
   */
  public $freebaseAttribution;
  /**
   * @var bool
   */
  public $isSupportingData;
  protected $lgMetadataType = StorageGraphBfgLivegraphProvenanceMetadata::class;
  protected $lgMetadataDataType = '';
  protected $policyMetadataType = StorageGraphBfgPolicyMetadata::class;
  protected $policyMetadataDataType = '';
  /**
   * @var string
   */
  public $process;
  protected $provenanceExtensionType = Proto2BridgeMessageSet::class;
  protected $provenanceExtensionDataType = '';
  /**
   * @var string
   */
  public $rankingToken;
  /**
   * @var bool
   */
  public $requiresTriangulation;
  /**
   * @var string[]
   */
  public $restrictions;
  /**
   * @var string
   */
  public $source;
  /**
   * @var string[]
   */
  public $sourceCategory;
  /**
   * @var string[]
   */
  public $sourceDocId;
  protected $spiiCertificationType = StorageGraphBfgSpiiCertification::class;
  protected $spiiCertificationDataType = '';

  /**
   * @param string
   */
  public function setAccessRequired($accessRequired)
  {
    $this->accessRequired = $accessRequired;
  }
  /**
   * @return string
   */
  public function getAccessRequired()
  {
    return $this->accessRequired;
  }
  /**
   * @param int
   */
  public function setAccessRequiredInt($accessRequiredInt)
  {
    $this->accessRequiredInt = $accessRequiredInt;
  }
  /**
   * @return int
   */
  public function getAccessRequiredInt()
  {
    return $this->accessRequiredInt;
  }
  /**
   * @param string
   */
  public function setAuthoringTimestamp($authoringTimestamp)
  {
    $this->authoringTimestamp = $authoringTimestamp;
  }
  /**
   * @return string
   */
  public function getAuthoringTimestamp()
  {
    return $this->authoringTimestamp;
  }
  /**
   * @param string
   */
  public function setCreator($creator)
  {
    $this->creator = $creator;
  }
  /**
   * @return string
   */
  public function getCreator()
  {
    return $this->creator;
  }
  /**
   * @param string
   */
  public function setDataset($dataset)
  {
    $this->dataset = $dataset;
  }
  /**
   * @return string
   */
  public function getDataset()
  {
    return $this->dataset;
  }
  /**
   * @param string
   */
  public function setExtractionPattern($extractionPattern)
  {
    $this->extractionPattern = $extractionPattern;
  }
  /**
   * @return string
   */
  public function getExtractionPattern()
  {
    return $this->extractionPattern;
  }
  /**
   * @param string
   */
  public function setExtractionTimestamp($extractionTimestamp)
  {
    $this->extractionTimestamp = $extractionTimestamp;
  }
  /**
   * @return string
   */
  public function getExtractionTimestamp()
  {
    return $this->extractionTimestamp;
  }
  /**
   * @param string
   */
  public function setFreebaseAttribution($freebaseAttribution)
  {
    $this->freebaseAttribution = $freebaseAttribution;
  }
  /**
   * @return string
   */
  public function getFreebaseAttribution()
  {
    return $this->freebaseAttribution;
  }
  /**
   * @param bool
   */
  public function setIsSupportingData($isSupportingData)
  {
    $this->isSupportingData = $isSupportingData;
  }
  /**
   * @return bool
   */
  public function getIsSupportingData()
  {
    return $this->isSupportingData;
  }
  /**
   * @param StorageGraphBfgLivegraphProvenanceMetadata
   */
  public function setLgMetadata(StorageGraphBfgLivegraphProvenanceMetadata $lgMetadata)
  {
    $this->lgMetadata = $lgMetadata;
  }
  /**
   * @return StorageGraphBfgLivegraphProvenanceMetadata
   */
  public function getLgMetadata()
  {
    return $this->lgMetadata;
  }
  /**
   * @param StorageGraphBfgPolicyMetadata
   */
  public function setPolicyMetadata(StorageGraphBfgPolicyMetadata $policyMetadata)
  {
    $this->policyMetadata = $policyMetadata;
  }
  /**
   * @return StorageGraphBfgPolicyMetadata
   */
  public function getPolicyMetadata()
  {
    return $this->policyMetadata;
  }
  /**
   * @param string
   */
  public function setProcess($process)
  {
    $this->process = $process;
  }
  /**
   * @return string
   */
  public function getProcess()
  {
    return $this->process;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setProvenanceExtension(Proto2BridgeMessageSet $provenanceExtension)
  {
    $this->provenanceExtension = $provenanceExtension;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getProvenanceExtension()
  {
    return $this->provenanceExtension;
  }
  /**
   * @param string
   */
  public function setRankingToken($rankingToken)
  {
    $this->rankingToken = $rankingToken;
  }
  /**
   * @return string
   */
  public function getRankingToken()
  {
    return $this->rankingToken;
  }
  /**
   * @param bool
   */
  public function setRequiresTriangulation($requiresTriangulation)
  {
    $this->requiresTriangulation = $requiresTriangulation;
  }
  /**
   * @return bool
   */
  public function getRequiresTriangulation()
  {
    return $this->requiresTriangulation;
  }
  /**
   * @param string[]
   */
  public function setRestrictions($restrictions)
  {
    $this->restrictions = $restrictions;
  }
  /**
   * @return string[]
   */
  public function getRestrictions()
  {
    return $this->restrictions;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param string[]
   */
  public function setSourceCategory($sourceCategory)
  {
    $this->sourceCategory = $sourceCategory;
  }
  /**
   * @return string[]
   */
  public function getSourceCategory()
  {
    return $this->sourceCategory;
  }
  /**
   * @param string[]
   */
  public function setSourceDocId($sourceDocId)
  {
    $this->sourceDocId = $sourceDocId;
  }
  /**
   * @return string[]
   */
  public function getSourceDocId()
  {
    return $this->sourceDocId;
  }
  /**
   * @param StorageGraphBfgSpiiCertification
   */
  public function setSpiiCertification(StorageGraphBfgSpiiCertification $spiiCertification)
  {
    $this->spiiCertification = $spiiCertification;
  }
  /**
   * @return StorageGraphBfgSpiiCertification
   */
  public function getSpiiCertification()
  {
    return $this->spiiCertification;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StorageGraphBfgTripleProvenance::class, 'Google_Service_Contentwarehouse_StorageGraphBfgTripleProvenance');
