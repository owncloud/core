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

class GoogleCloudDatacatalogV1SearchCatalogRequestScope extends \Google\Collection
{
  protected $collection_key = 'restrictedLocations';
  /**
   * @var bool
   */
  public $includeGcpPublicDatasets;
  /**
   * @var string[]
   */
  public $includeOrgIds;
  /**
   * @var string[]
   */
  public $includeProjectIds;
  /**
   * @var bool
   */
  public $includePublicTagTemplates;
  /**
   * @var string[]
   */
  public $restrictedLocations;
  /**
   * @var bool
   */
  public $starredOnly;

  /**
   * @param bool
   */
  public function setIncludeGcpPublicDatasets($includeGcpPublicDatasets)
  {
    $this->includeGcpPublicDatasets = $includeGcpPublicDatasets;
  }
  /**
   * @return bool
   */
  public function getIncludeGcpPublicDatasets()
  {
    return $this->includeGcpPublicDatasets;
  }
  /**
   * @param string[]
   */
  public function setIncludeOrgIds($includeOrgIds)
  {
    $this->includeOrgIds = $includeOrgIds;
  }
  /**
   * @return string[]
   */
  public function getIncludeOrgIds()
  {
    return $this->includeOrgIds;
  }
  /**
   * @param string[]
   */
  public function setIncludeProjectIds($includeProjectIds)
  {
    $this->includeProjectIds = $includeProjectIds;
  }
  /**
   * @return string[]
   */
  public function getIncludeProjectIds()
  {
    return $this->includeProjectIds;
  }
  /**
   * @param bool
   */
  public function setIncludePublicTagTemplates($includePublicTagTemplates)
  {
    $this->includePublicTagTemplates = $includePublicTagTemplates;
  }
  /**
   * @return bool
   */
  public function getIncludePublicTagTemplates()
  {
    return $this->includePublicTagTemplates;
  }
  /**
   * @param string[]
   */
  public function setRestrictedLocations($restrictedLocations)
  {
    $this->restrictedLocations = $restrictedLocations;
  }
  /**
   * @return string[]
   */
  public function getRestrictedLocations()
  {
    return $this->restrictedLocations;
  }
  /**
   * @param bool
   */
  public function setStarredOnly($starredOnly)
  {
    $this->starredOnly = $starredOnly;
  }
  /**
   * @return bool
   */
  public function getStarredOnly()
  {
    return $this->starredOnly;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1SearchCatalogRequestScope::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1SearchCatalogRequestScope');
