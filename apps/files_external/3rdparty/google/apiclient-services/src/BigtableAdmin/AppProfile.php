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

namespace Google\Service\BigtableAdmin;

class AppProfile extends \Google\Model
{
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $etag;
  protected $multiClusterRoutingUseAnyType = MultiClusterRoutingUseAny::class;
  protected $multiClusterRoutingUseAnyDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $singleClusterRoutingType = SingleClusterRouting::class;
  protected $singleClusterRoutingDataType = '';

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param MultiClusterRoutingUseAny
   */
  public function setMultiClusterRoutingUseAny(MultiClusterRoutingUseAny $multiClusterRoutingUseAny)
  {
    $this->multiClusterRoutingUseAny = $multiClusterRoutingUseAny;
  }
  /**
   * @return MultiClusterRoutingUseAny
   */
  public function getMultiClusterRoutingUseAny()
  {
    return $this->multiClusterRoutingUseAny;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param SingleClusterRouting
   */
  public function setSingleClusterRouting(SingleClusterRouting $singleClusterRouting)
  {
    $this->singleClusterRouting = $singleClusterRouting;
  }
  /**
   * @return SingleClusterRouting
   */
  public function getSingleClusterRouting()
  {
    return $this->singleClusterRouting;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppProfile::class, 'Google_Service_BigtableAdmin_AppProfile');
