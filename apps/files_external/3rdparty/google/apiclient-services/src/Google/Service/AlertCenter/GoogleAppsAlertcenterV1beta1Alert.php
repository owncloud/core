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

class Google_Service_AlertCenter_GoogleAppsAlertcenterV1beta1Alert extends Google_Model
{
  public $alertId;
  public $createTime;
  public $customerId;
  public $data;
  public $deleted;
  public $endTime;
  public $etag;
  protected $metadataType = 'Google_Service_AlertCenter_GoogleAppsAlertcenterV1beta1AlertMetadata';
  protected $metadataDataType = '';
  public $securityInvestigationToolLink;
  public $source;
  public $startTime;
  public $type;
  public $updateTime;

  public function setAlertId($alertId)
  {
    $this->alertId = $alertId;
  }
  public function getAlertId()
  {
    return $this->alertId;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCustomerId($customerId)
  {
    $this->customerId = $customerId;
  }
  public function getCustomerId()
  {
    return $this->customerId;
  }
  public function setData($data)
  {
    $this->data = $data;
  }
  public function getData()
  {
    return $this->data;
  }
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  public function getDeleted()
  {
    return $this->deleted;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
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
   * @param Google_Service_AlertCenter_GoogleAppsAlertcenterV1beta1AlertMetadata
   */
  public function setMetadata(Google_Service_AlertCenter_GoogleAppsAlertcenterV1beta1AlertMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_AlertCenter_GoogleAppsAlertcenterV1beta1AlertMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setSecurityInvestigationToolLink($securityInvestigationToolLink)
  {
    $this->securityInvestigationToolLink = $securityInvestigationToolLink;
  }
  public function getSecurityInvestigationToolLink()
  {
    return $this->securityInvestigationToolLink;
  }
  public function setSource($source)
  {
    $this->source = $source;
  }
  public function getSource()
  {
    return $this->source;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
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
