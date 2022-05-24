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

namespace Google\Service\Monitoring;

class MetricDescriptorMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $ingestDelay;
  /**
   * @var string
   */
  public $launchStage;
  /**
   * @var string
   */
  public $samplePeriod;

  /**
   * @param string
   */
  public function setIngestDelay($ingestDelay)
  {
    $this->ingestDelay = $ingestDelay;
  }
  /**
   * @return string
   */
  public function getIngestDelay()
  {
    return $this->ingestDelay;
  }
  /**
   * @param string
   */
  public function setLaunchStage($launchStage)
  {
    $this->launchStage = $launchStage;
  }
  /**
   * @return string
   */
  public function getLaunchStage()
  {
    return $this->launchStage;
  }
  /**
   * @param string
   */
  public function setSamplePeriod($samplePeriod)
  {
    $this->samplePeriod = $samplePeriod;
  }
  /**
   * @return string
   */
  public function getSamplePeriod()
  {
    return $this->samplePeriod;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MetricDescriptorMetadata::class, 'Google_Service_Monitoring_MetricDescriptorMetadata');
