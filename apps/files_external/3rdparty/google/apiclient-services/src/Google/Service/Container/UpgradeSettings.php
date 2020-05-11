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

class Google_Service_Container_UpgradeSettings extends Google_Model
{
  public $maxSurge;
  public $maxUnavailable;

  public function setMaxSurge($maxSurge)
  {
    $this->maxSurge = $maxSurge;
  }
  public function getMaxSurge()
  {
    return $this->maxSurge;
  }
  public function setMaxUnavailable($maxUnavailable)
  {
    $this->maxUnavailable = $maxUnavailable;
  }
  public function getMaxUnavailable()
  {
    return $this->maxUnavailable;
  }
}
