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

namespace Google\Service\MyBusinessLodging;

class Accessibility extends \Google\Model
{
  /**
   * @var bool
   */
  public $mobilityAccessible;
  /**
   * @var bool
   */
  public $mobilityAccessibleElevator;
  /**
   * @var string
   */
  public $mobilityAccessibleElevatorException;
  /**
   * @var string
   */
  public $mobilityAccessibleException;
  /**
   * @var bool
   */
  public $mobilityAccessibleParking;
  /**
   * @var string
   */
  public $mobilityAccessibleParkingException;
  /**
   * @var bool
   */
  public $mobilityAccessiblePool;
  /**
   * @var string
   */
  public $mobilityAccessiblePoolException;

  /**
   * @param bool
   */
  public function setMobilityAccessible($mobilityAccessible)
  {
    $this->mobilityAccessible = $mobilityAccessible;
  }
  /**
   * @return bool
   */
  public function getMobilityAccessible()
  {
    return $this->mobilityAccessible;
  }
  /**
   * @param bool
   */
  public function setMobilityAccessibleElevator($mobilityAccessibleElevator)
  {
    $this->mobilityAccessibleElevator = $mobilityAccessibleElevator;
  }
  /**
   * @return bool
   */
  public function getMobilityAccessibleElevator()
  {
    return $this->mobilityAccessibleElevator;
  }
  /**
   * @param string
   */
  public function setMobilityAccessibleElevatorException($mobilityAccessibleElevatorException)
  {
    $this->mobilityAccessibleElevatorException = $mobilityAccessibleElevatorException;
  }
  /**
   * @return string
   */
  public function getMobilityAccessibleElevatorException()
  {
    return $this->mobilityAccessibleElevatorException;
  }
  /**
   * @param string
   */
  public function setMobilityAccessibleException($mobilityAccessibleException)
  {
    $this->mobilityAccessibleException = $mobilityAccessibleException;
  }
  /**
   * @return string
   */
  public function getMobilityAccessibleException()
  {
    return $this->mobilityAccessibleException;
  }
  /**
   * @param bool
   */
  public function setMobilityAccessibleParking($mobilityAccessibleParking)
  {
    $this->mobilityAccessibleParking = $mobilityAccessibleParking;
  }
  /**
   * @return bool
   */
  public function getMobilityAccessibleParking()
  {
    return $this->mobilityAccessibleParking;
  }
  /**
   * @param string
   */
  public function setMobilityAccessibleParkingException($mobilityAccessibleParkingException)
  {
    $this->mobilityAccessibleParkingException = $mobilityAccessibleParkingException;
  }
  /**
   * @return string
   */
  public function getMobilityAccessibleParkingException()
  {
    return $this->mobilityAccessibleParkingException;
  }
  /**
   * @param bool
   */
  public function setMobilityAccessiblePool($mobilityAccessiblePool)
  {
    $this->mobilityAccessiblePool = $mobilityAccessiblePool;
  }
  /**
   * @return bool
   */
  public function getMobilityAccessiblePool()
  {
    return $this->mobilityAccessiblePool;
  }
  /**
   * @param string
   */
  public function setMobilityAccessiblePoolException($mobilityAccessiblePoolException)
  {
    $this->mobilityAccessiblePoolException = $mobilityAccessiblePoolException;
  }
  /**
   * @return string
   */
  public function getMobilityAccessiblePoolException()
  {
    return $this->mobilityAccessiblePoolException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Accessibility::class, 'Google_Service_MyBusinessLodging_Accessibility');
