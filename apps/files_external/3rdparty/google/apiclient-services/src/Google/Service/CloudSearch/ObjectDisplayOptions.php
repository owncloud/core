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

class Google_Service_CloudSearch_ObjectDisplayOptions extends Google_Collection
{
  protected $collection_key = 'metalines';
  protected $metalinesType = 'Google_Service_CloudSearch_Metaline';
  protected $metalinesDataType = 'array';
  public $objectDisplayLabel;

  /**
   * @param Google_Service_CloudSearch_Metaline[]
   */
  public function setMetalines($metalines)
  {
    $this->metalines = $metalines;
  }
  /**
   * @return Google_Service_CloudSearch_Metaline[]
   */
  public function getMetalines()
  {
    return $this->metalines;
  }
  public function setObjectDisplayLabel($objectDisplayLabel)
  {
    $this->objectDisplayLabel = $objectDisplayLabel;
  }
  public function getObjectDisplayLabel()
  {
    return $this->objectDisplayLabel;
  }
}
