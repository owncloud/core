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

namespace Google\Service\Appengine;

class Resources extends \Google\Collection
{
  protected $collection_key = 'volumes';
  public $cpu;
  public $diskGb;
  /**
   * @var string
   */
  public $kmsKeyReference;
  public $memoryGb;
  protected $volumesType = Volume::class;
  protected $volumesDataType = 'array';

  public function setCpu($cpu)
  {
    $this->cpu = $cpu;
  }
  public function getCpu()
  {
    return $this->cpu;
  }
  public function setDiskGb($diskGb)
  {
    $this->diskGb = $diskGb;
  }
  public function getDiskGb()
  {
    return $this->diskGb;
  }
  /**
   * @param string
   */
  public function setKmsKeyReference($kmsKeyReference)
  {
    $this->kmsKeyReference = $kmsKeyReference;
  }
  /**
   * @return string
   */
  public function getKmsKeyReference()
  {
    return $this->kmsKeyReference;
  }
  public function setMemoryGb($memoryGb)
  {
    $this->memoryGb = $memoryGb;
  }
  public function getMemoryGb()
  {
    return $this->memoryGb;
  }
  /**
   * @param Volume[]
   */
  public function setVolumes($volumes)
  {
    $this->volumes = $volumes;
  }
  /**
   * @return Volume[]
   */
  public function getVolumes()
  {
    return $this->volumes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Resources::class, 'Google_Service_Appengine_Resources');
