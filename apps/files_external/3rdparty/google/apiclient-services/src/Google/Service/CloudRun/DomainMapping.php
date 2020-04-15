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

class Google_Service_CloudRun_DomainMapping extends Google_Model
{
  public $apiVersion;
  public $kind;
  protected $metadataType = 'Google_Service_CloudRun_ObjectMeta';
  protected $metadataDataType = '';
  protected $specType = 'Google_Service_CloudRun_DomainMappingSpec';
  protected $specDataType = '';
  protected $statusType = 'Google_Service_CloudRun_DomainMappingStatus';
  protected $statusDataType = '';

  public function setApiVersion($apiVersion)
  {
    $this->apiVersion = $apiVersion;
  }
  public function getApiVersion()
  {
    return $this->apiVersion;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_CloudRun_ObjectMeta
   */
  public function setMetadata(Google_Service_CloudRun_ObjectMeta $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_CloudRun_ObjectMeta
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param Google_Service_CloudRun_DomainMappingSpec
   */
  public function setSpec(Google_Service_CloudRun_DomainMappingSpec $spec)
  {
    $this->spec = $spec;
  }
  /**
   * @return Google_Service_CloudRun_DomainMappingSpec
   */
  public function getSpec()
  {
    return $this->spec;
  }
  /**
   * @param Google_Service_CloudRun_DomainMappingStatus
   */
  public function setStatus(Google_Service_CloudRun_DomainMappingStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_CloudRun_DomainMappingStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}
