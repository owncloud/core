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

class Pools extends \Google\Model
{
  /**
   * @var bool
   */
  public $adultPool;
  /**
   * @var string
   */
  public $adultPoolException;
  /**
   * @var bool
   */
  public $hotTub;
  /**
   * @var string
   */
  public $hotTubException;
  /**
   * @var bool
   */
  public $indoorPool;
  /**
   * @var string
   */
  public $indoorPoolException;
  /**
   * @var int
   */
  public $indoorPoolsCount;
  /**
   * @var string
   */
  public $indoorPoolsCountException;
  /**
   * @var bool
   */
  public $lazyRiver;
  /**
   * @var string
   */
  public $lazyRiverException;
  /**
   * @var bool
   */
  public $lifeguard;
  /**
   * @var string
   */
  public $lifeguardException;
  /**
   * @var bool
   */
  public $outdoorPool;
  /**
   * @var string
   */
  public $outdoorPoolException;
  /**
   * @var int
   */
  public $outdoorPoolsCount;
  /**
   * @var string
   */
  public $outdoorPoolsCountException;
  /**
   * @var bool
   */
  public $pool;
  /**
   * @var string
   */
  public $poolException;
  /**
   * @var int
   */
  public $poolsCount;
  /**
   * @var string
   */
  public $poolsCountException;
  /**
   * @var bool
   */
  public $wadingPool;
  /**
   * @var string
   */
  public $wadingPoolException;
  /**
   * @var bool
   */
  public $waterPark;
  /**
   * @var string
   */
  public $waterParkException;
  /**
   * @var bool
   */
  public $waterslide;
  /**
   * @var string
   */
  public $waterslideException;
  /**
   * @var bool
   */
  public $wavePool;
  /**
   * @var string
   */
  public $wavePoolException;

