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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1EnvironmentGroupConfig extends \Google\Collection
{
  protected $collection_key = 'routingRules';
  public $hostnames;
  public $name;
  public $revisionId;
  protected $routingRulesType = GoogleCloudApigeeV1RoutingRule::class;
  protected $routingRulesDataType = 'array';
  public $uid;

  public function setHostnames($hostnames)
  {
    $this->hostnames = $hostnames;
  }
  public function getHostnames()
  {
    return $this->hostnames;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  /**
   * @param GoogleCloudApigeeV1RoutingRule[]
   */
  public function setRoutingRules($routingRules)
  {
    $this->routingRules = $routingRules;
  }
  /**
   * @return GoogleCloudApigeeV1RoutingRule[]
   */
  public function getRoutingRules()
  {
    return $this->routingRules;
  }
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  public function getUid()
  {
    return $this->uid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1EnvironmentGroupConfig::class, 'Google_Service_Apigee_GoogleCloudApigeeV1EnvironmentGroupConfig');
