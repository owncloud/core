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

namespace Google\Service\Logging;

class CopyLogEntriesMetadata extends \Google\Model
{
  /**
   * @var bool
   */
  public $cancellationRequested;
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var int
   */
  public $progress;
  protected $requestType = CopyLogEntriesRequest::class;
  protected $requestDataType = '';
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $writerIdentity;

  /**
   * @param bool
   */
  public function setCancellationRequested($cancellationRequested)
  {
    $this->cancellationRequested = $cancellationRequested;
  }
  /**
   * @return bool
   */
  public function getCancellationRequested()
  {
    return $this->cancellationRequested;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param int
   */
  public function setProgress($progress)
  {
    $this->progress = $progress;
  }
  /**
   * @return int
   */
  public function getProgress()
  {
    return $this->progress;
  }
  /**
   * @param CopyLogEntriesRequest
   */
  public function setRequest(CopyLogEntriesRequest $request)
  {
    $this->request = $request;
  }
  /**
   * @return CopyLogEntriesRequest
   */
  public function getRequest()
  {
    return $this->request;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
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
  public function setWriterIdentity($writerIdentity)
  {
    $this->writerIdentity = $writerIdentity;
  }
  /**
   * @return string
   */
  public function getWriterIdentity()
  {
    return $this->writerIdentity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CopyLogEntriesMetadata::class, 'Google_Service_Logging_CopyLogEntriesMetadata');
