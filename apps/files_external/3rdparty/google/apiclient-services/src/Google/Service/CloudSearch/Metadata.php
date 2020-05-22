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

class Google_Service_CloudSearch_Metadata extends Google_Collection
{
  protected $collection_key = 'fields';
  public $createTime;
  protected $displayOptionsType = 'Google_Service_CloudSearch_ResultDisplayMetadata';
  protected $displayOptionsDataType = '';
  protected $fieldsType = 'Google_Service_CloudSearch_NamedProperty';
  protected $fieldsDataType = 'array';
  public $mimeType;
  public $objectType;
  protected $ownerType = 'Google_Service_CloudSearch_Person';
  protected $ownerDataType = '';
  protected $sourceType = 'Google_Service_CloudSearch_Source';
  protected $sourceDataType = '';
  public $updateTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param Google_Service_CloudSearch_ResultDisplayMetadata
   */
  public function setDisplayOptions(Google_Service_CloudSearch_ResultDisplayMetadata $displayOptions)
  {
    $this->displayOptions = $displayOptions;
  }
  /**
   * @return Google_Service_CloudSearch_ResultDisplayMetadata
   */
  public function getDisplayOptions()
  {
    return $this->displayOptions;
  }
  /**
   * @param Google_Service_CloudSearch_NamedProperty
   */
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  /**
   * @return Google_Service_CloudSearch_NamedProperty
   */
  public function getFields()
  {
    return $this->fields;
  }
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  public function getMimeType()
  {
    return $this->mimeType;
  }
  public function setObjectType($objectType)
  {
    $this->objectType = $objectType;
  }
  public function getObjectType()
  {
    return $this->objectType;
  }
  /**
   * @param Google_Service_CloudSearch_Person
   */
  public function setOwner(Google_Service_CloudSearch_Person $owner)
  {
    $this->owner = $owner;
  }
  /**
   * @return Google_Service_CloudSearch_Person
   */
  public function getOwner()
  {
    return $this->owner;
  }
  /**
   * @param Google_Service_CloudSearch_Source
   */
  public function setSource(Google_Service_CloudSearch_Source $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_CloudSearch_Source
   */
  public function getSource()
  {
    return $this->source;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
