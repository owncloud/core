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

class Transportation extends \Google\Model
{
  /**
   * @var bool
   */
  public $airportShuttle;
  /**
   * @var string
   */
  public $airportShuttleException;
  /**
   * @var bool
   */
  public $carRentalOnProperty;
  /**
   * @var string
   */
  public $carRentalOnPropertyException;
  /**
   * @var bool
   */
  public $freeAirportShuttle;
  /**
   * @var string
   */
  public $freeAirportShuttleException;
  /**
   * @var bool
   */
  public $freePrivateCarService;
  /**
   * @var string
   */
  public $freePrivateCarServiceException;
  /**
   * @var bool
   */
  public $localShuttle;
  /**
   * @var string
   */
  public $localShuttleException;
  /**
   * @var bool
   */
  public $privateCarService;
  /**
   * @var string
   */
  public $privateCarServiceException;
  /**
   * @var bool
   */
  public $transfer;
  /**
   * @var string
   */
  public $transferException;

  /**
   * @param bool
   */
  public function setAirportShuttle($airportShuttle)
  {
    $this->airportShuttle = $airportShuttle;
  }
  /**
   * @return bool
   */
  public function getAirportShuttle()
  {
    return $this->airportShuttle;
  }
  /**
   * @param string
   */
  public function setAirportShuttleException($airportShuttleException)
  {
    $this->airportShuttleException = $airportShuttleException;
  }
  /**
   * @return string
   */
  public function getAirportShuttleException()
  {
    return $this->airportShuttleException;
  }
  /**
   * @param bool
   */
  public function setCarRentalOnProperty($carRentalOnProperty)
  {
    $this->carRentalOnProperty = $carRentalOnProperty;
  }
  /**
   * @return bool
   */
  public function getCarRentalOnProperty()
  {
    return $this->carRentalOnProperty;
  }
  /**
   * @param string
   */
  public function setCarRentalOnPropertyException($carRentalOnPropertyException)
  {
    $this->carRentalOnPropertyException = $carRentalOnPropertyException;
  }
  /**
   * @return string
   */
  public function getCarRentalOnPropertyException()
  {
    return $this->carRentalOnPropertyException;
  }
  /**
   * @param bool
   */
  public function setFreeAirportShuttle($freeAirportShuttle)
  {
    $this->freeAirportShuttle = $freeAirportShuttle;
  }
  /**
   * @return bool
   */
  public function getFreeAirportShuttle()
  {
    return $this->freeAirportShuttle;
  }
  /**
   * @param string
   */
  public function setFreeAirportShuttleException($freeAirportShuttleException)
  {
    $this->freeAirportShuttleException = $freeAirportShuttleException;
  }
  /**
   * @return string
   */
  public function getFreeAirportShuttleException()
  {
    return $this->freeAirportShuttleException;
  }
  /**
   * @param bool
   */
  public function setFreePrivateCarService($freePrivateCarService)
  {
    $this->freePrivateCarService = $freePrivateCarService;
  }
  /**
   * @return bool
   */
  public function getFreePrivateCarService()
  {
    return $this->freePrivateCarService;
  }
  /**
   * @param string
   */
  public function setFreePrivateCarServiceException($freePrivateCarServiceException)
  {
    $this->freePrivateCarServiceException = $freePrivateCarServiceException;
  }
  /**
   * @return string
   */
  public function getFreePrivateCarServiceException()
  {
    return $this->freePrivateCarServiceException;
  }
  /**
   * @param bool
   */
  public function setLocalShuttle($localShuttle)
  {
    $this->localShuttle = $localShuttle;
  }
  /**
   * @return bool
   */
  public function getLocalShuttle()
  {
    return $this->localShuttle;
  }
  /**
   * @param string
   */
  public function setLocalShuttleException($localShuttleException)
  {
    $this->localShuttleException = $localShuttleException;
  }
  /**
   * @return string
   */
  public function getLocalShuttleException()
  {
    return $this->localShuttleException;
  }
  /**
   * @param bool
   */
  public function setPrivateCarService($privateCarService)
  {
    $this->privateCarService = $privateCarService;
  }
  /**
   * @return bool
   */
  public function getPrivateCarService()
  {
    return $this->privateCarService;
  }
  /**
   * @param string
   */
  public function setPrivateCarServiceException($privateCarServiceException)
  {
    $this->privateCarServiceException = $privateCarServiceException;
  }
  /**
   * @return string
   */
  public function getPrivateCarServiceException()
  {
    return $this->privateCarServiceException;
  }
  /**
   * @param bool
   */
  public function setTransfer($transfer)
  {
    $this->transfer = $transfer;
  }
  /**
   * @return bool
   */
  public function getTransfer()
  {
    return $this->transfer;
  }
  /**
   * @param string
   */
  public function setTransferException($transferException)
  {
    $this->transferException = $transferException;
  }
  /**
   * @return string
   */
  public function getTransferException()
  {
    return $this->transferException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Transportation::class, 'Google_Service_MyBusinessLodging_Transportation');
