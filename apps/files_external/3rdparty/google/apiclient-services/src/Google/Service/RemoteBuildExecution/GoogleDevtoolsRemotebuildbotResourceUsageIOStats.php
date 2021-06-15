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

class Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotResourceUsageIOStats extends Google_Model
{
  public $readBytesCount;
  public $readCount;
  public $readTimeMs;
  public $writeBytesCount;
  public $writeCount;
  public $writeTimeMs;

  public function setReadBytesCount($readBytesCount)
  {
    $this->readBytesCount = $readBytesCount;
  }
  public function getReadBytesCount()
  {
    return $this->readBytesCount;
  }
  public function setReadCount($readCount)
  {
    $this->readCount = $readCount;
  }
  public function getReadCount()
  {
    return $this->readCount;
  }
  public function setReadTimeMs($readTimeMs)
  {
    $this->readTimeMs = $readTimeMs;
  }
  public function getReadTimeMs()
  {
    return $this->readTimeMs;
  }
  public function setWriteBytesCount($writeBytesCount)
  {
    $this->writeBytesCount = $writeBytesCount;
  }
  public function getWriteBytesCount()
  {
    return $this->writeBytesCount;
  }
  public function setWriteCount($writeCount)
  {
    $this->writeCount = $writeCount;
  }
  public function getWriteCount()
  {
    return $this->writeCount;
  }
  public function setWriteTimeMs($writeTimeMs)
  {
    $this->writeTimeMs = $writeTimeMs;
  }
  public function getWriteTimeMs()
  {
    return $this->writeTimeMs;
  }
}
