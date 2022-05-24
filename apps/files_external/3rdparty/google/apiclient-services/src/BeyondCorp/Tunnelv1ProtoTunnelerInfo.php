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

namespace Google\Service\BeyondCorp;

class Tunnelv1ProtoTunnelerInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $backoffRetryCount;
  /**
   * @var string
   */
  public $id;
  protected $latestErrType = Tunnelv1ProtoTunnelerError::class;
  protected $latestErrDataType = '';
  /**
   * @var string
   */
  public $latestRetryTime;
  /**
   * @var string
   */
  public $totalRetryCount;

  /**
   * @param string
   */
  public function setBackoffRetryCount($backoffRetryCount)
  {
    $this->backoffRetryCount = $backoffRetryCount;
  }
  /**
   * @return string
   */
  public function getBackoffRetryCount()
  {
    return $this->backoffRetryCount;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Tunnelv1ProtoTunnelerError
   */
  public function setLatestErr(Tunnelv1ProtoTunnelerError $latestErr)
  {
    $this->latestErr = $latestErr;
  }
  /**
   * @return Tunnelv1ProtoTunnelerError
   */
  public function getLatestErr()
  {
    return $this->latestErr;
  }
  /**
   * @param string
   */
  public function setLatestRetryTime($latestRetryTime)
  {
    $this->latestRetryTime = $latestRetryTime;
  }
  /**
   * @return string
   */
  public function getLatestRetryTime()
  {
    return $this->latestRetryTime;
  }
  /**
   * @param string
   */
  public function setTotalRetryCount($totalRetryCount)
  {
    $this->totalRetryCount = $totalRetryCount;
  }
  /**
   * @return string
   */
  public function getTotalRetryCount()
  {
    return $this->totalRetryCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Tunnelv1ProtoTunnelerInfo::class, 'Google_Service_BeyondCorp_Tunnelv1ProtoTunnelerInfo');
