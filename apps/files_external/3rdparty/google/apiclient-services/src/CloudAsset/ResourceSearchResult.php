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
  public $additionalAttributes;
  public $assetType;
  protected $attachedResourcesType = AttachedResource::class;
  protected $attachedResourcesDataType = 'array';
  public $createTime;
  public $description;
  public $displayName;
  public $folders;
  public $kmsKey;
  public $labels;
  public $location;
  public $name;
  public $networkTags;
  public $organization;
  public $parentAssetType;
  public $parentFullResourceName;
  public $project;
  protected $relationshipsType = RelatedResources::class;
  protected $relationshipsDataType = 'map';
  public $state;
  public $updateTime;
  protected $versionedResourcesType = VersionedResource::class;
  protected $versionedResourcesDataType = 'array';

  public function setAdditionalAttributes($additionalAttributes)
  {
    $this->additionalAttributes = $additionalAttributes;
  }
  public function getAdditionalAttributes()
  {
    return $this->additionalAttributes;
  }
  public function setAssetType($assetType)
  {
    $this->assetType = $assetType;
  }
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
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setFolders($folders)
  {
    $this->folders = $folders;
  }
  public function getFolders()
  {
    return $this->folders;
  }
  public function setKmsKey($kmsKey)
  {
    $this->kmsKey = $kmsKey;
  }
  public function getKmsKey()
  {
    return $this->kmsKey;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNetworkTags($networkTags)
  {
    $this->networkTags = $networkTags;
  }
  public function getNetworkTags()
  {
    return $this->networkTags;
  }
  public function setOrganization($organization)
  {
    $this->organization = $organization;
  }
  public function getOrganization()
  {
    return $this->organization;
  }
  public function setParentAssetType($parentAssetType)
  {
    $this->parentAssetType = $parentAssetType;
  }
  public function getParentAssetType()
  {
    return $this->parentAssetType;
  }
  public function setParentFullResourceName($parentFullResourceName)
  {
    $this->parentFullResourceName = $parentFullResourceName;
  }
  public function getParentFullResourceName()
  {
    return $this->parentFullResourceName;
  }
  public function setProject($project)
  {
    $this->project = $project;
  }
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
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
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
