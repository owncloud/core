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

namespace Google\Service\CloudLifeSciences;

class Volume extends \Google\Model
{
  protected $existingDiskType = ExistingDisk::class;
  protected $existingDiskDataType = '';
  protected $nfsMountType = NFSMount::class;
  protected $nfsMountDataType = '';
  protected $persistentDiskType = PersistentDisk::class;
  protected $persistentDiskDataType = '';
  public $volume;

  /**
   * @param ExistingDisk
   */
  public function setExistingDisk(ExistingDisk $existingDisk)
  {
    $this->existingDisk = $existingDisk;
  }
  /**
   * @return ExistingDisk
   */
  public function getExistingDisk()
  {
    return $this->existingDisk;
  }
  /**
   * @param NFSMount
   */
  public function setNfsMount(NFSMount $nfsMount)
  {
    $this->nfsMount = $nfsMount;
  }
  /**
   * @return NFSMount
   */
  public function getNfsMount()
  {
    return $this->nfsMount;
  }
  /**
   * @param PersistentDisk
   */
  public function setPersistentDisk(PersistentDisk $persistentDisk)
  {
    $this->persistentDisk = $persistentDisk;
  }
  /**
   * @return PersistentDisk
   */
  public function getPersistentDisk()
  {
    return $this->persistentDisk;
  }
  public function setVolume($volume)
  {
    $this->volume = $volume;
  }
  public function getVolume()
  {
    return $this->volume;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Volume::class, 'Google_Service_CloudLifeSciences_Volume');
