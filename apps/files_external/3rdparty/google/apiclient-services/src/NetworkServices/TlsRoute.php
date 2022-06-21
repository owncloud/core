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

namespace Google\Service\NetworkServices;

class TlsRoute extends \Google\Collection
{
  protected $collection_key = 'rules';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string[]
   */
  public $gateways;
  /**
   * @var string[]
   */
  public $meshes;
  /**
   * @var string
   */
  public $name;
  protected $rulesType = TlsRouteRouteRule::class;
  protected $rulesDataType = 'array';
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
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
   * @param string[]
   */
  public function setGateways($gateways)
  {
    $this->gateways = $gateways;
  }
  /**
   * @return string[]
   */
  public function getGateways()
  {
    return $this->gateways;
  }
  /**
   * @param string[]
   */
  public function setMeshes($meshes)
  {
    $this->meshes = $meshes;
  }
  /**
   * @return string[]
   */
  public function getMeshes()
  {
    return $this->meshes;
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
   * @param TlsRouteRouteRule[]
   */
  public function setRules($rules)
  {
    $this->rules = $rules;
  }
  /**
   * @return TlsRouteRouteRule[]
   */
  public function getRules()
  {
    return $this->rules;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TlsRoute::class, 'Google_Service_NetworkServices_TlsRoute');
