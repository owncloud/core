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

class ViewsFromUnit extends \Google\Model
{
  /**
   * @var bool
   */
  public $beachView;
  /**
   * @var string
   */
  public $beachViewException;
  /**
   * @var bool
   */
  public $cityView;
  /**
   * @var string
   */
  public $cityViewException;
  /**
   * @var bool
   */
  public $gardenView;
  /**
   * @var string
   */
  public $gardenViewException;
  /**
   * @var bool
   */
  public $lakeView;
  /**
   * @var string
   */
  public $lakeViewException;
  /**
   * @var bool
   */
  public $landmarkView;
  /**
   * @var string
   */
  public $landmarkViewException;
  /**
   * @var bool
   */
  public $oceanView;
  /**
   * @var string
   */
  public $oceanViewException;
  /**
   * @var bool
   */
  public $poolView;
  /**
   * @var string
   */
  public $poolViewException;
  /**
   * @var bool
   */
  public $valleyView;
  /**
   * @var string
   */
  public $valleyViewException;

  /**
   * @param bool
   */
  public function setBeachView($beachView)
  {
    $this->beachView = $beachView;
  }
  /**
   * @return bool
   */
  public function getBeachView()
  {
    return $this->beachView;
  }
  /**
   * @param string
   */
  public function setBeachViewException($beachViewException)
  {
    $this->beachViewException = $beachViewException;
  }
  /**
   * @return string
   */
  public function getBeachViewException()
  {
    return $this->beachViewException;
  }
  /**
   * @param bool
   */
  public function setCityView($cityView)
  {
    $this->cityView = $cityView;
  }
  /**
   * @return bool
   */
  public function getCityView()
  {
    return $this->cityView;
  }
  /**
   * @param string
   */
  public function setCityViewException($cityViewException)
  {
    $this->cityViewException = $cityViewException;
  }
  /**
   * @return string
   */
  public function getCityViewException()
  {
    return $this->cityViewException;
  }
  /**
   * @param bool
   */
  public function setGardenView($gardenView)
  {
    $this->gardenView = $gardenView;
  }
  /**
   * @return bool
   */
  public function getGardenView()
  {
    return $this->gardenView;
  }
  /**
   * @param string
   */
  public function setGardenViewException($gardenViewException)
  {
    $this->gardenViewException = $gardenViewException;
  }
  /**
   * @return string
   */
  public function getGardenViewException()
  {
    return $this->gardenViewException;
  }
  /**
   * @param bool
   */
  public function setLakeView($lakeView)
  {
    $this->lakeView = $lakeView;
  }
  /**
   * @return bool
   */
  public function getLakeView()
  {
    return $this->lakeView;
  }
  /**
   * @param string
   */
  public function setLakeViewException($lakeViewException)
  {
    $this->lakeViewException = $lakeViewException;
  }
  /**
   * @return string
   */
  public function getLakeViewException()
  {
    return $this->lakeViewException;
  }
  /**
   * @param bool
   */
  public function setLandmarkView($landmarkView)
  {
    $this->landmarkView = $landmarkView;
  }
  /**
   * @return bool
   */
  public function getLandmarkView()
  {
    return $this->landmarkView;
  }
  /**
   * @param string
   */
  public function setLandmarkViewException($landmarkViewException)
  {
    $this->landmarkViewException = $landmarkViewException;
  }
  /**
   * @return string
   */
  public function getLandmarkViewException()
  {
    return $this->landmarkViewException;
  }
  /**
   * @param bool
   */
  public function setOceanView($oceanView)
  {
    $this->oceanView = $oceanView;
  }
  /**
   * @return bool
   */
  public function getOceanView()
  {
    return $this->oceanView;
  }
  /**
   * @param string
   */
  public function setOceanViewException($oceanViewException)
  {
    $this->oceanViewException = $oceanViewException;
  }
  /**
   * @return string
   */
  public function getOceanViewException()
  {
    return $this->oceanViewException;
  }
  /**
   * @param bool
   */
  public function setPoolView($poolView)
  {
    $this->poolView = $poolView;
  }
  /**
   * @return bool
   */
  public function getPoolView()
  {
    return $this->poolView;
  }
  /**
   * @param string
   */
  public function setPoolViewException($poolViewException)
  {
    $this->poolViewException = $poolViewException;
  }
  /**
   * @return string
   */
  public function getPoolViewException()
  {
    return $this->poolViewException;
  }
  /**
   * @param bool
   */
  public function setValleyView($valleyView)
  {
    $this->valleyView = $valleyView;
  }
  /**
   * @return bool
   */
  public function getValleyView()
  {
    return $this->valleyView;
  }
  /**
   * @param string
   */
  public function setValleyViewException($valleyViewException)
  {
    $this->valleyViewException = $valleyViewException;
  }
  /**
   * @return string
   */
  public function getValleyViewException()
  {
    return $this->valleyViewException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ViewsFromUnit::class, 'Google_Service_MyBusinessLodging_ViewsFromUnit');
