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

namespace Google\Service\Datastream;

class BackfillJob extends \Google\Collection
{
  protected $collection_key = 'errors';
  protected $errorsType = Error::class;
  protected $errorsDataType = 'array';
  /**
   * @var string
   */
  public $lastEndTime;
  /**
   * @var string
   */
  public $lastStartTime;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $trigger;

  /**
   * @param Error[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return Error[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param string
   */
  public function setLastEndTime($lastEndTime)
  {
    $this->lastEndTime = $lastEndTime;
  }
  /**
   * @return string
   */
  public function getLastEndTime()
  {
    return $this->lastEndTime;
  }
  /**
   * @param string
   */
  public function setLastStartTime($lastStartTime)
  {
    $this->lastStartTime = $lastStartTime;
  }
  /**
   * @return string
   */
  public function getLastStartTime()
  {
    return $this->lastStartTime;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setTrigger($trigger)
  {
    $this->trigger = $trigger;
  }
  /**
   * @return string
   */
  public function getTrigger()
  {
    return $this->trigger;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BackfillJob::class, 'Google_Service_Datastream_BackfillJob');
