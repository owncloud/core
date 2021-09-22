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
  public $analyticsBucket;
  public $name;
  public $tenantProjectId;
  public $traceBucket;

  public function setAnalyticsBucket($analyticsBucket)
  {
    $this->analyticsBucket = $analyticsBucket;
  }
  public function getAnalyticsBucket()
  {
    return $this->analyticsBucket;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setTenantProjectId($tenantProjectId)
  {
    $this->tenantProjectId = $tenantProjectId;
  }
  public function getTenantProjectId()
  {
    return $this->tenantProjectId;
  }
  public function setTraceBucket($traceBucket)
  {
    $this->traceBucket = $traceBucket;
  }
  public function getTraceBucket()
  {
    return $this->traceBucket;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1RuntimeConfig::class, 'Google_Service_Apigee_GoogleCloudApigeeV1RuntimeConfig');
