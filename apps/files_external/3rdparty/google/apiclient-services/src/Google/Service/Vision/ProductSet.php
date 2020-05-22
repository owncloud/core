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

class Google_Service_Vision_ProductSet extends Google_Model
{
  public $displayName;
  protected $indexErrorType = 'Google_Service_Vision_Status';
  protected $indexErrorDataType = '';
  public $indexTime;
  public $name;

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_Vision_Status
   */
  public function setIndexError(Google_Service_Vision_Status $indexError)
  {
    $this->indexError = $indexError;
  }
  /**
   * @return Google_Service_Vision_Status
   */
  public function getIndexError()
  {
    return $this->indexError;
  }
  public function setIndexTime($indexTime)
  {
    $this->indexTime = $indexTime;
  }
  public function getIndexTime()
  {
    return $this->indexTime;
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
