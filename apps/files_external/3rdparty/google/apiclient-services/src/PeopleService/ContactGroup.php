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

namespace Google\Service\PeopleService;

class ContactGroup extends \Google\Collection
{
  protected $collection_key = 'memberResourceNames';
  protected $clientDataType = GroupClientData::class;
  protected $clientDataDataType = 'array';
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $formattedName;
  /**
   * @var string
   */
  public $groupType;
  /**
   * @var int
   */
  public $memberCount;
  /**
   * @var string[]
   */
  public $memberResourceNames;
  protected $metadataType = ContactGroupMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $resourceName;

  /**
   * @param GroupClientData[]
   */
  public function setClientData($clientData)
  {
    $this->clientData = $clientData;
  }
  /**
   * @return GroupClientData[]
   */
  public function getClientData()
  {
    return $this->clientData;
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
   * @param string
   */
  public function setFormattedName($formattedName)
  {
    $this->formattedName = $formattedName;
  }
  /**
   * @return string
   */
  public function getFormattedName()
  {
    return $this->formattedName;
  }
  /**
   * @param string
   */
  public function setGroupType($groupType)
  {
    $this->groupType = $groupType;
  }
  /**
   * @return string
   */
  public function getGroupType()
  {
    return $this->groupType;
  }
  /**
   * @param int
   */
  public function setMemberCount($memberCount)
  {
    $this->memberCount = $memberCount;
  }
  /**
   * @return int
   */
  public function getMemberCount()
  {
    return $this->memberCount;
  }
  /**
   * @param string[]
   */
  public function setMemberResourceNames($memberResourceNames)
  {
    $this->memberResourceNames = $memberResourceNames;
  }
  /**
   * @return string[]
   */
  public function getMemberResourceNames()
  {
    return $this->memberResourceNames;
  }
  /**
   * @param ContactGroupMetadata
   */
  public function setMetadata(ContactGroupMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return ContactGroupMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
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
   * @param string
   */
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  /**
   * @return string
   */
  public function getResourceName()
  {
    return $this->resourceName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContactGroup::class, 'Google_Service_PeopleService_ContactGroup');
