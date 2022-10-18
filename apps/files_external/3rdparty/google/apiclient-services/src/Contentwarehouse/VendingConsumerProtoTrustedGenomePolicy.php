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

class VendingConsumerProtoTrustedGenomePolicy extends \Google\Collection
{
  protected $collection_key = 'targetRegion';
  /**
   * @var string
   */
  public $localizedRegionOverride;
  /**
   * @var string[]
   */
  public $policyType;
  protected $targetRegionType = VendingConsumerProtoTrustedGenomePolicyTargetRegion::class;
  protected $targetRegionDataType = 'array';

  /**
   * @param string
   */
  public function setLocalizedRegionOverride($localizedRegionOverride)
  {
    $this->localizedRegionOverride = $localizedRegionOverride;
  }
  /**
   * @return string
   */
  public function getLocalizedRegionOverride()
  {
    return $this->localizedRegionOverride;
  }
  /**
   * @param string[]
   */
  public function setPolicyType($policyType)
  {
    $this->policyType = $policyType;
  }
  /**
   * @return string[]
   */
  public function getPolicyType()
  {
    return $this->policyType;
  }
  /**
   * @param VendingConsumerProtoTrustedGenomePolicyTargetRegion[]
   */
  public function setTargetRegion($targetRegion)
  {
    $this->targetRegion = $targetRegion;
  }
  /**
   * @return VendingConsumerProtoTrustedGenomePolicyTargetRegion[]
   */
  public function getTargetRegion()
  {
    return $this->targetRegion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VendingConsumerProtoTrustedGenomePolicy::class, 'Google_Service_Contentwarehouse_VendingConsumerProtoTrustedGenomePolicy');
