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

class GoogleCloudDatacatalogV1beta1Taxonomy extends \Google\Collection
{
  protected $collection_key = 'activatedPolicyTypes';
  public $activatedPolicyTypes;
  public $description;
  public $displayName;
  public $name;
  public $policyTagCount;
  protected $taxonomyTimestampsType = GoogleCloudDatacatalogV1beta1SystemTimestamps::class;
  protected $taxonomyTimestampsDataType = '';

  public function setActivatedPolicyTypes($activatedPolicyTypes)
  {
    $this->activatedPolicyTypes = $activatedPolicyTypes;
  }
  public function getActivatedPolicyTypes()
  {
    return $this->activatedPolicyTypes;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPolicyTagCount($policyTagCount)
  {
    $this->policyTagCount = $policyTagCount;
  }
  public function getPolicyTagCount()
  {
    return $this->policyTagCount;
  }
  /**
   * @param GoogleCloudDatacatalogV1beta1SystemTimestamps
   */
  public function setTaxonomyTimestamps(GoogleCloudDatacatalogV1beta1SystemTimestamps $taxonomyTimestamps)
  {
    $this->taxonomyTimestamps = $taxonomyTimestamps;
  }
  /**
   * @return GoogleCloudDatacatalogV1beta1SystemTimestamps
   */
  public function getTaxonomyTimestamps()
  {
    return $this->taxonomyTimestamps;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1beta1Taxonomy::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Taxonomy');
