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

class Google_Service_Testing_IosDevice extends Google_Model
{
  public $iosModelId;
  public $iosVersionId;
  public $locale;
  public $orientation;

  public function setIosModelId($iosModelId)
  {
    $this->iosModelId = $iosModelId;
  }
  public function getIosModelId()
  {
    return $this->iosModelId;
  }
  public function setIosVersionId($iosVersionId)
  {
    $this->iosVersionId = $iosVersionId;
  }
  public function getIosVersionId()
  {
    return $this->iosVersionId;
  }
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  public function getLocale()
  {
    return $this->locale;
  }
  public function setOrientation($orientation)
  {
    $this->orientation = $orientation;
  }
  public function getOrientation()
  {
    return $this->orientation;
  }
}
