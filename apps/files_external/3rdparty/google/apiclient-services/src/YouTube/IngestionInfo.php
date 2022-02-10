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

namespace Google\Service\YouTube;

class IngestionInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $backupIngestionAddress;
  /**
   * @var string
   */
  public $ingestionAddress;
  /**
   * @var string
   */
  public $rtmpsBackupIngestionAddress;
  /**
   * @var string
   */
  public $rtmpsIngestionAddress;
  /**
   * @var string
   */
  public $streamName;

  /**
   * @param string
   */
  public function setBackupIngestionAddress($backupIngestionAddress)
  {
    $this->backupIngestionAddress = $backupIngestionAddress;
  }
  /**
   * @return string
   */
  public function getBackupIngestionAddress()
  {
    return $this->backupIngestionAddress;
  }
  /**
   * @param string
   */
  public function setIngestionAddress($ingestionAddress)
  {
    $this->ingestionAddress = $ingestionAddress;
  }
  /**
   * @return string
   */
  public function getIngestionAddress()
  {
    return $this->ingestionAddress;
  }
  /**
   * @param string
   */
  public function setRtmpsBackupIngestionAddress($rtmpsBackupIngestionAddress)
  {
    $this->rtmpsBackupIngestionAddress = $rtmpsBackupIngestionAddress;
  }
  /**
   * @return string
   */
  public function getRtmpsBackupIngestionAddress()
  {
    return $this->rtmpsBackupIngestionAddress;
  }
  /**
   * @param string
   */
  public function setRtmpsIngestionAddress($rtmpsIngestionAddress)
  {
    $this->rtmpsIngestionAddress = $rtmpsIngestionAddress;
  }
  /**
   * @return string
   */
  public function getRtmpsIngestionAddress()
  {
    return $this->rtmpsIngestionAddress;
  }
  /**
   * @param string
   */
  public function setStreamName($streamName)
  {
    $this->streamName = $streamName;
  }
  /**
   * @return string
   */
  public function getStreamName()
  {
    return $this->streamName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IngestionInfo::class, 'Google_Service_YouTube_IngestionInfo');
