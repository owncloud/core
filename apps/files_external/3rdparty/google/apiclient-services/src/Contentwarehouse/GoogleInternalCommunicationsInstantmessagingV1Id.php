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

namespace Google\Service\Contentwarehouse;

class GoogleInternalCommunicationsInstantmessagingV1Id extends \Google\Model
{
  /**
   * @var string
   */
  public $app;
  /**
   * @var string
   */
  public $countryCode;
  /**
   * @var string
   */
  public $id;
  protected $locationHintType = GoogleInternalCommunicationsInstantmessagingV1LocationHint::class;
  protected $locationHintDataType = '';
  /**
   * @var string
   */
  public $routingInfoToken;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setApp($app)
  {
    $this->app = $app;
  }
  /**
   * @return string
   */
  public function getApp()
  {
    return $this->app;
  }
  /**
   * @param string
   */
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  /**
   * @return string
   */
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param GoogleInternalCommunicationsInstantmessagingV1LocationHint
   */
  public function setLocationHint(GoogleInternalCommunicationsInstantmessagingV1LocationHint $locationHint)
  {
    $this->locationHint = $locationHint;
  }
  /**
   * @return GoogleInternalCommunicationsInstantmessagingV1LocationHint
   */
  public function getLocationHint()
  {
    return $this->locationHint;
  }
  /**
   * @param string
   */
  public function setRoutingInfoToken($routingInfoToken)
  {
    $this->routingInfoToken = $routingInfoToken;
  }
  /**
   * @return string
   */
  public function getRoutingInfoToken()
  {
    return $this->routingInfoToken;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleInternalCommunicationsInstantmessagingV1Id::class, 'Google_Service_Contentwarehouse_GoogleInternalCommunicationsInstantmessagingV1Id');
