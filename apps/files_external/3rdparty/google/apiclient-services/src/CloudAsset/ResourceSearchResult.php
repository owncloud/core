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

namespace Google\Service\CloudAsset;

class ResourceSearchResult extends \Google\Collection
{
  protected $collection_key = 'versionedResources';
  /**
   * @var array[]
   */
  public $additionalAttributes;
  /**
   * @var string
   */
  public $assetType;
  protected $attachedResourcesType = AttachedResource::class;
  protected $attachedResourcesDataType = 'array';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string[]
   */
  public $folders;
  /**
   * @var string
   */
  public $kmsKey;
  /**
   * @var string[]
   */
  public $kmsKeys;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $location;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $networkTags;
  /**
   * @var string
   */
  public $organization;
  /**
   * @var string
   */
  public $parentAssetType;
  /**
   * @var string
   */
  public $parentFullResourceName;
  /**
   * @var string
   */
  public $project;
  protected $relationshipsType = RelatedResources::class;
  protected $relationshipsDataType = 'map';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string[]
   */
  public $tagKeys;
  /**
   * @var string[]
   */
  public $tagValueIds;
  /**
   * @var string[]
   */
  public $tagValues;
  /**
   * @var string
   */
  public $updateTime;
  protected $versionedResourcesType = VersionedResource::class;
  protected $versionedResourcesDataType = 'array';

  /**
   * @param array[]
   */
  public function setAdditionalAttributes($additionalAttributes)
  {
    $this->additionalAttributes = $additionalAttributes;
  }
  /**
   * @return array[]
   */
  public function getAdditionalAttributes()
  {
    return $this->additionalAttributes;
  }
  /**
   * @param string
   */
  public function setAssetType($assetType)
  {
    $this->assetType = $assetType;
  }
  /**
   * @return string
   */
  public function getAssetType()
  {
    return $this->assetType;
  }
  /**
   * @param AttachedResource[]
   */
  public function setAttachedResources($attachedResources)
  {
    $this->attachedResources = $attachedResources;
  }
  /**
   * @return AttachedResource[]
   */
  public function getAttachedResources()
  {
    return $this->attachedResources;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string[]
   */
  public function setFolders($folders)
  {
    $this->folders = $folders;
  }
  /**
   * @return string[]
   */
  public function getFolders()
  {
    return $this->folders;
  }
  /**
   * @param string
   */
  public function setKmsKey($kmsKey)
  {
    $this->kmsKey = $kmsKey;
  }
  /**
   * @return string
   */
  public function getKmsKey()
  {
    return $this->kmsKey;
  }
  /**
   * @param string[]
   */
  public function setKmsKeys($kmsKeys)
  {
    $this->kmsKeys = $kmsKeys;
  }
  /**
   * @return string[]
   */
  public function getKmsKeys()
  {
    return $this->kmsKeys;
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
   * @param string[]
   */
  public function setNetworkTags($networkTags)
  {
    $this->networkTags = $networkTags;
  }
  /**
   * @return string[]
   */
  public function getNetworkTags()
  {
    return $this->networkTags;
  }
  /**
   * @param string
   */
  public function setOrganization($organization)
  {
    $this->organization = $organization;
  }
  /**
   * @return string
   */
  public function getOrganization()
  {
    return $this->organization;
  }
  /**
   * @param string
   */
  public function setParentAssetType($parentAssetType)
  {
    $this->parentAssetType = $parentAssetType;
  }
  /**
   * @return string
   */
  public function getParentAssetType()
  {
    return $this->parentAssetType;
  }
  /**
   * @param string
   */
  public function setParentFullResourceName($parentFullResourceName)
  {
    $this->parentFullResourceName = $parentFullResourceName;
  }
  /**
   * @return string
   */
  public function getParentFullResourceName()
  {
    return $this->parentFullResourceName;
  }
  /**
   * @param string
   */
  public function setProject($project)
  {
    $this->project = $project;
  }
  /**
   * @return string
   */
  public function getProject()
  {
    return $this->project;
  }
  /**
   * @param RelatedResources[]
   */
  public function setRelationships($relationships)
  {
    $this->relationships = $relationships;
  }
  /**
   * @return RelatedResources[]
   */
  public function getRelationships()
  {
    return $this->relationships;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string[]
   */
  public function setTagKeys($tagKeys)
  {
    $this->tagKeys = $tagKeys;
  }
  /**
   * @return string[]
   */
  public function getTagKeys()
  {
    return $this->tagKeys;
  }
  /**
   * @param string[]
   */
  public function setTagValueIds($tagValueIds)
  {
    $this->tagValueIds = $tagValueIds;
  }
  /**
   * @return string[]
   */
  public function getTagValueIds()
  {
    return $this->tagValueIds;
  }
  /**
   * @param string[]
   */
  public function setTagValues($tagValues)
  {
    $this->tagValues = $tagValues;
  }
  /**
   * @return string[]
   */
  public function getTagValues()
  {
    return $this->tagValues;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param VersionedResource[]
   */
  public function setVersionedResources($versionedResources)
  {
    $this->versionedResources = $versionedResources;
  }
  /**
   * @return VersionedResource[]
   */
  public function getVersionedResources()
  {
    return $this->versionedResources;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResourceSearchResult::class, 'Google_Service_CloudAsset_ResourceSearchResult');
