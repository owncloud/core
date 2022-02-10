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

namespace Google\Service\ServiceNetworking;

class ValidateConsumerConfigRequest extends \Google\Model
{
  /**
   * @var bool
   */
  public $checkServiceNetworkingUsePermission;
  /**
   * @var string
   */
  public $consumerNetwork;
  protected $consumerProjectType = ConsumerProject::class;
  protected $consumerProjectDataType = '';
  protected $rangeReservationType = RangeReservation::class;
  protected $rangeReservationDataType = '';
  /**
   * @var bool
   */
  public $validateNetwork;

  /**
   * @param bool
   */
  public function setCheckServiceNetworkingUsePermission($checkServiceNetworkingUsePermission)
  {
    $this->checkServiceNetworkingUsePermission = $checkServiceNetworkingUsePermission;
  }
  /**
   * @return bool
   */
  public function getCheckServiceNetworkingUsePermission()
  {
    return $this->checkServiceNetworkingUsePermission;
  }
  /**
   * @param string
   */
  public function setConsumerNetwork($consumerNetwork)
  {
    $this->consumerNetwork = $consumerNetwork;
  }
  /**
   * @return string
   */
  public function getConsumerNetwork()
  {
    return $this->consumerNetwork;
  }
  /**
   * @param ConsumerProject
   */
  public function setConsumerProject(ConsumerProject $consumerProject)
  {
    $this->consumerProject = $consumerProject;
  }
  /**
   * @return ConsumerProject
   */
  public function getConsumerProject()
  {
    return $this->consumerProject;
  }
  /**
   * @param RangeReservation
   */
  public function setRangeReservation(RangeReservation $rangeReservation)
  {
    $this->rangeReservation = $rangeReservation;
  }
  /**
   * @return RangeReservation
   */
  public function getRangeReservation()
  {
    return $this->rangeReservation;
  }
  /**
   * @param bool
   */
  public function setValidateNetwork($validateNetwork)
  {
    $this->validateNetwork = $validateNetwork;
  }
  /**
   * @return bool
   */
  public function getValidateNetwork()
  {
    return $this->validateNetwork;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ValidateConsumerConfigRequest::class, 'Google_Service_ServiceNetworking_ValidateConsumerConfigRequest');
