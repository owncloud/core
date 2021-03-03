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

class Google_Service_ServiceDirectory_Service extends Google_Collection
{
  protected $collection_key = 'endpoints';
  public $annotations;
  protected $endpointsType = 'Google_Service_ServiceDirectory_Endpoint';
  protected $endpointsDataType = 'array';
  public $name;

  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param Google_Service_ServiceDirectory_Endpoint[]
   */
  public function setEndpoints($endpoints)
  {
    $this->endpoints = $endpoints;
  }
  /**
   * @return Google_Service_ServiceDirectory_Endpoint[]
   */
  public function getEndpoints()
  {
    return $this->endpoints;
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
