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

namespace Google\Service\CloudHealthcare;

class GoogleCloudHealthcareV1DicomBigQueryDestination extends \Google\Model
{
  /**
   * @var bool
   */
  public $force;
  /**
   * @var string
   */
  public $tableUri;
  /**
   * @var string
   */
  public $writeDisposition;

  /**
   * @param bool
   */
  public function setForce($force)
  {
    $this->force = $force;
  }
  /**
   * @return bool
   */
  public function getForce()
  {
    return $this->force;
  }
  /**
   * @param string
   */
  public function setTableUri($tableUri)
  {
    $this->tableUri = $tableUri;
  }
  /**
   * @return string
   */
  public function getTableUri()
  {
    return $this->tableUri;
  }
  /**
   * @param string
   */
  public function setWriteDisposition($writeDisposition)
  {
    $this->writeDisposition = $writeDisposition;
  }
  /**
   * @return string
   */
  public function getWriteDisposition()
  {
    return $this->writeDisposition;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudHealthcareV1DicomBigQueryDestination::class, 'Google_Service_CloudHealthcare_GoogleCloudHealthcareV1DicomBigQueryDestination');
