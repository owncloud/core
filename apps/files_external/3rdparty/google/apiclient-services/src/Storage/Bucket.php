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
  protected $autoclassType = BucketAutoclass::class;
  protected $autoclassDataType = '';
  protected $billingType = BucketBilling::class;
  protected $billingDataType = '';
  protected $corsType = BucketCors::class;
  protected $corsDataType = 'array';
  /**
   * @var bool
   */
  public $defaultEventBasedHold;
  protected $defaultObjectAclType = ObjectAccessControl::class;
  protected $defaultObjectAclDataType = 'array';
  protected $encryptionType = BucketEncryption::class;
  protected $encryptionDataType = '';
  /**
   * @var string
   */
  public $etag;
  protected $iamConfigurationType = BucketIamConfiguration::class;
  protected $iamConfigurationDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string[]
   */
  public $labels;
  protected $lifecycleType = BucketLifecycle::class;
  protected $lifecycleDataType = '';
  /**
   * @var string
   */
  public $location;
  /**
   * @var string
   */
  public $locationType;
  protected $loggingType = BucketLogging::class;
  protected $loggingDataType = '';
  /**
   * @var string
   */
  public $metageneration;
  /**
   * @var string
   */
  public $name;
  protected $ownerType = BucketOwner::class;
  protected $ownerDataType = '';
  /**
   * @var string
   */
  public $projectNumber;
  protected $retentionPolicyType = BucketRetentionPolicy::class;
  protected $retentionPolicyDataType = '';
  /**
   * @var string
   */
  public $rpo;
  /**
   * @var bool
   */
  public $satisfiesPZS;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $storageClass;
  /**
   * @var string
   */
  public $timeCreated;
  /**
   * @var string
   */
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
   * @param BucketAutoclass
   */
  public function setAutoclass(BucketAutoclass $autoclass)
  {
    $this->autoclass = $autoclass;
  }
  /**
   * @return BucketAutoclass
   */
  public function getAutoclass()
  {
    return $this->autoclass;
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
   * @param bool
   */
  public function setDefaultEventBasedHold($defaultEventBasedHold)
  {
    $this->defaultEventBasedHold = $defaultEventBasedHold;
  }
  /**
   * @return bool
   */
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
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param string
   */
  public function setLocationType($locationType)
  {
    $this->locationType = $locationType;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setMetageneration($metageneration)
  {
    $this->metageneration = $metageneration;
  }
  /**
   * @return string
   */
  public function getMetageneration()
  {
    return $this->metageneration;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setProjectNumber($projectNumber)
  {
    $this->projectNumber = $projectNumber;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setRpo($rpo)
  {
    $this->rpo = $rpo;
  }
  /**
   * @return string
   */
  public function getRpo()
  {
    return $this->rpo;
  }
  /**
   * @param bool
   */
  public function setSatisfiesPZS($satisfiesPZS)
  {
    $this->satisfiesPZS = $satisfiesPZS;
  }
  /**
   * @return bool
   */
  public function getSatisfiesPZS()
  {
    return $this->satisfiesPZS;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param string
   */
  public function setStorageClass($storageClass)
  {
    $this->storageClass = $storageClass;
  }
  /**
   * @return string
   */
  public function getStorageClass()
  {
    return $this->storageClass;
  }
  /**
   * @param string
   */
  public function setTimeCreated($timeCreated)
  {
    $this->timeCreated = $timeCreated;
  }
  /**
   * @return string
   */
  public function getTimeCreated()
  {
    return $this->timeCreated;
  }
  /**
   * @param string
   */
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  /**
   * @return string
   */
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
