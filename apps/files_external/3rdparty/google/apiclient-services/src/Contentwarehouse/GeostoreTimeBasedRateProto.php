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

class GeostoreTimeBasedRateProto extends \Google\Collection
{
  protected $collection_key = 'durationBasedRate';
  protected $durationBasedRateType = GeostoreDurationBasedRateProto::class;
  protected $durationBasedRateDataType = 'array';
  /**
   * @var bool
   */
  public $taxIncluded;
  protected $validEndWithinType = GeostoreTimeScheduleProto::class;
  protected $validEndWithinDataType = '';
  protected $validStartWithinType = GeostoreTimeScheduleProto::class;
  protected $validStartWithinDataType = '';

  /**
   * @param GeostoreDurationBasedRateProto[]
   */
  public function setDurationBasedRate($durationBasedRate)
  {
    $this->durationBasedRate = $durationBasedRate;
  }
  /**
   * @return GeostoreDurationBasedRateProto[]
   */
  public function getDurationBasedRate()
  {
    return $this->durationBasedRate;
  }
  /**
   * @param bool
   */
  public function setTaxIncluded($taxIncluded)
  {
    $this->taxIncluded = $taxIncluded;
  }
  /**
   * @return bool
   */
  public function getTaxIncluded()
  {
    return $this->taxIncluded;
  }
  /**
   * @param GeostoreTimeScheduleProto
   */
  public function setValidEndWithin(GeostoreTimeScheduleProto $validEndWithin)
  {
    $this->validEndWithin = $validEndWithin;
  }
  /**
   * @return GeostoreTimeScheduleProto
   */
  public function getValidEndWithin()
  {
    return $this->validEndWithin;
  }
  /**
   * @param GeostoreTimeScheduleProto
   */
  public function setValidStartWithin(GeostoreTimeScheduleProto $validStartWithin)
  {
    $this->validStartWithin = $validStartWithin;
  }
  /**
   * @return GeostoreTimeScheduleProto
   */
  public function getValidStartWithin()
  {
    return $this->validStartWithin;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreTimeBasedRateProto::class, 'Google_Service_Contentwarehouse_GeostoreTimeBasedRateProto');
