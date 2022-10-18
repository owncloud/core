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

class NlpSemanticParsingLocalImplicitLocalCategory extends \Google\Model
{
  /**
   * @var bool
   */
  public $airport;
  /**
   * @var bool
   */
  public $bank;
  /**
   * @var bool
   */
  public $chargingStation;
  /**
   * @var bool
   */
  public $gasStation;
  /**
   * @var bool
   */
  public $gym;
  /**
   * @var bool
   */
  public $hairSalon;
  /**
   * @var bool
   */
  public $hospital;
  /**
   * @var bool
   */
  public $hotel;
  /**
   * @var bool
   */
  public $laundromat;
  /**
   * @var bool
   */
  public $movieTheater;
  /**
   * @var bool
   */
  public $postOffice;
  /**
   * @var bool
   */
  public $spa;

  /**
   * @param bool
   */
  public function setAirport($airport)
  {
    $this->airport = $airport;
  }
  /**
   * @return bool
   */
  public function getAirport()
  {
    return $this->airport;
  }
  /**
   * @param bool
   */
  public function setBank($bank)
  {
    $this->bank = $bank;
  }
  /**
   * @return bool
   */
  public function getBank()
  {
    return $this->bank;
  }
  /**
   * @param bool
   */
  public function setChargingStation($chargingStation)
  {
    $this->chargingStation = $chargingStation;
  }
  /**
   * @return bool
   */
  public function getChargingStation()
  {
    return $this->chargingStation;
  }
  /**
   * @param bool
   */
  public function setGasStation($gasStation)
  {
    $this->gasStation = $gasStation;
  }
  /**
   * @return bool
   */
  public function getGasStation()
  {
    return $this->gasStation;
  }
  /**
   * @param bool
   */
  public function setGym($gym)
  {
    $this->gym = $gym;
  }
  /**
   * @return bool
   */
  public function getGym()
  {
    return $this->gym;
  }
  /**
   * @param bool
   */
  public function setHairSalon($hairSalon)
  {
    $this->hairSalon = $hairSalon;
  }
  /**
   * @return bool
   */
  public function getHairSalon()
  {
    return $this->hairSalon;
  }
  /**
   * @param bool
   */
  public function setHospital($hospital)
  {
    $this->hospital = $hospital;
  }
  /**
   * @return bool
   */
  public function getHospital()
  {
    return $this->hospital;
  }
  /**
   * @param bool
   */
  public function setHotel($hotel)
  {
    $this->hotel = $hotel;
  }
  /**
   * @return bool
   */
  public function getHotel()
  {
    return $this->hotel;
  }
  /**
   * @param bool
   */
  public function setLaundromat($laundromat)
  {
    $this->laundromat = $laundromat;
  }
  /**
   * @return bool
   */
  public function getLaundromat()
  {
    return $this->laundromat;
  }
  /**
   * @param bool
   */
  public function setMovieTheater($movieTheater)
  {
    $this->movieTheater = $movieTheater;
  }
  /**
   * @return bool
   */
  public function getMovieTheater()
  {
    return $this->movieTheater;
  }
  /**
   * @param bool
   */
  public function setPostOffice($postOffice)
  {
    $this->postOffice = $postOffice;
  }
  /**
   * @return bool
   */
  public function getPostOffice()
  {
    return $this->postOffice;
  }
  /**
   * @param bool
   */
  public function setSpa($spa)
  {
    $this->spa = $spa;
  }
  /**
   * @return bool
   */
  public function getSpa()
  {
    return $this->spa;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingLocalImplicitLocalCategory::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingLocalImplicitLocalCategory');
