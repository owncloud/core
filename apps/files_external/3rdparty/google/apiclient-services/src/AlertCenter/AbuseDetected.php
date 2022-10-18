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

namespace Google\Service\AlertCenter;

class AbuseDetected extends \Google\Model
{
  protected $additionalDetailsType = EntityList::class;
  protected $additionalDetailsDataType = '';
  /**
   * @var string
   */
  public $alertDescriptor;
  /**
   * @var string
   */
  public $product;
  /**
   * @var string
   */
  public $subAlertId;
  /**
   * @var string
   */
  public $summary;

  /**
   * @param EntityList
   */
  public function setAdditionalDetails(EntityList $additionalDetails)
  {
    $this->additionalDetails = $additionalDetails;
  }
  /**
   * @return EntityList
   */
  public function getAdditionalDetails()
  {
    return $this->additionalDetails;
  }
  /**
   * @param string
   */
  public function setAlertDescriptor($alertDescriptor)
  {
    $this->alertDescriptor = $alertDescriptor;
  }
  /**
   * @return string
   */
  public function getAlertDescriptor()
  {
    return $this->alertDescriptor;
  }
  /**
   * @param string
   */
  public function setProduct($product)
  {
    $this->product = $product;
  }
  /**
   * @return string
   */
  public function getProduct()
  {
    return $this->product;
  }
  /**
   * @param string
   */
  public function setSubAlertId($subAlertId)
  {
    $this->subAlertId = $subAlertId;
  }
  /**
   * @return string
   */
  public function getSubAlertId()
  {
    return $this->subAlertId;
  }
  /**
   * @param string
   */
  public function setSummary($summary)
  {
    $this->summary = $summary;
  }
  /**
   * @return string
   */
  public function getSummary()
  {
    return $this->summary;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AbuseDetected::class, 'Google_Service_AlertCenter_AbuseDetected');
