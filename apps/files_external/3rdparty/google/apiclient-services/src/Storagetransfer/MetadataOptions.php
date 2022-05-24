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

namespace Google\Service\Storagetransfer;

class MetadataOptions extends \Google\Model
{
  /**
   * @var string
   */
  public $acl;
  /**
   * @var string
   */
  public $gid;
  /**
   * @var string
   */
  public $kmsKey;
  /**
   * @var string
   */
  public $mode;
  /**
   * @var string
   */
  public $storageClass;
  /**
   * @var string
   */
  public $symlink;
  /**
   * @var string
   */
  public $temporaryHold;
  /**
   * @var string
   */
  public $timeCreated;
  /**
   * @var string
   */
  public $uid;

  /**
   * @param string
   */
  public function setAcl($acl)
  {
    $this->acl = $acl;
  }
  /**
   * @return string
   */
  public function getAcl()
  {
    return $this->acl;
  }
  /**
   * @param string
   */
  public function setGid($gid)
  {
    $this->gid = $gid;
  }
  /**
   * @return string
   */
  public function getGid()
  {
    return $this->gid;
  }
  /**
   * @param string
   */
  public function setKmsKey($kmsKey)
  {
    $this->kmsKey = $kmsKey;
  }
  /**
   * @return string
   */
  public function getKmsKey()
  {
    return $this->kmsKey;
  }
  /**
   * @param string
   */
  public function setMode($mode)
  {
    $this->mode = $mode;
  }
  /**
   * @return string
   */
  public function getMode()
  {
    return $this->mode;
  }
  /**
   * @param string
   */
  public function setStorageClass($storageClass)
  {
    $this->storageClass = $storageClass;
  }
  /**
   * @return string
   */
  public function getStorageClass()
  {
    return $this->storageClass;
  }
  /**
   * @param string
   */
  public function setSymlink($symlink)
  {
    $this->symlink = $symlink;
  }
  /**
   * @return string
   */
  public function getSymlink()
  {
    return $this->symlink;
  }
  /**
   * @param string
   */
  public function setTemporaryHold($temporaryHold)
  {
    $this->temporaryHold = $temporaryHold;
  }
  /**
   * @return string
   */
  public function getTemporaryHold()
  {
    return $this->temporaryHold;
  }
  /**
   * @param string
   */
  public function setTimeCreated($timeCreated)
  {
    $this->timeCreated = $timeCreated;
  }
  /**
   * @return string
   */
  public function getTimeCreated()
  {
    return $this->timeCreated;
  }
  /**
   * @param string
   */
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MetadataOptions::class, 'Google_Service_Storagetransfer_MetadataOptions');
