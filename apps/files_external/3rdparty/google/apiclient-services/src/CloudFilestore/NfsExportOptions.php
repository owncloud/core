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

namespace Google\Service\CloudFilestore;

class NfsExportOptions extends \Google\Collection
{
  protected $collection_key = 'ipRanges';
  /**
   * @var string
   */
  public $accessMode;
  /**
   * @var string
   */
  public $anonGid;
  /**
   * @var string
   */
  public $anonUid;
  /**
   * @var string[]
   */
  public $ipRanges;
  /**
   * @var string
   */
  public $squashMode;

  /**
   * @param string
   */
  public function setAccessMode($accessMode)
  {
    $this->accessMode = $accessMode;
  }
  /**
   * @return string
   */
  public function getAccessMode()
  {
    return $this->accessMode;
  }
  /**
   * @param string
   */
  public function setAnonGid($anonGid)
  {
    $this->anonGid = $anonGid;
  }
  /**
   * @return string
   */
  public function getAnonGid()
  {
    return $this->anonGid;
  }
  /**
   * @param string
   */
  public function setAnonUid($anonUid)
  {
    $this->anonUid = $anonUid;
  }
  /**
   * @return string
   */
  public function getAnonUid()
  {
    return $this->anonUid;
  }
  /**
   * @param string[]
   */
  public function setIpRanges($ipRanges)
  {
    $this->ipRanges = $ipRanges;
  }
  /**
   * @return string[]
   */
  public function getIpRanges()
  {
    return $this->ipRanges;
  }
  /**
   * @param string
   */
  public function setSquashMode($squashMode)
  {
    $this->squashMode = $squashMode;
  }
  /**
   * @return string
   */
  public function getSquashMode()
  {
    return $this->squashMode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NfsExportOptions::class, 'Google_Service_CloudFilestore_NfsExportOptions');
