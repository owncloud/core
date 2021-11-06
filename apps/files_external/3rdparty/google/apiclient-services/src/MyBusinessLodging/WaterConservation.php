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
  public $independentOrganizationAuditsWaterUse;
  public $independentOrganizationAuditsWaterUseException;
  public $linenReuseProgram;
  public $linenReuseProgramException;
  public $towelReuseProgram;
  public $towelReuseProgramException;
  public $waterSavingShowers;
  public $waterSavingShowersException;
  public $waterSavingSinks;
  public $waterSavingSinksException;
  public $waterSavingToilets;
  public $waterSavingToiletsException;

  public function setIndependentOrganizationAuditsWaterUse($independentOrganizationAuditsWaterUse)
  {
    $this->independentOrganizationAuditsWaterUse = $independentOrganizationAuditsWaterUse;
  }
  public function getIndependentOrganizationAuditsWaterUse()
  {
    return $this->independentOrganizationAuditsWaterUse;
  }
  public function setIndependentOrganizationAuditsWaterUseException($independentOrganizationAuditsWaterUseException)
  {
    $this->independentOrganizationAuditsWaterUseException = $independentOrganizationAuditsWaterUseException;
  }
  public function getIndependentOrganizationAuditsWaterUseException()
  {
    return $this->independentOrganizationAuditsWaterUseException;
  }
  public function setLinenReuseProgram($linenReuseProgram)
  {
    $this->linenReuseProgram = $linenReuseProgram;
  }
  public function getLinenReuseProgram()
  {
    return $this->linenReuseProgram;
  }
  public function setLinenReuseProgramException($linenReuseProgramException)
  {
    $this->linenReuseProgramException = $linenReuseProgramException;
  }
  public function getLinenReuseProgramException()
  {
    return $this->linenReuseProgramException;
  }
  public function setTowelReuseProgram($towelReuseProgram)
  {
    $this->towelReuseProgram = $towelReuseProgram;
  }
  public function getTowelReuseProgram()
  {
    return $this->towelReuseProgram;
  }
  public function setTowelReuseProgramException($towelReuseProgramException)
  {
    $this->towelReuseProgramException = $towelReuseProgramException;
  }
  public function getTowelReuseProgramException()
  {
    return $this->towelReuseProgramException;
  }
  public function setWaterSavingShowers($waterSavingShowers)
  {
    $this->waterSavingShowers = $waterSavingShowers;
  }
  public function getWaterSavingShowers()
  {
    return $this->waterSavingShowers;
  }
  public function setWaterSavingShowersException($waterSavingShowersException)
  {
    $this->waterSavingShowersException = $waterSavingShowersException;
  }
  public function getWaterSavingShowersException()
  {
    return $this->waterSavingShowersException;
  }
  public function setWaterSavingSinks($waterSavingSinks)
  {
    $this->waterSavingSinks = $waterSavingSinks;
  }
  public function getWaterSavingSinks()
  {
    return $this->waterSavingSinks;
  }
  public function setWaterSavingSinksException($waterSavingSinksException)
  {
    $this->waterSavingSinksException = $waterSavingSinksException;
  }
  public function getWaterSavingSinksException()
  {
    return $this->waterSavingSinksException;
  }
  public function setWaterSavingToilets($waterSavingToilets)
  {
    $this->waterSavingToilets = $waterSavingToilets;
  }
  public function getWaterSavingToilets()
  {
    return $this->waterSavingToilets;
  }
  public function setWaterSavingToiletsException($waterSavingToiletsException)
  {
    $this->waterSavingToiletsException = $waterSavingToiletsException;
  }
  public function getWaterSavingToiletsException()
  {
    return $this->waterSavingToiletsException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WaterConservation::class, 'Google_Service_MyBusinessLodging_WaterConservation');
