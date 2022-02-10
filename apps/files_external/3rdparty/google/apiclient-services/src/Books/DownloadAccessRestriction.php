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

namespace Google\Service\Books;

class DownloadAccessRestriction extends \Google\Model
{
  /**
   * @var bool
   */
  public $deviceAllowed;
  /**
   * @var int
   */
  public $downloadsAcquired;
  /**
   * @var bool
   */
  public $justAcquired;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var int
   */
  public $maxDownloadDevices;
  /**
   * @var string
   */
  public $message;
  /**
   * @var string
   */
  public $nonce;
  /**
   * @var string
   */
  public $reasonCode;
  /**
   * @var bool
   */
  public $restricted;
  /**
   * @var string
   */
  public $signature;
  /**
   * @var string
   */
  public $source;
  /**
   * @var string
   */
  public $volumeId;

  /**
   * @param bool
   */
  public function setDeviceAllowed($deviceAllowed)
  {
    $this->deviceAllowed = $deviceAllowed;
  }
  /**
   * @return bool
   */
  public function getDeviceAllowed()
  {
    return $this->deviceAllowed;
  }
  /**
   * @param int
   */
  public function setDownloadsAcquired($downloadsAcquired)
  {
    $this->downloadsAcquired = $downloadsAcquired;
  }
  /**
   * @return int
   */
  public function getDownloadsAcquired()
  {
    return $this->downloadsAcquired;
  }
  /**
   * @param bool
   */
  public function setJustAcquired($justAcquired)
  {
    $this->justAcquired = $justAcquired;
  }
  /**
   * @return bool
   */
  public function getJustAcquired()
  {
    return $this->justAcquired;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param int
   */
  public function setMaxDownloadDevices($maxDownloadDevices)
  {
    $this->maxDownloadDevices = $maxDownloadDevices;
  }
  /**
   * @return int
   */
  public function getMaxDownloadDevices()
  {
    return $this->maxDownloadDevices;
  }
  /**
   * @param string
   */
  public function setMessage($message)
  {
    $this->message = $message;
  }
  /**
   * @return string
   */
  public function getMessage()
  {
    return $this->message;
  }
  /**
   * @param string
   */
  public function setNonce($nonce)
  {
    $this->nonce = $nonce;
  }
  /**
   * @return string
   */
  public function getNonce()
  {
    return $this->nonce;
  }
  /**
   * @param string
   */
  public function setReasonCode($reasonCode)
  {
    $this->reasonCode = $reasonCode;
  }
  /**
   * @return string
   */
  public function getReasonCode()
  {
    return $this->reasonCode;
  }
  /**
   * @param bool
   */
  public function setRestricted($restricted)
  {
    $this->restricted = $restricted;
  }
  /**
   * @return bool
   */
  public function getRestricted()
  {
    return $this->restricted;
  }
  /**
   * @param string
   */
  public function setSignature($signature)
  {
    $this->signature = $signature;
  }
  /**
   * @return string
   */
  public function getSignature()
  {
    return $this->signature;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param string
   */
  public function setVolumeId($volumeId)
  {
    $this->volumeId = $volumeId;
  }
  /**
   * @return string
   */
  public function getVolumeId()
  {
    return $this->volumeId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DownloadAccessRestriction::class, 'Google_Service_Books_DownloadAccessRestriction');
