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

namespace Google\Service\VMMigrationService;

class AwsSourceVmDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $committedStorageBytes;
  /**
   * @var string
   */
  public $firmware;

  /**
   * @param string
   */
  public function setCommittedStorageBytes($committedStorageBytes)
  {
    $this->committedStorageBytes = $committedStorageBytes;
  }
  /**
   * @return string
   */
  public function getCommittedStorageBytes()
  {
    return $this->committedStorageBytes;
  }
  /**
   * @param string
   */
  public function setFirmware($firmware)
  {
    $this->firmware = $firmware;
  }
  /**
   * @return string
   */
  public function getFirmware()
  {
    return $this->firmware;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AwsSourceVmDetails::class, 'Google_Service_VMMigrationService_AwsSourceVmDetails');
