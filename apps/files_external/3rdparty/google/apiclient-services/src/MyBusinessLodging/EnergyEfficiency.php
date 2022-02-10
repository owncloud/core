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

class EnergyEfficiency extends \Google\Model
{
  /**
   * @var bool
   */
  public $carbonFreeEnergySources;
  /**
   * @var string
   */
  public $carbonFreeEnergySourcesException;
  /**
   * @var bool
   */
  public $energyConservationProgram;
  /**
   * @var string
   */
  public $energyConservationProgramException;
  /**
   * @var bool
   */
  public $energyEfficientHeatingAndCoolingSystems;
  /**
   * @var string
   */
  public $energyEfficientHeatingAndCoolingSystemsException;
  /**
   * @var bool
   */
  public $energyEfficientLighting;
  /**
   * @var string
   */
  public $energyEfficientLightingException;
  /**
   * @var bool
   */
  public $energySavingThermostats;
  /**
   * @var string
   */
  public $energySavingThermostatsException;
  /**
   * @var bool
   */
  public $greenBuildingDesign;
  /**
   * @var string
   */
  public $greenBuildingDesignException;
  /**
   * @var bool
   */
  public $independentOrganizationAuditsEnergyUse;
  /**
   * @var string
   */
  public $independentOrganizationAuditsEnergyUseException;

  /**
   * @param bool
   */
  public function setCarbonFreeEnergySources($carbonFreeEnergySources)
  {
    $this->carbonFreeEnergySources = $carbonFreeEnergySources;
  }
  /**
   * @return bool
   */
  public function getCarbonFreeEnergySources()
  {
    return $this->carbonFreeEnergySources;
  }
  /**
   * @param string
   */
  public function setCarbonFreeEnergySourcesException($carbonFreeEnergySourcesException)
  {
    $this->carbonFreeEnergySourcesException = $carbonFreeEnergySourcesException;
  }
  /**
   * @return string
   */
  public function getCarbonFreeEnergySourcesException()
  {
    return $this->carbonFreeEnergySourcesException;
  }
  /**
   * @param bool
   */
  public function setEnergyConservationProgram($energyConservationProgram)
  {
    $this->energyConservationProgram = $energyConservationProgram;
  }
  /**
   * @return bool
   */
  public function getEnergyConservationProgram()
  {
    return $this->energyConservationProgram;
  }
  /**
   * @param string
   */
  public function setEnergyConservationProgramException($energyConservationProgramException)
  {
    $this->energyConservationProgramException = $energyConservationProgramException;
  }
  /**
   * @return string
   */
  public function getEnergyConservationProgramException()
  {
    return $this->energyConservationProgramException;
  }
  /**
   * @param bool
   */
  public function setEnergyEfficientHeatingAndCoolingSystems($energyEfficientHeatingAndCoolingSystems)
  {
    $this->energyEfficientHeatingAndCoolingSystems = $energyEfficientHeatingAndCoolingSystems;
  }
  /**
   * @return bool
   */
  public function getEnergyEfficientHeatingAndCoolingSystems()
  {
    return $this->energyEfficientHeatingAndCoolingSystems;
  }
  /**
   * @param string
   */
  public function setEnergyEfficientHeatingAndCoolingSystemsException($energyEfficientHeatingAndCoolingSystemsException)
  {
    $this->energyEfficientHeatingAndCoolingSystemsException = $energyEfficientHeatingAndCoolingSystemsException;
  }
  /**
   * @return string
   */
  public function getEnergyEfficientHeatingAndCoolingSystemsException()
  {
    return $this->energyEfficientHeatingAndCoolingSystemsException;
  }
  /**
   * @param bool
   */
  public function setEnergyEfficientLighting($energyEfficientLighting)
  {
    $this->energyEfficientLighting = $energyEfficientLighting;
  }
  /**
   * @return bool
   */
  public function getEnergyEfficientLighting()
  {
    return $this->energyEfficientLighting;
  }
  /**
   * @param string
   */
  public function setEnergyEfficientLightingException($energyEfficientLightingException)
  {
    $this->energyEfficientLightingException = $energyEfficientLightingException;
  }
  /**
   * @return string
   */
  public function getEnergyEfficientLightingException()
  {
    return $this->energyEfficientLightingException;
  }
  /**
   * @param bool
   */
  public function setEnergySavingThermostats($energySavingThermostats)
  {
    $this->energySavingThermostats = $energySavingThermostats;
  }
  /**
   * @return bool
   */
  public function getEnergySavingThermostats()
  {
    return $this->energySavingThermostats;
  }
  /**
   * @param string
   */
  public function setEnergySavingThermostatsException($energySavingThermostatsException)
  {
    $this->energySavingThermostatsException = $energySavingThermostatsException;
  }
  /**
   * @return string
   */
  public function getEnergySavingThermostatsException()
  {
    return $this->energySavingThermostatsException;
  }
  /**
   * @param bool
   */
  public function setGreenBuildingDesign($greenBuildingDesign)
  {
    $this->greenBuildingDesign = $greenBuildingDesign;
  }
  /**
   * @return bool
   */
  public function getGreenBuildingDesign()
  {
    return $this->greenBuildingDesign;
  }
  /**
   * @param string
   */
  public function setGreenBuildingDesignException($greenBuildingDesignException)
  {
    $this->greenBuildingDesignException = $greenBuildingDesignException;
  }
  /**
   * @return string
   */
  public function getGreenBuildingDesignException()
  {
    return $this->greenBuildingDesignException;
  }
  /**
   * @param bool
   */
  public function setIndependentOrganizationAuditsEnergyUse($independentOrganizationAuditsEnergyUse)
  {
    $this->independentOrganizationAuditsEnergyUse = $independentOrganizationAuditsEnergyUse;
  }
  /**
   * @return bool
   */
  public function getIndependentOrganizationAuditsEnergyUse()
  {
    return $this->independentOrganizationAuditsEnergyUse;
  }
  /**
   * @param string
   */
  public function setIndependentOrganizationAuditsEnergyUseException($independentOrganizationAuditsEnergyUseException)
  {
    $this->independentOrganizationAuditsEnergyUseException = $independentOrganizationAuditsEnergyUseException;
  }
  /**
   * @return string
   */
  public function getIndependentOrganizationAuditsEnergyUseException()
  {
    return $this->independentOrganizationAuditsEnergyUseException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnergyEfficiency::class, 'Google_Service_MyBusinessLodging_EnergyEfficiency');
