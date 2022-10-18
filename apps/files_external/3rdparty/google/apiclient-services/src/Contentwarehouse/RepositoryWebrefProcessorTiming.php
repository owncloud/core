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

class RepositoryWebrefProcessorTiming extends \Google\Collection
{
  protected $collection_key = 'processorTimings';
  /**
   * @var string
   */
  public $cpuInstructions;
  /**
   * @var string
   */
  public $name;
  protected $processorCountersType = RepositoryWebrefProcessorCounter::class;
  protected $processorCountersDataType = 'array';
  protected $processorTimingsType = RepositoryWebrefProcessorTiming::class;
  protected $processorTimingsDataType = 'array';
  /**
   * @var string
   */
  public $wallTimeNs;

  /**
   * @param string
   */
  public function setCpuInstructions($cpuInstructions)
  {
    $this->cpuInstructions = $cpuInstructions;
  }
  /**
   * @return string
   */
  public function getCpuInstructions()
  {
    return $this->cpuInstructions;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param RepositoryWebrefProcessorCounter[]
   */
  public function setProcessorCounters($processorCounters)
  {
    $this->processorCounters = $processorCounters;
  }
  /**
   * @return RepositoryWebrefProcessorCounter[]
   */
  public function getProcessorCounters()
  {
    return $this->processorCounters;
  }
  /**
   * @param RepositoryWebrefProcessorTiming[]
   */
  public function setProcessorTimings($processorTimings)
  {
    $this->processorTimings = $processorTimings;
  }
  /**
   * @return RepositoryWebrefProcessorTiming[]
   */
  public function getProcessorTimings()
  {
    return $this->processorTimings;
  }
  /**
   * @param string
   */
  public function setWallTimeNs($wallTimeNs)
  {
    $this->wallTimeNs = $wallTimeNs;
  }
  /**
   * @return string
   */
  public function getWallTimeNs()
  {
    return $this->wallTimeNs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefProcessorTiming::class, 'Google_Service_Contentwarehouse_RepositoryWebrefProcessorTiming');
