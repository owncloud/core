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

class WaterConservation extends \Google\Model
{
  /**
   * @var bool
   */
  public $independentOrganizationAuditsWaterUse;
  /**
   * @var string
   */
  public $independentOrganizationAuditsWaterUseException;
  /**
   * @var bool
   */
  public $linenReuseProgram;
  /**
   * @var string
   */
  public $linenReuseProgramException;
  /**
   * @var bool
   */
  public $towelReuseProgram;
  /**
   * @var string
   */
  public $towelReuseProgramException;
  /**
   * @var bool
   */
  public $waterSavingShowers;
  /**
   * @var string
   */
  public $waterSavingShowersException;
  /**
   * @var bool
   */
  public $waterSavingSinks;
  /**
   * @var string
   */
  public $waterSavingSinksException;
  /**
   * @var bool
   */
  public $waterSavingToilets;
  /**
   * @var string
   */
  public $waterSavingToiletsException;

  /**
   * @param bool
   */
  public function setIndependentOrganizationAuditsWaterUse($independentOrganizationAuditsWaterUse)
  {
    $this->independentOrganizationAuditsWaterUse = $independentOrganizationAuditsWaterUse;
  }
  /**
   * @return bool
   */
  public function getIndependentOrganizationAuditsWaterUse()
  {
    return $this->independentOrganizationAuditsWaterUse;
  }
  /**
   * @param string
   */
  public function setIndependentOrganizationAuditsWaterUseException($independentOrganizationAuditsWaterUseException)
  {
    $this->independentOrganizationAuditsWaterUseException = $independentOrganizationAuditsWaterUseException;
  }
  /**
   * @return string
   */
  public function getIndependentOrganizationAuditsWaterUseException()
  {
    return $this->independentOrganizationAuditsWaterUseException;
  }
  /**
   * @param bool
   */
  public function setLinenReuseProgram($linenReuseProgram)
  {
    $this->linenReuseProgram = $linenReuseProgram;
  }
  /**
   * @return bool
   */
  public function getLinenReuseProgram()
  {
    return $this->linenReuseProgram;
  }
  /**
   * @param string
   */
  public function setLinenReuseProgramException($linenReuseProgramException)
  {
    $this->linenReuseProgramException = $linenReuseProgramException;
  }
  /**
   * @return string
   */
  public function getLinenReuseProgramException()
  {
    return $this->linenReuseProgramException;
  }
  /**
   * @param bool
   */
  public function setTowelReuseProgram($towelReuseProgram)
  {
    $this->towelReuseProgram = $towelReuseProgram;
  }
  /**
   * @return bool
   */
  public function getTowelReuseProgram()
  {
    return $this->towelReuseProgram;
  }
  /**
   * @param string
   */
  public function setTowelReuseProgramException($towelReuseProgramException)
  {
    $this->towelReuseProgramException = $towelReuseProgramException;
  }
  /**
   * @return string
   */
  public function getTowelReuseProgramException()
  {
    return $this->towelReuseProgramException;
  }
  /**
   * @param bool
   */
  public function setWaterSavingShowers($waterSavingShowers)
  {
    $this->waterSavingShowers = $waterSavingShowers;
  }
  /**
   * @return bool
   */
  public function getWaterSavingShowers()
  {
    return $this->waterSavingShowers;
  }
  /**
   * @param string
   */
  public function setWaterSavingShowersException($waterSavingShowersException)
  {
    $this->waterSavingShowersException = $waterSavingShowersException;
  }
  /**
   * @return string
   */
  public function getWaterSavingShowersException()
  {
    return $this->waterSavingShowersException;
  }
  /**
   * @param bool
   */
  public function setWaterSavingSinks($waterSavingSinks)
  {
    $this->waterSavingSinks = $waterSavingSinks;
  }
  /**
   * @return bool
   */
  public function getWaterSavingSinks()
  {
    return $this->waterSavingSinks;
  }
  /**
   * @param string
   */
  public function setWaterSavingSinksException($waterSavingSinksException)
  {
    $this->waterSavingSinksException = $waterSavingSinksException;
  }
  /**
   * @return string
   */
  public function getWaterSavingSinksException()
  {
    return $this->waterSavingSinksException;
  }
  /**
   * @param bool
   */
  public function setWaterSavingToilets($waterSavingToilets)
  {
    $this->waterSavingToilets = $waterSavingToilets;
  }
  /**
   * @return bool
   */
  public function getWaterSavingToilets()
  {
    return $this->waterSavingToilets;
  }
  /**
   * @param string
   */
  public function setWaterSavingToiletsException($waterSavingToiletsException)
  {
    $this->waterSavingToiletsException = $waterSavingToiletsException;
  }
  /**
   * @return string
   */
  public function getWaterSavingToiletsException()
  {
    return $this->waterSavingToiletsException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WaterConservation::class, 'Google_Service_MyBusinessLodging_WaterConservation');
