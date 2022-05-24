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

class Activities extends \Google\Model
{
  /**
   * @var bool
   */
  public $beachAccess;
  /**
   * @var string
   */
  public $beachAccessException;
  /**
   * @var bool
   */
  public $beachFront;
  /**
   * @var string
   */
  public $beachFrontException;
  /**
   * @var bool
   */
  public $bicycleRental;
  /**
   * @var string
   */
  public $bicycleRentalException;
  /**
   * @var bool
   */
  public $boutiqueStores;
  /**
   * @var string
   */
  public $boutiqueStoresException;
  /**
   * @var bool
   */
  public $casino;
  /**
   * @var string
   */
  public $casinoException;
  /**
   * @var bool
   */
  public $freeBicycleRental;
  /**
   * @var string
   */
  public $freeBicycleRentalException;
  /**
   * @var bool
   */
  public $freeWatercraftRental;
  /**
   * @var string
   */
  public $freeWatercraftRentalException;
  /**
   * @var bool
   */
  public $gameRoom;
  /**
   * @var string
   */
  public $gameRoomException;
  /**
   * @var bool
   */
  public $golf;
  /**
   * @var string
   */
  public $golfException;
  /**
   * @var bool
   */
  public $horsebackRiding;
  /**
   * @var string
   */
  public $horsebackRidingException;
  /**
   * @var bool
   */
  public $nightclub;
  /**
   * @var string
   */
  public $nightclubException;
  /**
   * @var bool
   */
  public $privateBeach;
  /**
   * @var string
   */
  public $privateBeachException;
  /**
   * @var bool
   */
  public $scuba;
  /**
   * @var string
   */
  public $scubaException;
  /**
   * @var bool
   */
  public $snorkeling;
  /**
   * @var string
   */
  public $snorkelingException;
  /**
   * @var bool
   */
  public $tennis;
  /**
   * @var string
   */
  public $tennisException;
  /**
   * @var bool
   */
  public $waterSkiing;
  /**
   * @var string
   */
  public $waterSkiingException;
  /**
   * @var bool
   */
  public $watercraftRental;
  /**
   * @var string
   */
  public $watercraftRentalException;

