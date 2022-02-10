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

class GoogleCloudDatacatalogV1Taxonomy extends \Google\Collection
{
  protected $collection_key = 'activatedPolicyTypes';
  /**
   * @var string[]
   */
  public $activatedPolicyTypes;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $policyTagCount;
  protected $taxonomyTimestampsType = GoogleCloudDatacatalogV1SystemTimestamps::class;
  protected $taxonomyTimestampsDataType = '';

  /**
   * @param string[]
   */
  public function setActivatedPolicyTypes($activatedPolicyTypes)
  {
    $this->activatedPolicyTypes = $activatedPolicyTypes;
  }
  /**
   * @return string[]
   */
  public function getActivatedPolicyTypes()
  {
    return $this->activatedPolicyTypes;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
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
   * @param int
   */
  public function setPolicyTagCount($policyTagCount)
  {
    $this->policyTagCount = $policyTagCount;
  }
  /**
   * @return int
   */
  public function getPolicyTagCount()
  {
    return $this->policyTagCount;
  }
  /**
   * @param GoogleCloudDatacatalogV1SystemTimestamps
   */
  public function setTaxonomyTimestamps(GoogleCloudDatacatalogV1SystemTimestamps $taxonomyTimestamps)
  {
    $this->taxonomyTimestamps = $taxonomyTimestamps;
  }
  /**
   * @return GoogleCloudDatacatalogV1SystemTimestamps
   */
  public function getTaxonomyTimestamps()
  {
    return $this->taxonomyTimestamps;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1Taxonomy::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1Taxonomy');
