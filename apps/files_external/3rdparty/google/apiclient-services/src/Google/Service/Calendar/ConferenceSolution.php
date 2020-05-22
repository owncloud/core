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

class Google_Service_Calendar_ConferenceSolution extends Google_Model
{
  public $iconUri;
  protected $keyType = 'Google_Service_Calendar_ConferenceSolutionKey';
  protected $keyDataType = '';
  public $name;

  public function setIconUri($iconUri)
  {
    $this->iconUri = $iconUri;
  }
  public function getIconUri()
  {
    return $this->iconUri;
  }
  /**
   * @param Google_Service_Calendar_ConferenceSolutionKey
   */
  public function setKey(Google_Service_Calendar_ConferenceSolutionKey $key)
  {
    $this->key = $key;
  }
  /**
   * @return Google_Service_Calendar_ConferenceSolutionKey
   */
  public function getKey()
  {
    return $this->key;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
