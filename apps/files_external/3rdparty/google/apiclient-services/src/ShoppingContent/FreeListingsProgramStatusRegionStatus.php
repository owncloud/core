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
  public $disapprovalDate;
  public $eligibilityStatus;
  public $enhancedEligibilityStatus;
  public $ineligibilityReason;
  public $regionCodes;
  public $reviewEligibilityStatus;
  public $reviewIssues;

  public function setDisapprovalDate($disapprovalDate)
  {
    $this->disapprovalDate = $disapprovalDate;
  }
  public function getDisapprovalDate()
  {
    return $this->disapprovalDate;
  }
  public function setEligibilityStatus($eligibilityStatus)
  {
    $this->eligibilityStatus = $eligibilityStatus;
  }
  public function getEligibilityStatus()
  {
    return $this->eligibilityStatus;
  }
  public function setEnhancedEligibilityStatus($enhancedEligibilityStatus)
  {
    $this->enhancedEligibilityStatus = $enhancedEligibilityStatus;
  }
  public function getEnhancedEligibilityStatus()
  {
    return $this->enhancedEligibilityStatus;
  }
  public function setIneligibilityReason($ineligibilityReason)
  {
    $this->ineligibilityReason = $ineligibilityReason;
  }
  public function getIneligibilityReason()
  {
    return $this->ineligibilityReason;
  }
  public function setRegionCodes($regionCodes)
  {
    $this->regionCodes = $regionCodes;
  }
  public function getRegionCodes()
  {
    return $this->regionCodes;
  }
  public function setReviewEligibilityStatus($reviewEligibilityStatus)
  {
    $this->reviewEligibilityStatus = $reviewEligibilityStatus;
  }
  public function getReviewEligibilityStatus()
  {
    return $this->reviewEligibilityStatus;
  }
  public function setReviewIssues($reviewIssues)
  {
    $this->reviewIssues = $reviewIssues;
  }
  public function getReviewIssues()
  {
    return $this->reviewIssues;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FreeListingsProgramStatusRegionStatus::class, 'Google_Service_ShoppingContent_FreeListingsProgramStatusRegionStatus');