  /**
   * @param bool
   */
  public function setAdultPool($adultPool)
  {
    $this->adultPool = $adultPool;
  }
  /**
   * @return bool
   */
  public function getAdultPool()
  {
    return $this->adultPool;
  }
  /**
   * @param string
   */
  public function setAdultPoolException($adultPoolException)
  {
    $this->adultPoolException = $adultPoolException;
  }
  /**
   * @return string
   */
  public function getAdultPoolException()
  {
    return $this->adultPoolException;
  }
  /**
   * @param bool
   */
  public function setHotTub($hotTub)
  {
    $this->hotTub = $hotTub;
  }
  /**
   * @return bool
   */
  public function getHotTub()
  {
    return $this->hotTub;
  }
  /**
   * @param string
   */
  public function setHotTubException($hotTubException)
  {
    $this->hotTubException = $hotTubException;
  }
  /**
   * @return string
   */
  public function getHotTubException()
  {
    return $this->hotTubException;
  }
  /**
   * @param bool
   */
  public function setIndoorPool($indoorPool)
  {
    $this->indoorPool = $indoorPool;
  }
  /**
   * @return bool
   */
  public function getIndoorPool()
  {
    return $this->indoorPool;
  }
  /**
   * @param string
   */
  public function setIndoorPoolException($indoorPoolException)
  {
    $this->indoorPoolException = $indoorPoolException;
  }
  /**
   * @return string
   */
  public function getIndoorPoolException()
  {
    return $this->indoorPoolException;
  }
  /**
   * @param int
   */
  public function setIndoorPoolsCount($indoorPoolsCount)
  {
    $this->indoorPoolsCount = $indoorPoolsCount;
  }
  /**
   * @return int
   */
  public function getIndoorPoolsCount()
  {
    return $this->indoorPoolsCount;
  }
  /**
   * @param string
   */
  public function setIndoorPoolsCountException($indoorPoolsCountException)
  {
    $this->indoorPoolsCountException = $indoorPoolsCountException;
  }
  /**
   * @return string
   */
  public function getIndoorPoolsCountException()
  {
    return $this->indoorPoolsCountException;
  }
  /**
   * @param bool
   */
  public function setLazyRiver($lazyRiver)
  {
    $this->lazyRiver = $lazyRiver;
  }
  /**
   * @return bool
   */
  public function getLazyRiver()
  {
    return $this->lazyRiver;
  }
  /**
   * @param string
   */
  public function setLazyRiverException($lazyRiverException)
  {
    $this->lazyRiverException = $lazyRiverException;
  }
  /**
   * @return string
   */
  public function getLazyRiverException()
  {
    return $this->lazyRiverException;
  }
  /**
   * @param bool
   */
  public function setLifeguard($lifeguard)
  {
    $this->lifeguard = $lifeguard;
  }
  /**
   * @return bool
   */
  public function getLifeguard()
  {
    return $this->lifeguard;
  }
  /**
   * @param string
   */
  public function setLifeguardException($lifeguardException)
  {
    $this->lifeguardException = $lifeguardException;
  }
  /**
   * @return string
   */
  public function getLifeguardException()
  {
    return $this->lifeguardException;
  }
  /**
   * @param bool
   */
  public function setOutdoorPool($outdoorPool)
  {
    $this->outdoorPool = $outdoorPool;
  }
  /**
   * @return bool
   */
  public function getOutdoorPool()
  {
    return $this->outdoorPool;
  }
  /**
   * @param string
   */
  public function setOutdoorPoolException($outdoorPoolException)
  {
    $this->outdoorPoolException = $outdoorPoolException;
  }
  /**
   * @return string
   */
  public function getOutdoorPoolException()
  {
    return $this->outdoorPoolException;
  }
  /**
   * @param int
   */
  public function setOutdoorPoolsCount($outdoorPoolsCount)
  {
    $this->outdoorPoolsCount = $outdoorPoolsCount;
  }
  /**
   * @return int
   */
  public function getOutdoorPoolsCount()
  {
    return $this->outdoorPoolsCount;
  }
  /**
   * @param string
   */
  public function setOutdoorPoolsCountException($outdoorPoolsCountException)
  {
    $this->outdoorPoolsCountException = $outdoorPoolsCountException;
  }
  /**
   * @return string
   */
  public function getOutdoorPoolsCountException()
  {
    return $this->outdoorPoolsCountException;
  }
  /**
   * @param bool
   */
  public function setPool($pool)
  {
    $this->pool = $pool;
  }
  /**
   * @return bool
   */
  public function getPool()
  {
    return $this->pool;
  }
  /**
   * @param string
   */
  public function setPoolException($poolException)
  {
    $this->poolException = $poolException;
  }
  /**
   * @return string
   */
  public function getPoolException()
  {
    return $this->poolException;
  }
  /**
   * @param int
   */
  public function setPoolsCount($poolsCount)
  {
    $this->poolsCount = $poolsCount;
  }
  /**
   * @return int
   */
  public function getPoolsCount()
  {
    return $this->poolsCount;
  }
  /**
   * @param string
   */
  public function setPoolsCountException($poolsCountException)
  {
    $this->poolsCountException = $poolsCountException;
  }
  /**
   * @return string
   */
  public function getPoolsCountException()
  {
    return $this->poolsCountException;
  }
  /**
   * @param bool
   */
  public function setWadingPool($wadingPool)
  {
    $this->wadingPool = $wadingPool;
  }
  /**
   * @return bool
   */
  public function getWadingPool()
  {
    return $this->wadingPool;
  }
  /**
   * @param string
   */
  public function setWadingPoolException($wadingPoolException)
  {
    $this->wadingPoolException = $wadingPoolException;
  }
  /**
   * @return string
   */
  public function getWadingPoolException()
  {
    return $this->wadingPoolException;
  }
  /**
   * @param bool
   */
  public function setWaterPark($waterPark)
  {
    $this->waterPark = $waterPark;
  }
  /**
   * @return bool
   */
  public function getWaterPark()
  {
    return $this->waterPark;
  }
  /**
   * @param string
   */
  public function setWaterParkException($waterParkException)
  {
    $this->waterParkException = $waterParkException;
  }
  /**
   * @return string
   */
  public function getWaterParkException()
  {
    return $this->waterParkException;
  }
  /**
   * @param bool
   */
  public function setWaterslide($waterslide)
  {
    $this->waterslide = $waterslide;
  }
  /**
   * @return bool
   */
  public function getWaterslide()
  {
    return $this->waterslide;
  }
  /**
   * @param string
   */
  public function setWaterslideException($waterslideException)
  {
    $this->waterslideException = $waterslideException;
  }
  /**
   * @return string
   */
  public function getWaterslideException()
  {
    return $this->waterslideException;
  }
  /**
   * @param bool
   */
  public function setWavePool($wavePool)
  {
    $this->wavePool = $wavePool;
  }
  /**
   * @return bool
   */
  public function getWavePool()
  {
    return $this->wavePool;
  }
  /**
   * @param string
   */
  public function setWavePoolException($wavePoolException)
  {
    $this->wavePoolException = $wavePoolException;
  }
  /**
   * @return string
   */
  public function getWavePoolException()
  {
    return $this->wavePoolException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Pools::class, 'Google_Service_MyBusinessLodging_Pools');
