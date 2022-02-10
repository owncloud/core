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

namespace Google\Service\ShoppingContent;

class FreeListingsProgramStatusRegionStatus extends \Google\Collection
{
  protected $collection_key = 'reviewIssues';
  /**
   * @var string
   */
  public $disapprovalDate;
  /**
   * @var string
   */
  public $eligibilityStatus;
  /**
   * @var string
   */
  public $enhancedEligibilityStatus;
  /**
   * @var string
   */
  public $ineligibilityReason;
  /**
   * @var string[]
   */
  public $regionCodes;
  /**
   * @var string
   */
  public $reviewEligibilityStatus;
  /**
   * @var string[]
   */
  public $reviewIssues;

  /**
   * @param string
   */
  public function setDisapprovalDate($disapprovalDate)
  {
    $this->disapprovalDate = $disapprovalDate;
  }
  /**
   * @return string
   */
  public function getDisapprovalDate()
  {
    return $this->disapprovalDate;
  }
  /**
   * @param string
   */
  public function setEligibilityStatus($eligibilityStatus)
  {
    $this->eligibilityStatus = $eligibilityStatus;
  }
  /**
   * @return string
   */
  public function getEligibilityStatus()
  {
    return $this->eligibilityStatus;
  }
  /**
   * @param string
   */
  public function setEnhancedEligibilityStatus($enhancedEligibilityStatus)
  {
    $this->enhancedEligibilityStatus = $enhancedEligibilityStatus;
  }
  /**
   * @return string
   */
  public function getEnhancedEligibilityStatus()
  {
    return $this->enhancedEligibilityStatus;
  }
  /**
   * @param string
   */
  public function setIneligibilityReason($ineligibilityReason)
  {
    $this->ineligibilityReason = $ineligibilityReason;
  }
  /**
   * @return string
   */
  public function getIneligibilityReason()
  {
    return $this->ineligibilityReason;
  }
  /**
   * @param string[]
   */
  public function setRegionCodes($regionCodes)
  {
    $this->regionCodes = $regionCodes;
  }
  /**
   * @return string[]
   */
  public function getRegionCodes()
  {
    return $this->regionCodes;
  }
  /**
   * @param string
   */
  public function setReviewEligibilityStatus($reviewEligibilityStatus)
  {
    $this->reviewEligibilityStatus = $reviewEligibilityStatus;
  }
  /**
   * @return string
   */
  public function getReviewEligibilityStatus()
  {
    return $this->reviewEligibilityStatus;
  }
  /**
   * @param string[]
   */
  public function setReviewIssues($reviewIssues)
  {
    $this->reviewIssues = $reviewIssues;
  }
  /**
   * @return string[]
   */
  public function getReviewIssues()
  {
    return $this->reviewIssues;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FreeListingsProgramStatusRegionStatus::class, 'Google_Service_ShoppingContent_FreeListingsProgramStatusRegionStatus');
