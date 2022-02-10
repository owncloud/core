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

namespace Google\Service\AuthorizedBuyersMarketplace;

class CreativeRequirements extends \Google\Model
{
  /**
   * @var string
   */
  public $creativePreApprovalPolicy;
  /**
   * @var string
   */
  public $creativeSafeFrameCompatibility;
  /**
   * @var string
   */
  public $programmaticCreativeSource;

  /**
   * @param string
   */
  public function setCreativePreApprovalPolicy($creativePreApprovalPolicy)
  {
    $this->creativePreApprovalPolicy = $creativePreApprovalPolicy;
  }
  /**
   * @return string
   */
  public function getCreativePreApprovalPolicy()
  {
    return $this->creativePreApprovalPolicy;
  }
  /**
   * @param string
   */
  public function setCreativeSafeFrameCompatibility($creativeSafeFrameCompatibility)
  {
    $this->creativeSafeFrameCompatibility = $creativeSafeFrameCompatibility;
  }
  /**
   * @return string
   */
  public function getCreativeSafeFrameCompatibility()
  {
    return $this->creativeSafeFrameCompatibility;
  }
  /**
   * @param string
   */
  public function setProgrammaticCreativeSource($programmaticCreativeSource)
  {
    $this->programmaticCreativeSource = $programmaticCreativeSource;
  }
  /**
   * @return string
   */
  public function getProgrammaticCreativeSource()
  {
    return $this->programmaticCreativeSource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeRequirements::class, 'Google_Service_AuthorizedBuyersMarketplace_CreativeRequirements');
