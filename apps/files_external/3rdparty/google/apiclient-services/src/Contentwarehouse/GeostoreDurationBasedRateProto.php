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

namespace Google\Service\Contentwarehouse;

class GeostoreDurationBasedRateProto extends \Google\Collection
{
  protected $collection_key = 'price';
  /**
   * @var bool
   */
  public $isFree;
  /**
   * @var int
   */
  public $periodicitySeconds;
  protected $priceType = FreebaseTopic::class;
  protected $priceDataType = 'array';
  /**
   * @var int
   */
  public $rangeEndSeconds;
  /**
   * @var int
   */
  public $rangeStartSeconds;

  /**
   * @param bool
   */
  public function setIsFree($isFree)
  {
    $this->isFree = $isFree;
  }
  /**
   * @return bool
   */
  public function getIsFree()
  {
    return $this->isFree;
  }
  /**
   * @param int
   */
  public function setPeriodicitySeconds($periodicitySeconds)
  {
    $this->periodicitySeconds = $periodicitySeconds;
  }
  /**
   * @return int
   */
  public function getPeriodicitySeconds()
  {
    return $this->periodicitySeconds;
  }
  /**
   * @param FreebaseTopic[]
   */
  public function setPrice($price)
  {
    $this->price = $price;
  }
  /**
   * @return FreebaseTopic[]
   */
  public function getPrice()
  {
    return $this->price;
  }
  /**
   * @param int
   */
  public function setRangeEndSeconds($rangeEndSeconds)
  {
    $this->rangeEndSeconds = $rangeEndSeconds;
  }
  /**
   * @return int
   */
  public function getRangeEndSeconds()
  {
    return $this->rangeEndSeconds;
  }
  /**
   * @param int
   */
  public function setRangeStartSeconds($rangeStartSeconds)
  {
    $this->rangeStartSeconds = $rangeStartSeconds;
  }
  /**
   * @return int
   */
  public function getRangeStartSeconds()
  {
    return $this->rangeStartSeconds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreDurationBasedRateProto::class, 'Google_Service_Contentwarehouse_GeostoreDurationBasedRateProto');
