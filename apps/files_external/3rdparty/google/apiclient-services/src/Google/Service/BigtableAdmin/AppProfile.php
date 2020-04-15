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

class Google_Service_BigtableAdmin_AppProfile extends Google_Model
{
  public $description;
  public $etag;
  protected $multiClusterRoutingUseAnyType = 'Google_Service_BigtableAdmin_MultiClusterRoutingUseAny';
  protected $multiClusterRoutingUseAnyDataType = '';
  public $name;
  protected $singleClusterRoutingType = 'Google_Service_BigtableAdmin_SingleClusterRouting';
  protected $singleClusterRoutingDataType = '';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param Google_Service_BigtableAdmin_MultiClusterRoutingUseAny
   */
  public function setMultiClusterRoutingUseAny(Google_Service_BigtableAdmin_MultiClusterRoutingUseAny $multiClusterRoutingUseAny)
  {
    $this->multiClusterRoutingUseAny = $multiClusterRoutingUseAny;
  }
  /**
   * @return Google_Service_BigtableAdmin_MultiClusterRoutingUseAny
   */
  public function getMultiClusterRoutingUseAny()
  {
    return $this->multiClusterRoutingUseAny;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_BigtableAdmin_SingleClusterRouting
   */
  public function setSingleClusterRouting(Google_Service_BigtableAdmin_SingleClusterRouting $singleClusterRouting)
  {
    $this->singleClusterRouting = $singleClusterRouting;
  }
  /**
   * @return Google_Service_BigtableAdmin_SingleClusterRouting
   */
  public function getSingleClusterRouting()
  {
    return $this->singleClusterRouting;
  }
}
