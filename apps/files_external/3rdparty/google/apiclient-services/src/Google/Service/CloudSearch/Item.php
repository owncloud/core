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

class Google_Service_CloudSearch_Item extends Google_Model
{
  protected $aclType = 'Google_Service_CloudSearch_ItemAcl';
  protected $aclDataType = '';
  protected $contentType = 'Google_Service_CloudSearch_ItemContent';
  protected $contentDataType = '';
  public $itemType;
  protected $metadataType = 'Google_Service_CloudSearch_ItemMetadata';
  protected $metadataDataType = '';
  public $name;
  public $payload;
  public $queue;
  protected $statusType = 'Google_Service_CloudSearch_ItemStatus';
  protected $statusDataType = '';
  protected $structuredDataType = 'Google_Service_CloudSearch_ItemStructuredData';
  protected $structuredDataDataType = '';
  public $version;

  /**
   * @param Google_Service_CloudSearch_ItemAcl
   */
  public function setAcl(Google_Service_CloudSearch_ItemAcl $acl)
  {
    $this->acl = $acl;
  }
  /**
   * @return Google_Service_CloudSearch_ItemAcl
   */
  public function getAcl()
  {
    return $this->acl;
  }
  /**
   * @param Google_Service_CloudSearch_ItemContent
   */
  public function setContent(Google_Service_CloudSearch_ItemContent $content)
  {
    $this->content = $content;
  }
  /**
   * @return Google_Service_CloudSearch_ItemContent
   */
  public function getContent()
  {
    return $this->content;
  }
  public function setItemType($itemType)
  {
    $this->itemType = $itemType;
  }
  public function getItemType()
  {
    return $this->itemType;
  }
  /**
   * @param Google_Service_CloudSearch_ItemMetadata
   */
  public function setMetadata(Google_Service_CloudSearch_ItemMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_CloudSearch_ItemMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPayload($payload)
  {
    $this->payload = $payload;
  }
  public function getPayload()
  {
    return $this->payload;
  }
  public function setQueue($queue)
  {
    $this->queue = $queue;
  }
  public function getQueue()
  {
    return $this->queue;
  }
  /**
   * @param Google_Service_CloudSearch_ItemStatus
   */
  public function setStatus(Google_Service_CloudSearch_ItemStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_CloudSearch_ItemStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param Google_Service_CloudSearch_ItemStructuredData
   */
  public function setStructuredData(Google_Service_CloudSearch_ItemStructuredData $structuredData)
  {
    $this->structuredData = $structuredData;
  }
  /**
   * @return Google_Service_CloudSearch_ItemStructuredData
   */
  public function getStructuredData()
  {
    return $this->structuredData;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
