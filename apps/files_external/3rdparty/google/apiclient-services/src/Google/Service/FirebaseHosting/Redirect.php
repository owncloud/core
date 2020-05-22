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

class Google_Service_FirebaseHosting_Redirect extends Google_Model
{
  public $glob;
  public $location;
  public $regex;
  public $statusCode;

  public function setGlob($glob)
  {
    $this->glob = $glob;
  }
  public function getGlob()
  {
    return $this->glob;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setRegex($regex)
  {
    $this->regex = $regex;
  }
  public function getRegex()
  {
    return $this->regex;
  }
  public function setStatusCode($statusCode)
  {
    $this->statusCode = $statusCode;
  }
  public function getStatusCode()
  {
    return $this->statusCode;
  }
}
