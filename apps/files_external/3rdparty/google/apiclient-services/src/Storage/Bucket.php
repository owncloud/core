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

namespace Google\Service\Storage;

class Bucket extends \Google\Collection
{
  protected $collection_key = 'defaultObjectAcl';
  protected $aclType = BucketAccessControl::class;
  protected $aclDataType = 'array';
  protected $billingType = BucketBilling::class;
  protected $billingDataType = '';
  protected $corsType = BucketCors::class;
  protected $corsDataType = 'array';
  protected $customPlacementConfigType = BucketCustomPlacementConfig::class;
  protected $customPlacementConfigDataType = '';
  public $defaultEventBasedHold;
  protected $defaultObjectAclType = ObjectAccessControl::class;
  protected $defaultObjectAclDataType = 'array';
  protected $encryptionType = BucketEncryption::class;
  protected $encryptionDataType = '';
  public $etag;
  protected $iamConfigurationType = BucketIamConfiguration::class;
  protected $iamConfigurationDataType = '';
  public $id;
  public $kind;
  public $labels;
  protected $lifecycleType = BucketLifecycle::class;
  protected $lifecycleDataType = '';
  public $location;
  public $locationType;
  protected $loggingType = BucketLogging::class;
  protected $loggingDataType = '';
  public $metageneration;
  public $name;
  protected $ownerType = BucketOwner::class;
  protected $ownerDataType = '';
  public $projectNumber;
  protected $retentionPolicyType = BucketRetentionPolicy::class;
  protected $retentionPolicyDataType = '';
  public $rpo;
  public $satisfiesPZS;
  public $selfLink;
  public $storageClass;
  public $timeCreated;
  public $updated;
  protected $versioningType = BucketVersioning::class;
  protected $versioningDataType = '';
  protected $websiteType = BucketWebsite::class;
  protected $websiteDataType = '';

  /**
   * @param BucketAccessControl[]
   */
  public function setAcl($acl)
  {
    $this->acl = $acl;
  }
  /**
   * @return BucketAccessControl[]
   */
  public function getAcl()
  {
    return $this->acl;
  }
  /**
   * @param BucketBilling
   */
  public function setBilling(BucketBilling $billing)
  {
    $this->billing = $billing;
  }
  /**
   * @return BucketBilling
   */
  public function getBilling()
  {
    return $this->billing;
  }
  /**
   * @param BucketCors[]
   */
  public function setCors($cors)
  {
    $this->cors = $cors;
  }
  /**
   * @return BucketCors[]
   */
  public function getCors()
  {
    return $this->cors;
  }
  /**
   * @param BucketCustomPlacementConfig
   */
  public function setCustomPlacementConfig(BucketCustomPlacementConfig $customPlacementConfig)
  {
    $this->customPlacementConfig = $customPlacementConfig;
  }
  /**
   * @return BucketCustomPlacementConfig
   */
  public function getCustomPlacementConfig()
  {
    return $this->customPlacementConfig;
  }
  public function setDefaultEventBasedHold($defaultEventBasedHold)
  {
    $this->defaultEventBasedHold = $defaultEventBasedHold;
  }
  public function getDefaultEventBasedHold()
  {
    return $this->defaultEventBasedHold;
  }
  /**
   * @param ObjectAccessControl[]
   */
  public function setDefaultObjectAcl($defaultObjectAcl)
  {
    $this->defaultObjectAcl = $defaultObjectAcl;
  }
  /**
   * @return ObjectAccessControl[]
   */
  public function getDefaultObjectAcl()
  {
    return $this->defaultObjectAcl;
  }
  /**
   * @param BucketEncryption
   */
  public function setEncryption(BucketEncryption $encryption)
  {
    $this->encryption = $encryption;
  }
  /**
   * @return BucketEncryption
   */
  public function getEncryption()
  {
    return $this->encryption;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param BucketIamConfiguration
   */
  public function setIamConfiguration(BucketIamConfiguration $iamConfiguration)
  {
    $this->iamConfiguration = $iamConfiguration;
  }
  /**
   * @return BucketIamConfiguration
   */
  public function getIamConfiguration()
  {
    return $this->iamConfiguration;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
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
  /**
   * @param BucketLifecycle
   */
  public function setLifecycle(BucketLifecycle $lifecycle)
  {
    $this->lifecycle = $lifecycle;
  }
  /**
   * @return BucketLifecycle
   */
  public function getLifecycle()
  {
    return $this->lifecycle;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setLocationType($locationType)
  {
    $this->locationType = $locationType;
  }
  public function getLocationType()
  {
    return $this->locationType;
  }
  /**
   * @param BucketLogging
   */
  public function setLogging(BucketLogging $logging)
  {
    $this->logging = $logging;
  }
  /**
   * @return BucketLogging
   */
  public function getLogging()
  {
    return $this->logging;
  }
  public function setMetageneration($metageneration)
  {
    $this->metageneration = $metageneration;
  }
  public function getMetageneration()
  {
    return $this->metageneration;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param BucketOwner
   */
  public function setOwner(BucketOwner $owner)
  {
    $this->owner = $owner;
  }
  /**
   * @return BucketOwner
   */
  public function getOwner()
  {
    return $this->owner;
  }
  public function setProjectNumber($projectNumber)
  {
    $this->projectNumber = $projectNumber;
  }
  public function getProjectNumber()
  {
    return $this->projectNumber;
  }
  /**
   * @param BucketRetentionPolicy
   */
  public function setRetentionPolicy(BucketRetentionPolicy $retentionPolicy)
  {
    $this->retentionPolicy = $retentionPolicy;
  }
  /**
   * @return BucketRetentionPolicy
   */
  public function getRetentionPolicy()
  {
    return $this->retentionPolicy;
  }
  public function setRpo($rpo)
  {
    $this->rpo = $rpo;
  }
  public function getRpo()
  {
    return $this->rpo;
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
  public function setStorageClass($storageClass)
  {
    $this->storageClass = $storageClass;
  }
  public function getStorageClass()
  {
    return $this->storageClass;
  }
  public function setTimeCreated($timeCreated)
  {
    $this->timeCreated = $timeCreated;
  }
  public function getTimeCreated()
  {
    return $this->timeCreated;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  /**
   * @param BucketVersioning
   */
  public function setVersioning(BucketVersioning $versioning)
  {
    $this->versioning = $versioning;
  }
  /**
   * @return BucketVersioning
   */
  public function getVersioning()
  {
    return $this->versioning;
  }
  /**
   * @param BucketWebsite
   */
  public function setWebsite(BucketWebsite $website)
  {
    $this->website = $website;
  }
  /**
   * @return BucketWebsite
   */
  public function getWebsite()
  {
    return $this->website;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Bucket::class, 'Google_Service_Storage_Bucket');
