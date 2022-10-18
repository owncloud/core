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

class ProductViewItemIssueIssueSeverityPerDestination extends \Google\Collection
{
  protected $collection_key = 'disapprovedCountries';
  /**
   * @var string[]
   */
  public $demotedCountries;
  /**
   * @var string
   */
  public $destination;
  /**
   * @var string[]
   */
  public $disapprovedCountries;

  /**
   * @param string[]
   */
  public function setDemotedCountries($demotedCountries)
  {
    $this->demotedCountries = $demotedCountries;
  }
  /**
   * @return string[]
   */
  public function getDemotedCountries()
  {
    return $this->demotedCountries;
  }
  /**
   * @param string
   */
  public function setDestination($destination)
  {
    $this->destination = $destination;
  }
  /**
   * @return string
   */
  public function getDestination()
  {
    return $this->destination;
  }
  /**
   * @param string[]
   */
  public function setDisapprovedCountries($disapprovedCountries)
  {
    $this->disapprovedCountries = $disapprovedCountries;
  }
  /**
   * @return string[]
   */
  public function getDisapprovedCountries()
  {
    return $this->disapprovedCountries;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProductViewItemIssueIssueSeverityPerDestination::class, 'Google_Service_ShoppingContent_ProductViewItemIssueIssueSeverityPerDestination');
