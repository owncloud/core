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

namespace Google\Service\Doubleclicksearch;

class ReportApiColumnSpec extends \Google\Model
{
  /**
   * @var string
   */
  public $columnName;
  /**
   * @var string
   */
  public $customDimensionName;
  /**
   * @var string
   */
  public $customMetricName;
  /**
   * @var string
   */
  public $endDate;
  /**
   * @var bool
   */
  public $groupByColumn;
  /**
   * @var string
   */
  public $headerText;
  /**
   * @var string
   */
  public $platformSource;
  /**
   * @var string
   */
  public $productReportPerspective;
  /**
   * @var string
   */
  public $savedColumnName;
  /**
   * @var string
   */
  public $startDate;

  /**
   * @param string
   */
  public function setColumnName($columnName)
  {
    $this->columnName = $columnName;
  }
  /**
   * @return string
   */
  public function getColumnName()
  {
    return $this->columnName;
  }
  /**
   * @param string
   */
  public function setCustomDimensionName($customDimensionName)
  {
    $this->customDimensionName = $customDimensionName;
  }
  /**
   * @return string
   */
  public function getCustomDimensionName()
  {
    return $this->customDimensionName;
  }
  /**
   * @param string
   */
  public function setCustomMetricName($customMetricName)
  {
    $this->customMetricName = $customMetricName;
  }
  /**
   * @return string
   */
  public function getCustomMetricName()
  {
    return $this->customMetricName;
  }
  /**
   * @param string
   */
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return string
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  /**
   * @param bool
   */
  public function setGroupByColumn($groupByColumn)
  {
    $this->groupByColumn = $groupByColumn;
  }
  /**
   * @return bool
   */
  public function getGroupByColumn()
  {
    return $this->groupByColumn;
  }
  /**
   * @param string
   */
  public function setHeaderText($headerText)
  {
    $this->headerText = $headerText;
  }
  /**
   * @return string
   */
  public function getHeaderText()
  {
    return $this->headerText;
  }
  /**
   * @param string
   */
  public function setPlatformSource($platformSource)
  {
    $this->platformSource = $platformSource;
  }
  /**
   * @return string
   */
  public function getPlatformSource()
  {
    return $this->platformSource;
  }
  /**
   * @param string
   */
  public function setProductReportPerspective($productReportPerspective)
  {
    $this->productReportPerspective = $productReportPerspective;
  }
  /**
   * @return string
   */
  public function getProductReportPerspective()
  {
    return $this->productReportPerspective;
  }
  /**
   * @param string
   */
  public function setSavedColumnName($savedColumnName)
  {
    $this->savedColumnName = $savedColumnName;
  }
  /**
   * @return string
   */
  public function getSavedColumnName()
  {
    return $this->savedColumnName;
  }
  /**
   * @param string
   */
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return string
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportApiColumnSpec::class, 'Google_Service_Doubleclicksearch_ReportApiColumnSpec');
