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

namespace Google\Service\AdExperienceReport;

class SiteSummaryResponse extends \Google\Model
{
  protected $desktopSummaryType = PlatformSummary::class;
  protected $desktopSummaryDataType = '';
  protected $mobileSummaryType = PlatformSummary::class;
  protected $mobileSummaryDataType = '';
  public $reviewedSite;

  /**
   * @param PlatformSummary
   */
  public function setDesktopSummary(PlatformSummary $desktopSummary)
  {
    $this->desktopSummary = $desktopSummary;
  }
  /**
   * @return PlatformSummary
   */
  public function getDesktopSummary()
  {
    return $this->desktopSummary;
  }
  /**
   * @param PlatformSummary
   */
  public function setMobileSummary(PlatformSummary $mobileSummary)
  {
    $this->mobileSummary = $mobileSummary;
  }
  /**
   * @return PlatformSummary
   */
  public function getMobileSummary()
  {
    return $this->mobileSummary;
  }
  public function setReviewedSite($reviewedSite)
  {
    $this->reviewedSite = $reviewedSite;
  }
  public function getReviewedSite()
  {
    return $this->reviewedSite;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SiteSummaryResponse::class, 'Google_Service_AdExperienceReport_SiteSummaryResponse');
