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

class KnowledgeGraphTripleProvenance extends \Google\Collection
{
  protected $collection_key = 'restrictions';
  /**
   * @var int
   */
  public $accessRequired;
  /**
   * @var string
   */
  public $creator;
  /**
   * @var string
   */
  public $datasetMid;
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
  /**
   * @var string[]
   */
  public $restrictions;
  /**
   * @var string
   */
  public $sourceCategory;
  /**
   * @var string
   */
  public $sourceDocId;
  /**
   * @var string
   */
  public $sourceUrl;
  protected $spiiCertificationType = StorageGraphBfgSpiiCertification::class;
  protected $spiiCertificationDataType = '';

  /**
   * @param int
   */
  public function setAccessRequired($accessRequired)
  {
    $this->accessRequired = $accessRequired;
  }
  /**
   * @return int
   */
  public function getAccessRequired()
  {
    return $this->accessRequired;
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
  public function setDatasetMid($datasetMid)
  {
    $this->datasetMid = $datasetMid;
  }
  /**
   * @return string
   */
  public function getDatasetMid()
  {
    return $this->datasetMid;
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
  public function setSourceCategory($sourceCategory)
  {
    $this->sourceCategory = $sourceCategory;
  }
  /**
   * @return string
   */
  public function getSourceCategory()
  {
    return $this->sourceCategory;
  }
  /**
   * @param string
   */
  public function setSourceDocId($sourceDocId)
  {
    $this->sourceDocId = $sourceDocId;
  }
  /**
   * @return string
   */
  public function getSourceDocId()
  {
    return $this->sourceDocId;
  }
  /**
   * @param string
   */
  public function setSourceUrl($sourceUrl)
  {
    $this->sourceUrl = $sourceUrl;
  }
  /**
   * @return string
   */
  public function getSourceUrl()
  {
    return $this->sourceUrl;
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
class_alias(KnowledgeGraphTripleProvenance::class, 'Google_Service_Contentwarehouse_KnowledgeGraphTripleProvenance');
