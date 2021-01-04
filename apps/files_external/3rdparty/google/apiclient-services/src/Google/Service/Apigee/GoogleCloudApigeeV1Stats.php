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

class Google_Service_Apigee_GoogleCloudApigeeV1Stats extends Google_Collection
{
  protected $collection_key = 'hosts';
  protected $environmentsType = 'Google_Service_Apigee_GoogleCloudApigeeV1StatsEnvironmentStats';
  protected $environmentsDataType = 'array';
  protected $hostsType = 'Google_Service_Apigee_GoogleCloudApigeeV1StatsHostStats';
  protected $hostsDataType = 'array';
  protected $metaDataType = 'Google_Service_Apigee_GoogleCloudApigeeV1Metadata';
  protected $metaDataDataType = '';

  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1StatsEnvironmentStats[]
   */
  public function setEnvironments($environments)
  {
    $this->environments = $environments;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1StatsEnvironmentStats[]
   */
  public function getEnvironments()
  {
    return $this->environments;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1StatsHostStats[]
   */
  public function setHosts($hosts)
  {
    $this->hosts = $hosts;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1StatsHostStats[]
   */
  public function getHosts()
  {
    return $this->hosts;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Metadata
   */
  public function setMetaData(Google_Service_Apigee_GoogleCloudApigeeV1Metadata $metaData)
  {
    $this->metaData = $metaData;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Metadata
   */
  public function getMetaData()
  {
    return $this->metaData;
  }
}
