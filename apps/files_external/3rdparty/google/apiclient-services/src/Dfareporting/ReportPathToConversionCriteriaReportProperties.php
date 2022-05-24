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

namespace Google\Service\Dfareporting;

class ReportPathToConversionCriteriaReportProperties extends \Google\Model
{
  /**
   * @var int
   */
  public $clicksLookbackWindow;
  /**
   * @var int
   */
  public $impressionsLookbackWindow;
  /**
   * @var bool
   */
  public $includeAttributedIPConversions;
  /**
   * @var bool
   */
  public $includeUnattributedCookieConversions;
  /**
   * @var bool
   */
  public $includeUnattributedIPConversions;
  /**
   * @var int
   */
  public $maximumClickInteractions;
  /**
   * @var int
   */
  public $maximumImpressionInteractions;
  /**
   * @var int
   */
  public $maximumInteractionGap;
  /**
   * @var bool
   */
  public $pivotOnInteractionPath;

  /**
   * @param int
   */
  public function setClicksLookbackWindow($clicksLookbackWindow)
  {
    $this->clicksLookbackWindow = $clicksLookbackWindow;
  }
  /**
   * @return int
   */
  public function getClicksLookbackWindow()
  {
    return $this->clicksLookbackWindow;
  }
  /**
   * @param int
   */
  public function setImpressionsLookbackWindow($impressionsLookbackWindow)
  {
    $this->impressionsLookbackWindow = $impressionsLookbackWindow;
  }
  /**
   * @return int
   */
  public function getImpressionsLookbackWindow()
  {
    return $this->impressionsLookbackWindow;
  }
  /**
   * @param bool
   */
  public function setIncludeAttributedIPConversions($includeAttributedIPConversions)
  {
    $this->includeAttributedIPConversions = $includeAttributedIPConversions;
  }
  /**
   * @return bool
   */
  public function getIncludeAttributedIPConversions()
  {
    return $this->includeAttributedIPConversions;
  }
  /**
   * @param bool
   */
  public function setIncludeUnattributedCookieConversions($includeUnattributedCookieConversions)
  {
    $this->includeUnattributedCookieConversions = $includeUnattributedCookieConversions;
  }
  /**
   * @return bool
   */
  public function getIncludeUnattributedCookieConversions()
  {
    return $this->includeUnattributedCookieConversions;
  }
  /**
   * @param bool
   */
  public function setIncludeUnattributedIPConversions($includeUnattributedIPConversions)
  {
    $this->includeUnattributedIPConversions = $includeUnattributedIPConversions;
  }
  /**
   * @return bool
   */
  public function getIncludeUnattributedIPConversions()
  {
    return $this->includeUnattributedIPConversions;
  }
  /**
   * @param int
   */
  public function setMaximumClickInteractions($maximumClickInteractions)
  {
    $this->maximumClickInteractions = $maximumClickInteractions;
  }
  /**
   * @return int
   */
  public function getMaximumClickInteractions()
  {
    return $this->maximumClickInteractions;
  }
  /**
   * @param int
   */
  public function setMaximumImpressionInteractions($maximumImpressionInteractions)
  {
    $this->maximumImpressionInteractions = $maximumImpressionInteractions;
  }
  /**
   * @return int
   */
  public function getMaximumImpressionInteractions()
  {
    return $this->maximumImpressionInteractions;
  }
  /**
   * @param int
   */
  public function setMaximumInteractionGap($maximumInteractionGap)
  {
    $this->maximumInteractionGap = $maximumInteractionGap;
  }
  /**
   * @return int
   */
  public function getMaximumInteractionGap()
  {
    return $this->maximumInteractionGap;
  }
  /**
   * @param bool
   */
  public function setPivotOnInteractionPath($pivotOnInteractionPath)
  {
    $this->pivotOnInteractionPath = $pivotOnInteractionPath;
  }
  /**
   * @return bool
   */
  public function getPivotOnInteractionPath()
  {
    return $this->pivotOnInteractionPath;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportPathToConversionCriteriaReportProperties::class, 'Google_Service_Dfareporting_ReportPathToConversionCriteriaReportProperties');
