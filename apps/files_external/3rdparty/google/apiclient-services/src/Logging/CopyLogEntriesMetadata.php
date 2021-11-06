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
  public $cancellationRequested;
  public $endTime;
  public $progress;
  protected $requestType = CopyLogEntriesRequest::class;
  protected $requestDataType = '';
  public $startTime;
  public $state;
  public $writerIdentity;

  public function setCancellationRequested($cancellationRequested)
  {
    $this->cancellationRequested = $cancellationRequested;
  }
  public function getCancellationRequested()
  {
    return $this->cancellationRequested;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setProgress($progress)
  {
    $this->progress = $progress;
  }
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
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setWriterIdentity($writerIdentity)
  {
    $this->writerIdentity = $writerIdentity;
  }
  public function getWriterIdentity()
  {
    return $this->writerIdentity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CopyLogEntriesMetadata::class, 'Google_Service_Logging_CopyLogEntriesMetadata');
