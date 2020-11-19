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

class Google_Service_CloudLifeSciences_Volume extends Google_Model
{
  protected $existingDiskType = 'Google_Service_CloudLifeSciences_ExistingDisk';
  protected $existingDiskDataType = '';
  protected $persistentDiskType = 'Google_Service_CloudLifeSciences_PersistentDisk';
  protected $persistentDiskDataType = '';
  public $volume;

  /**
   * @param Google_Service_CloudLifeSciences_ExistingDisk
   */
  public function setExistingDisk(Google_Service_CloudLifeSciences_ExistingDisk $existingDisk)
  {
    $this->existingDisk = $existingDisk;
  }
  /**
   * @return Google_Service_CloudLifeSciences_ExistingDisk
   */
  public function getExistingDisk()
  {
    return $this->existingDisk;
  }
  /**
   * @param Google_Service_CloudLifeSciences_PersistentDisk
   */
  public function setPersistentDisk(Google_Service_CloudLifeSciences_PersistentDisk $persistentDisk)
  {
    $this->persistentDisk = $persistentDisk;
  }
  /**
   * @return Google_Service_CloudLifeSciences_PersistentDisk
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
