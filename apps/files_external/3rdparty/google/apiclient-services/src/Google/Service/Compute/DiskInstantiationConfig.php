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

class Google_Service_Compute_DiskInstantiationConfig extends Google_Model
{
  public $autoDelete;
  public $customImage;
  public $deviceName;
  public $instantiateFrom;

  public function setAutoDelete($autoDelete)
  {
    $this->autoDelete = $autoDelete;
  }
  public function getAutoDelete()
  {
    return $this->autoDelete;
  }
  public function setCustomImage($customImage)
  {
    $this->customImage = $customImage;
  }
  public function getCustomImage()
  {
    return $this->customImage;
  }
  public function setDeviceName($deviceName)
  {
    $this->deviceName = $deviceName;
  }
  public function getDeviceName()
  {
    return $this->deviceName;
  }
  public function setInstantiateFrom($instantiateFrom)
  {
    $this->instantiateFrom = $instantiateFrom;
  }
  public function getInstantiateFrom()
  {
    return $this->instantiateFrom;
  }
}