  /**
   * @param bool
   */
  public function setBeachAccess($beachAccess)
  {
    $this->beachAccess = $beachAccess;
  }
  /**
   * @return bool
   */
  public function getBeachAccess()
  {
    return $this->beachAccess;
  }
  /**
   * @param string
   */
  public function setBeachAccessException($beachAccessException)
  {
    $this->beachAccessException = $beachAccessException;
  }
  /**
   * @return string
   */
  public function getBeachAccessException()
  {
    return $this->beachAccessException;
  }
  /**
   * @param bool
   */
  public function setBeachFront($beachFront)
  {
    $this->beachFront = $beachFront;
  }
  /**
   * @return bool
   */
  public function getBeachFront()
  {
    return $this->beachFront;
  }
  /**
   * @param string
   */
  public function setBeachFrontException($beachFrontException)
  {
    $this->beachFrontException = $beachFrontException;
  }
  /**
   * @return string
   */
  public function getBeachFrontException()
  {
    return $this->beachFrontException;
  }
  /**
   * @param bool
   */
  public function setBicycleRental($bicycleRental)
  {
    $this->bicycleRental = $bicycleRental;
  }
  /**
   * @return bool
   */
  public function getBicycleRental()
  {
    return $this->bicycleRental;
  }
  /**
   * @param string
   */
  public function setBicycleRentalException($bicycleRentalException)
  {
    $this->bicycleRentalException = $bicycleRentalException;
  }
  /**
   * @return string
   */
  public function getBicycleRentalException()
  {
    return $this->bicycleRentalException;
  }
  /**
   * @param bool
   */
  public function setBoutiqueStores($boutiqueStores)
  {
    $this->boutiqueStores = $boutiqueStores;
  }
  /**
   * @return bool
   */
  public function getBoutiqueStores()
  {
    return $this->boutiqueStores;
  }
  /**
   * @param string
   */
  public function setBoutiqueStoresException($boutiqueStoresException)
  {
    $this->boutiqueStoresException = $boutiqueStoresException;
  }
  /**
   * @return string
   */
  public function getBoutiqueStoresException()
  {
    return $this->boutiqueStoresException;
  }
  /**
   * @param bool
   */
  public function setCasino($casino)
  {
    $this->casino = $casino;
  }
  /**
   * @return bool
   */
  public function getCasino()
  {
    return $this->casino;
  }
  /**
   * @param string
   */
  public function setCasinoException($casinoException)
  {
    $this->casinoException = $casinoException;
  }
  /**
   * @return string
   */
  public function getCasinoException()
  {
    return $this->casinoException;
  }
  /**
   * @param bool
   */
  public function setFreeBicycleRental($freeBicycleRental)
  {
    $this->freeBicycleRental = $freeBicycleRental;
  }
  /**
   * @return bool
   */
  public function getFreeBicycleRental()
  {
    return $this->freeBicycleRental;
  }
  /**
   * @param string
   */
  public function setFreeBicycleRentalException($freeBicycleRentalException)
  {
    $this->freeBicycleRentalException = $freeBicycleRentalException;
  }
  /**
   * @return string
   */
  public function getFreeBicycleRentalException()
  {
    return $this->freeBicycleRentalException;
  }
  /**
   * @param bool
   */
  public function setFreeWatercraftRental($freeWatercraftRental)
  {
    $this->freeWatercraftRental = $freeWatercraftRental;
  }
  /**
   * @return bool
   */
  public function getFreeWatercraftRental()
  {
    return $this->freeWatercraftRental;
  }
  /**
   * @param string
   */
  public function setFreeWatercraftRentalException($freeWatercraftRentalException)
  {
    $this->freeWatercraftRentalException = $freeWatercraftRentalException;
  }
  /**
   * @return string
   */
  public function getFreeWatercraftRentalException()
  {
    return $this->freeWatercraftRentalException;
  }
  /**
   * @param bool
   */
  public function setGameRoom($gameRoom)
  {
    $this->gameRoom = $gameRoom;
  }
  /**
   * @return bool
   */
  public function getGameRoom()
  {
    return $this->gameRoom;
  }
  /**
   * @param string
   */
  public function setGameRoomException($gameRoomException)
  {
    $this->gameRoomException = $gameRoomException;
  }
  /**
   * @return string
   */
  public function getGameRoomException()
  {
    return $this->gameRoomException;
  }
  /**
   * @param bool
   */
  public function setGolf($golf)
  {
    $this->golf = $golf;
  }
  /**
   * @return bool
   */
  public function getGolf()
  {
    return $this->golf;
  }
  /**
   * @param string
   */
  public function setGolfException($golfException)
  {
    $this->golfException = $golfException;
  }
  /**
   * @return string
   */
  public function getGolfException()
  {
    return $this->golfException;
  }
  /**
   * @param bool
   */
  public function setHorsebackRiding($horsebackRiding)
  {
    $this->horsebackRiding = $horsebackRiding;
  }
  /**
   * @return bool
   */
  public function getHorsebackRiding()
  {
    return $this->horsebackRiding;
  }
  /**
   * @param string
   */
  public function setHorsebackRidingException($horsebackRidingException)
  {
    $this->horsebackRidingException = $horsebackRidingException;
  }
  /**
   * @return string
   */
  public function getHorsebackRidingException()
  {
    return $this->horsebackRidingException;
  }
  /**
   * @param bool
   */
  public function setNightclub($nightclub)
  {
    $this->nightclub = $nightclub;
  }
  /**
   * @return bool
   */
  public function getNightclub()
  {
    return $this->nightclub;
  }
  /**
   * @param string
   */
  public function setNightclubException($nightclubException)
  {
    $this->nightclubException = $nightclubException;
  }
  /**
   * @return string
   */
  public function getNightclubException()
  {
    return $this->nightclubException;
  }
  /**
   * @param bool
   */
  public function setPrivateBeach($privateBeach)
  {
    $this->privateBeach = $privateBeach;
  }
  /**
   * @return bool
   */
  public function getPrivateBeach()
  {
    return $this->privateBeach;
  }
  /**
   * @param string
   */
  public function setPrivateBeachException($privateBeachException)
  {
    $this->privateBeachException = $privateBeachException;
  }
  /**
   * @return string
   */
  public function getPrivateBeachException()
  {
    return $this->privateBeachException;
  }
  /**
   * @param bool
   */
  public function setScuba($scuba)
  {
    $this->scuba = $scuba;
  }
  /**
   * @return bool
   */
  public function getScuba()
  {
    return $this->scuba;
  }
  /**
   * @param string
   */
  public function setScubaException($scubaException)
  {
    $this->scubaException = $scubaException;
  }
  /**
   * @return string
   */
  public function getScubaException()
  {
    return $this->scubaException;
  }
  /**
   * @param bool
   */
  public function setSnorkeling($snorkeling)
  {
    $this->snorkeling = $snorkeling;
  }
  /**
   * @return bool
   */
  public function getSnorkeling()
  {
    return $this->snorkeling;
  }
  /**
   * @param string
   */
  public function setSnorkelingException($snorkelingException)
  {
    $this->snorkelingException = $snorkelingException;
  }
  /**
   * @return string
   */
  public function getSnorkelingException()
  {
    return $this->snorkelingException;
  }
  /**
   * @param bool
   */
  public function setTennis($tennis)
  {
    $this->tennis = $tennis;
  }
  /**
   * @return bool
   */
  public function getTennis()
  {
    return $this->tennis;
  }
  /**
   * @param string
   */
  public function setTennisException($tennisException)
  {
    $this->tennisException = $tennisException;
  }
  /**
   * @return string
   */
  public function getTennisException()
  {
    return $this->tennisException;
  }
  /**
   * @param bool
   */
  public function setWaterSkiing($waterSkiing)
  {
    $this->waterSkiing = $waterSkiing;
  }
  /**
   * @return bool
   */
  public function getWaterSkiing()
  {
    return $this->waterSkiing;
  }
  /**
   * @param string
   */
  public function setWaterSkiingException($waterSkiingException)
  {
    $this->waterSkiingException = $waterSkiingException;
  }
  /**
   * @return string
   */
  public function getWaterSkiingException()
  {
    return $this->waterSkiingException;
  }
  /**
   * @param bool
   */
  public function setWatercraftRental($watercraftRental)
  {
    $this->watercraftRental = $watercraftRental;
  }
  /**
   * @return bool
   */
  public function getWatercraftRental()
  {
    return $this->watercraftRental;
  }
  /**
   * @param string
   */
  public function setWatercraftRentalException($watercraftRentalException)
  {
    $this->watercraftRentalException = $watercraftRentalException;
  }
  /**
   * @return string
   */
  public function getWatercraftRentalException()
  {
    return $this->watercraftRentalException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Activities::class, 'Google_Service_MyBusinessLodging_Activities');
