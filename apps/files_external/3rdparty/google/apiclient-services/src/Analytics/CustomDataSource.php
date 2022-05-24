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

namespace Google\Service\Analytics;

class CustomDataSource extends \Google\Collection
{
  protected $collection_key = 'schema';
  /**
   * @var string
   */
  public $accountId;
  protected $childLinkType = CustomDataSourceChildLink::class;
  protected $childLinkDataType = '';
  /**
   * @var string
   */
  public $created;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $importBehavior;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  protected $parentLinkType = CustomDataSourceParentLink::class;
  protected $parentLinkDataType = '';
  /**
   * @var string[]
   */
  public $profilesLinked;
  /**
   * @var string[]
   */
  public $schema;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $updated;
  /**
   * @var string
   */
  public $uploadType;
  /**
   * @var string
   */
  public $webPropertyId;

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param CustomDataSourceChildLink
   */
  public function setChildLink(CustomDataSourceChildLink $childLink)
  {
    $this->childLink = $childLink;
  }
  /**
   * @return CustomDataSourceChildLink
   */
  public function getChildLink()
  {
    return $this->childLink;
  }
  /**
   * @param string
   */
  public function setCreated($created)
  {
    $this->created = $created;
  }
  /**
   * @return string
   */
  public function getCreated()
  {
    return $this->created;
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
  public function setImportBehavior($importBehavior)
  {
    $this->importBehavior = $importBehavior;
  }
  /**
   * @return string
   */
  public function getImportBehavior()
  {
    return $this->importBehavior;
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
   * @param CustomDataSourceParentLink
   */
  public function setParentLink(CustomDataSourceParentLink $parentLink)
  {
    $this->parentLink = $parentLink;
  }
  /**
   * @return CustomDataSourceParentLink
   */
  public function getParentLink()
  {
    return $this->parentLink;
  }
  /**
   * @param string[]
   */
  public function setProfilesLinked($profilesLinked)
  {
    $this->profilesLinked = $profilesLinked;
  }
  /**
   * @return string[]
   */
  public function getProfilesLinked()
  {
    return $this->profilesLinked;
  }
  /**
   * @param string[]
   */
  public function setSchema($schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return string[]
   */
  public function getSchema()
  {
    return $this->schema;
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
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
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
   * @param string
   */
  public function setUploadType($uploadType)
  {
    $this->uploadType = $uploadType;
  }
  /**
   * @return string
   */
  public function getUploadType()
  {
    return $this->uploadType;
  }
  /**
   * @param string
   */
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  /**
   * @return string
   */
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomDataSource::class, 'Google_Service_Analytics_CustomDataSource');
