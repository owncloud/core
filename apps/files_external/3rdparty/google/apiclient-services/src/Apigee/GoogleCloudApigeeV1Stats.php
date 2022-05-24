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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1Stats extends \Google\Collection
{
  protected $collection_key = 'hosts';
  protected $environmentsType = GoogleCloudApigeeV1StatsEnvironmentStats::class;
  protected $environmentsDataType = 'array';
  protected $hostsType = GoogleCloudApigeeV1StatsHostStats::class;
  protected $hostsDataType = 'array';
  protected $metaDataType = GoogleCloudApigeeV1Metadata::class;
  protected $metaDataDataType = '';

  /**
   * @param GoogleCloudApigeeV1StatsEnvironmentStats[]
   */
  public function setEnvironments($environments)
  {
    $this->environments = $environments;
  }
  /**
   * @return GoogleCloudApigeeV1StatsEnvironmentStats[]
   */
  public function getEnvironments()
  {
    return $this->environments;
  }
  /**
   * @param GoogleCloudApigeeV1StatsHostStats[]
   */
  public function setHosts($hosts)
  {
    $this->hosts = $hosts;
  }
  /**
   * @return GoogleCloudApigeeV1StatsHostStats[]
   */
  public function getHosts()
  {
    return $this->hosts;
  }
  /**
   * @param GoogleCloudApigeeV1Metadata
   */
  public function setMetaData(GoogleCloudApigeeV1Metadata $metaData)
  {
    $this->metaData = $metaData;
  }
  /**
   * @return GoogleCloudApigeeV1Metadata
   */
  public function getMetaData()
  {
    return $this->metaData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1Stats::class, 'Google_Service_Apigee_GoogleCloudApigeeV1Stats');
