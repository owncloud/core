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
  public $carbonFreeEnergySources;
  public $carbonFreeEnergySourcesException;
  public $energyConservationProgram;
  public $energyConservationProgramException;
  public $energyEfficientHeatingAndCoolingSystems;
  public $energyEfficientHeatingAndCoolingSystemsException;
  public $energyEfficientLighting;
  public $energyEfficientLightingException;
  public $energySavingThermostats;
  public $energySavingThermostatsException;
  public $greenBuildingDesign;
  public $greenBuildingDesignException;
  public $independentOrganizationAuditsEnergyUse;
  public $independentOrganizationAuditsEnergyUseException;

  public function setCarbonFreeEnergySources($carbonFreeEnergySources)
  {
    $this->carbonFreeEnergySources = $carbonFreeEnergySources;
  }
  public function getCarbonFreeEnergySources()
  {
    return $this->carbonFreeEnergySources;
  }
  public function setCarbonFreeEnergySourcesException($carbonFreeEnergySourcesException)
  {
    $this->carbonFreeEnergySourcesException = $carbonFreeEnergySourcesException;
  }
  public function getCarbonFreeEnergySourcesException()
  {
    return $this->carbonFreeEnergySourcesException;
  }
  public function setEnergyConservationProgram($energyConservationProgram)
  {
    $this->energyConservationProgram = $energyConservationProgram;
  }
  public function getEnergyConservationProgram()
  {
    return $this->energyConservationProgram;
  }
  public function setEnergyConservationProgramException($energyConservationProgramException)
  {
    $this->energyConservationProgramException = $energyConservationProgramException;
  }
  public function getEnergyConservationProgramException()
  {
    return $this->energyConservationProgramException;
  }
  public function setEnergyEfficientHeatingAndCoolingSystems($energyEfficientHeatingAndCoolingSystems)
  {
    $this->energyEfficientHeatingAndCoolingSystems = $energyEfficientHeatingAndCoolingSystems;
  }
  public function getEnergyEfficientHeatingAndCoolingSystems()
  {
    return $this->energyEfficientHeatingAndCoolingSystems;
  }
  public function setEnergyEfficientHeatingAndCoolingSystemsException($energyEfficientHeatingAndCoolingSystemsException)
  {
    $this->energyEfficientHeatingAndCoolingSystemsException = $energyEfficientHeatingAndCoolingSystemsException;
  }
  public function getEnergyEfficientHeatingAndCoolingSystemsException()
  {
    return $this->energyEfficientHeatingAndCoolingSystemsException;
  }
  public function setEnergyEfficientLighting($energyEfficientLighting)
  {
    $this->energyEfficientLighting = $energyEfficientLighting;
  }
  public function getEnergyEfficientLighting()
  {
    return $this->energyEfficientLighting;
  }
  public function setEnergyEfficientLightingException($energyEfficientLightingException)
  {
    $this->energyEfficientLightingException = $energyEfficientLightingException;
  }
  public function getEnergyEfficientLightingException()
  {
    return $this->energyEfficientLightingException;
  }
  public function setEnergySavingThermostats($energySavingThermostats)
  {
    $this->energySavingThermostats = $energySavingThermostats;
  }
  public function getEnergySavingThermostats()
  {
    return $this->energySavingThermostats;
  }
  public function setEnergySavingThermostatsException($energySavingThermostatsException)
  {
    $this->energySavingThermostatsException = $energySavingThermostatsException;
  }
  public function getEnergySavingThermostatsException()
  {
    return $this->energySavingThermostatsException;
  }
  public function setGreenBuildingDesign($greenBuildingDesign)
  {
    $this->greenBuildingDesign = $greenBuildingDesign;
  }
  public function getGreenBuildingDesign()
  {
    return $this->greenBuildingDesign;
  }
  public function setGreenBuildingDesignException($greenBuildingDesignException)
  {
    $this->greenBuildingDesignException = $greenBuildingDesignException;
  }
  public function getGreenBuildingDesignException()
  {
    return $this->greenBuildingDesignException;
  }
  public function setIndependentOrganizationAuditsEnergyUse($independentOrganizationAuditsEnergyUse)
  {
    $this->independentOrganizationAuditsEnergyUse = $independentOrganizationAuditsEnergyUse;
  }
  public function getIndependentOrganizationAuditsEnergyUse()
  {
    return $this->independentOrganizationAuditsEnergyUse;
  }
  public function setIndependentOrganizationAuditsEnergyUseException($independentOrganizationAuditsEnergyUseException)
  {
    $this->independentOrganizationAuditsEnergyUseException = $independentOrganizationAuditsEnergyUseException;
  }
  public function getIndependentOrganizationAuditsEnergyUseException()
  {
    return $this->independentOrganizationAuditsEnergyUseException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnergyEfficiency::class, 'Google_Service_MyBusinessLodging_EnergyEfficiency');
