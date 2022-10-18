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

class ContentReportSummary extends \Google\Model
{
  /**
   * @var int
   */
  public $numberReports;
  /**
   * @var int
   */
  public $numberReportsAllRevisions;

  /**
   * @param int
   */
  public function setNumberReports($numberReports)
  {
    $this->numberReports = $numberReports;
  }
  /**
   * @return int
   */
  public function getNumberReports()
  {
    return $this->numberReports;
  }
  /**
   * @param int
   */
  public function setNumberReportsAllRevisions($numberReportsAllRevisions)
  {
    $this->numberReportsAllRevisions = $numberReportsAllRevisions;
  }
  /**
   * @return int
   */
  public function getNumberReportsAllRevisions()
  {
    return $this->numberReportsAllRevisions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContentReportSummary::class, 'Google_Service_CloudSearch_ContentReportSummary');
