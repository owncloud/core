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

namespace Google\Service\Dataflow;

class AutoscalingEvent extends \Google\Model
{
  /**
   * @var string
   */
  public $currentNumWorkers;
  protected $descriptionType = StructuredMessage::class;
  protected $descriptionDataType = '';
  /**
   * @var string
   */
  public $eventType;
  /**
   * @var string
   */
  public $targetNumWorkers;
  /**
   * @var string
   */
  public $time;
  /**
   * @var string
   */
  public $workerPool;

  /**
   * @param string
   */
  public function setCurrentNumWorkers($currentNumWorkers)
  {
    $this->currentNumWorkers = $currentNumWorkers;
  }
  /**
   * @return string
   */
  public function getCurrentNumWorkers()
  {
    return $this->currentNumWorkers;
  }
  /**
   * @param StructuredMessage
   */
  public function setDescription(StructuredMessage $description)
  {
    $this->description = $description;
  }
  /**
   * @return StructuredMessage
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setEventType($eventType)
  {
    $this->eventType = $eventType;
  }
  /**
   * @return string
   */
  public function getEventType()
  {
    return $this->eventType;
  }
  /**
   * @param string
   */
  public function setTargetNumWorkers($targetNumWorkers)
  {
    $this->targetNumWorkers = $targetNumWorkers;
  }
  /**
   * @return string
   */
  public function getTargetNumWorkers()
  {
    return $this->targetNumWorkers;
  }
  /**
   * @param string
   */
  public function setTime($time)
  {
    $this->time = $time;
  }
  /**
   * @return string
   */
  public function getTime()
  {
    return $this->time;
  }
  /**
   * @param string
   */
  public function setWorkerPool($workerPool)
  {
    $this->workerPool = $workerPool;
  }
  /**
   * @return string
   */
  public function getWorkerPool()
  {
    return $this->workerPool;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AutoscalingEvent::class, 'Google_Service_Dataflow_AutoscalingEvent');
