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

namespace Google\Service\DataCatalog;

class GoogleCloudDatacatalogV1beta1SearchCatalogRequestScope extends \Google\Collection
{
  protected $collection_key = 'restrictedLocations';
  public $includeGcpPublicDatasets;
  public $includeOrgIds;
  public $includeProjectIds;
  public $restrictedLocations;

  public function setIncludeGcpPublicDatasets($includeGcpPublicDatasets)
  {
    $this->includeGcpPublicDatasets = $includeGcpPublicDatasets;
  }
  public function getIncludeGcpPublicDatasets()
  {
    return $this->includeGcpPublicDatasets;
  }
  public function setIncludeOrgIds($includeOrgIds)
  {
    $this->includeOrgIds = $includeOrgIds;
  }
  public function getIncludeOrgIds()
  {
    return $this->includeOrgIds;
  }
  public function setIncludeProjectIds($includeProjectIds)
  {
    $this->includeProjectIds = $includeProjectIds;
  }
  public function getIncludeProjectIds()
  {
    return $this->includeProjectIds;
  }
  public function setRestrictedLocations($restrictedLocations)
  {
    $this->restrictedLocations = $restrictedLocations;
  }
  public function getRestrictedLocations()
  {
    return $this->restrictedLocations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1beta1SearchCatalogRequestScope::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1SearchCatalogRequestScope');
