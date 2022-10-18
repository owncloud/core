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

class ProductViewItemIssueItemIssueSeverity extends \Google\Collection
{
  protected $collection_key = 'severityPerDestination';
  /**
   * @var string
   */
  public $aggregatedSeverity;
  protected $severityPerDestinationType = ProductViewItemIssueIssueSeverityPerDestination::class;
  protected $severityPerDestinationDataType = 'array';

  /**
   * @param string
   */
  public function setAggregatedSeverity($aggregatedSeverity)
  {
    $this->aggregatedSeverity = $aggregatedSeverity;
  }
  /**
   * @return string
   */
  public function getAggregatedSeverity()
  {
    return $this->aggregatedSeverity;
  }
  /**
   * @param ProductViewItemIssueIssueSeverityPerDestination[]
   */
  public function setSeverityPerDestination($severityPerDestination)
  {
    $this->severityPerDestination = $severityPerDestination;
  }
  /**
   * @return ProductViewItemIssueIssueSeverityPerDestination[]
   */
  public function getSeverityPerDestination()
  {
    return $this->severityPerDestination;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProductViewItemIssueItemIssueSeverity::class, 'Google_Service_ShoppingContent_ProductViewItemIssueItemIssueSeverity');
