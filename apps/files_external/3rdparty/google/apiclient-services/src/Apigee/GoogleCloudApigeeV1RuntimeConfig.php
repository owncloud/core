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

class GoogleCloudApigeeV1RuntimeConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $analyticsBucket;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $tenantProjectId;
  /**
   * @var string
   */
  public $traceBucket;

  /**
   * @param string
   */
  public function setAnalyticsBucket($analyticsBucket)
  {
    $this->analyticsBucket = $analyticsBucket;
  }
  /**
   * @return string
   */
  public function getAnalyticsBucket()
  {
    return $this->analyticsBucket;
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
  public function setTenantProjectId($tenantProjectId)
  {
    $this->tenantProjectId = $tenantProjectId;
  }
  /**
   * @return string
   */
  public function getTenantProjectId()
  {
    return $this->tenantProjectId;
  }
  /**
   * @param string
   */
  public function setTraceBucket($traceBucket)
  {
    $this->traceBucket = $traceBucket;
  }
  /**
   * @return string
   */
  public function getTraceBucket()
  {
    return $this->traceBucket;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1RuntimeConfig::class, 'Google_Service_Apigee_GoogleCloudApigeeV1RuntimeConfig');
