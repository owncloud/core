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

namespace Google\Service\CloudSearch;

class DlpScanSummary extends \Google\Model
{
  /**
   * @var string
   */
  public $scanId;
  /**
   * @var bool
   */
  public $scanNotApplicableForContext;
  /**
   * @var string
   */
  public $scanOutcome;

  /**
   * @param string
   */
  public function setScanId($scanId)
  {
    $this->scanId = $scanId;
  }
  /**
   * @return string
   */
  public function getScanId()
  {
    return $this->scanId;
  }
  /**
   * @param bool
   */
  public function setScanNotApplicableForContext($scanNotApplicableForContext)
  {
    $this->scanNotApplicableForContext = $scanNotApplicableForContext;
  }
  /**
   * @return bool
   */
  public function getScanNotApplicableForContext()
  {
    return $this->scanNotApplicableForContext;
  }
  /**
   * @param string
   */
  public function setScanOutcome($scanOutcome)
  {
    $this->scanOutcome = $scanOutcome;
  }
  /**
   * @return string
   */
  public function getScanOutcome()
  {
    return $this->scanOutcome;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DlpScanSummary::class, 'Google_Service_CloudSearch_DlpScanSummary');
