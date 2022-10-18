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

namespace Google\Service\Contentwarehouse;

class StorageGraphBfgPolicyMetadata extends \Google\Collection
{
  protected $collection_key = 'legalRemovalRegions';
  /**
   * @var string
   */
  public $availabilityEndTimestamp;
  /**
   * @var string
   */
  public $availabilityStartTimestamp;
  protected $legalAllowedRegionsType = KeGovernanceTypedRegions::class;
  protected $legalAllowedRegionsDataType = 'array';
  protected $legalRemovalRegionsType = KeGovernanceTypedRegions::class;
  protected $legalRemovalRegionsDataType = 'array';
  /**
   * @var string
   */
  public $policySourceType;

  /**
   * @param string
   */
  public function setAvailabilityEndTimestamp($availabilityEndTimestamp)
  {
    $this->availabilityEndTimestamp = $availabilityEndTimestamp;
  }
  /**
   * @return string
   */
  public function getAvailabilityEndTimestamp()
  {
    return $this->availabilityEndTimestamp;
  }
  /**
   * @param string
   */
  public function setAvailabilityStartTimestamp($availabilityStartTimestamp)
  {
    $this->availabilityStartTimestamp = $availabilityStartTimestamp;
  }
  /**
   * @return string
   */
  public function getAvailabilityStartTimestamp()
  {
    return $this->availabilityStartTimestamp;
  }
  /**
   * @param KeGovernanceTypedRegions[]
   */
  public function setLegalAllowedRegions($legalAllowedRegions)
  {
    $this->legalAllowedRegions = $legalAllowedRegions;
  }
  /**
   * @return KeGovernanceTypedRegions[]
   */
  public function getLegalAllowedRegions()
  {
    return $this->legalAllowedRegions;
  }
  /**
   * @param KeGovernanceTypedRegions[]
   */
  public function setLegalRemovalRegions($legalRemovalRegions)
  {
    $this->legalRemovalRegions = $legalRemovalRegions;
  }
  /**
   * @return KeGovernanceTypedRegions[]
   */
  public function getLegalRemovalRegions()
  {
    return $this->legalRemovalRegions;
  }
  /**
   * @param string
   */
  public function setPolicySourceType($policySourceType)
  {
    $this->policySourceType = $policySourceType;
  }
  /**
   * @return string
   */
  public function getPolicySourceType()
  {
    return $this->policySourceType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StorageGraphBfgPolicyMetadata::class, 'Google_Service_Contentwarehouse_StorageGraphBfgPolicyMetadata');
