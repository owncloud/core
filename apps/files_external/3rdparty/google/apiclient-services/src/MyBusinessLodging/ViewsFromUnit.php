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
  public $beachView;
  public $beachViewException;
  public $cityView;
  public $cityViewException;
  public $gardenView;
  public $gardenViewException;
  public $lakeView;
  public $lakeViewException;
  public $landmarkView;
  public $landmarkViewException;
  public $oceanView;
  public $oceanViewException;
  public $poolView;
  public $poolViewException;
  public $valleyView;
  public $valleyViewException;

  public function setBeachView($beachView)
  {
    $this->beachView = $beachView;
  }
  public function getBeachView()
  {
    return $this->beachView;
  }
  public function setBeachViewException($beachViewException)
  {
    $this->beachViewException = $beachViewException;
  }
  public function getBeachViewException()
  {
    return $this->beachViewException;
  }
  public function setCityView($cityView)
  {
    $this->cityView = $cityView;
  }
  public function getCityView()
  {
    return $this->cityView;
  }
  public function setCityViewException($cityViewException)
  {
    $this->cityViewException = $cityViewException;
  }
  public function getCityViewException()
  {
    return $this->cityViewException;
  }
  public function setGardenView($gardenView)
  {
    $this->gardenView = $gardenView;
  }
  public function getGardenView()
  {
    return $this->gardenView;
  }
  public function setGardenViewException($gardenViewException)
  {
    $this->gardenViewException = $gardenViewException;
  }
  public function getGardenViewException()
  {
    return $this->gardenViewException;
  }
  public function setLakeView($lakeView)
  {
    $this->lakeView = $lakeView;
  }
  public function getLakeView()
  {
    return $this->lakeView;
  }
  public function setLakeViewException($lakeViewException)
  {
    $this->lakeViewException = $lakeViewException;
  }
  public function getLakeViewException()
  {
    return $this->lakeViewException;
  }
  public function setLandmarkView($landmarkView)
  {
    $this->landmarkView = $landmarkView;
  }
  public function getLandmarkView()
  {
    return $this->landmarkView;
  }
  public function setLandmarkViewException($landmarkViewException)
  {
    $this->landmarkViewException = $landmarkViewException;
  }
  public function getLandmarkViewException()
  {
    return $this->landmarkViewException;
  }
  public function setOceanView($oceanView)
  {
    $this->oceanView = $oceanView;
  }
  public function getOceanView()
  {
    return $this->oceanView;
  }
  public function setOceanViewException($oceanViewException)
  {
    $this->oceanViewException = $oceanViewException;
  }
  public function getOceanViewException()
  {
    return $this->oceanViewException;
  }
  public function setPoolView($poolView)
  {
    $this->poolView = $poolView;
  }
  public function getPoolView()
  {
    return $this->poolView;
  }
  public function setPoolViewException($poolViewException)
  {
    $this->poolViewException = $poolViewException;
  }
  public function getPoolViewException()
  {
    return $this->poolViewException;
  }
  public function setValleyView($valleyView)
  {
    $this->valleyView = $valleyView;
  }
  public function getValleyView()
  {
    return $this->valleyView;
  }
  public function setValleyViewException($valleyViewException)
  {
    $this->valleyViewException = $valleyViewException;
  }
  public function getValleyViewException()
  {
    return $this->valleyViewException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ViewsFromUnit::class, 'Google_Service_MyBusinessLodging_ViewsFromUnit');
