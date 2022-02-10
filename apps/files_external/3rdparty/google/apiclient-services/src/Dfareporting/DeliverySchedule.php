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

class DeliverySchedule extends \Google\Model
{
  protected $frequencyCapType = FrequencyCap::class;
  protected $frequencyCapDataType = '';
  /**
   * @var bool
   */
  public $hardCutoff;
  /**
   * @var string
   */
  public $impressionRatio;
  /**
   * @var string
   */
  public $priority;

  /**
   * @param FrequencyCap
   */
  public function setFrequencyCap(FrequencyCap $frequencyCap)
  {
    $this->frequencyCap = $frequencyCap;
  }
  /**
   * @return FrequencyCap
   */
  public function getFrequencyCap()
  {
    return $this->frequencyCap;
  }
  /**
   * @param bool
   */
  public function setHardCutoff($hardCutoff)
  {
    $this->hardCutoff = $hardCutoff;
  }
  /**
   * @return bool
   */
  public function getHardCutoff()
  {
    return $this->hardCutoff;
  }
  /**
   * @param string
   */
  public function setImpressionRatio($impressionRatio)
  {
    $this->impressionRatio = $impressionRatio;
  }
  /**
   * @return string
   */
  public function getImpressionRatio()
  {
    return $this->impressionRatio;
  }
  /**
   * @param string
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return string
   */
  public function getPriority()
  {
    return $this->priority;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeliverySchedule::class, 'Google_Service_Dfareporting_DeliverySchedule');
