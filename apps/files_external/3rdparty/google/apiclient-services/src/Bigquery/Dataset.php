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

namespace Google\Service\Bigquery;

class Dataset extends \Google\Collection
{
  protected $collection_key = 'access';
  protected $accessType = DatasetAccess::class;
  protected $accessDataType = 'array';
  public $creationTime;
  protected $datasetReferenceType = DatasetReference::class;
  protected $datasetReferenceDataType = '';
  public $defaultCollation;
  protected $defaultEncryptionConfigurationType = EncryptionConfiguration::class;
  protected $defaultEncryptionConfigurationDataType = '';
  public $defaultPartitionExpirationMs;
  public $defaultTableExpirationMs;
  public $description;
  public $etag;
  public $friendlyName;
  public $id;
  public $isCaseInsensitive;
  public $kind;
  public $labels;
  public $lastModifiedTime;
  public $location;
  public $satisfiesPZS;
  public $selfLink;

  /**
   * @param DatasetAccess[]
   */
  public function setAccess($access)
  {
    $this->access = $access;
  }
  /**
   * @return DatasetAccess[]
   */
  public function getAccess()
  {
    return $this->access;
  }
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param DatasetReference
   */
  public function setDatasetReference(DatasetReference $datasetReference)
  {
    $this->datasetReference = $datasetReference;
  }
  /**
   * @return DatasetReference
   */
  public function getDatasetReference()
  {
    return $this->datasetReference;
  }
  public function setDefaultCollation($defaultCollation)
  {
    $this->defaultCollation = $defaultCollation;
  }
  public function getDefaultCollation()
  {
    return $this->defaultCollation;
  }
  /**
   * @param EncryptionConfiguration
   */
  public function setDefaultEncryptionConfiguration(EncryptionConfiguration $defaultEncryptionConfiguration)
  {
    $this->defaultEncryptionConfiguration = $defaultEncryptionConfiguration;
  }
  /**
   * @return EncryptionConfiguration
   */
  public function getDefaultEncryptionConfiguration()
  {
    return $this->defaultEncryptionConfiguration;
  }
  public function setDefaultPartitionExpirationMs($defaultPartitionExpirationMs)
  {
    $this->defaultPartitionExpirationMs = $defaultPartitionExpirationMs;
  }
  public function getDefaultPartitionExpirationMs()
  {
    return $this->defaultPartitionExpirationMs;
  }
  public function setDefaultTableExpirationMs($defaultTableExpirationMs)
  {
    $this->defaultTableExpirationMs = $defaultTableExpirationMs;
  }
  public function getDefaultTableExpirationMs()
  {
    return $this->defaultTableExpirationMs;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setFriendlyName($friendlyName)
  {
    $this->friendlyName = $friendlyName;
  }
  public function getFriendlyName()
  {
    return $this->friendlyName;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setIsCaseInsensitive($isCaseInsensitive)
  {
    $this->isCaseInsensitive = $isCaseInsensitive;
  }
  public function getIsCaseInsensitive()
  {
    return $this->isCaseInsensitive;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }
  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setSatisfiesPZS($satisfiesPZS)
  {
    $this->satisfiesPZS = $satisfiesPZS;
  }
  public function getSatisfiesPZS()
  {
    return $this->satisfiesPZS;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Dataset::class, 'Google_Service_Bigquery_Dataset');
