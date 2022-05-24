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

class Sustainability extends \Google\Model
{
  protected $energyEfficiencyType = EnergyEfficiency::class;
  protected $energyEfficiencyDataType = '';
  protected $sustainabilityCertificationsType = SustainabilityCertifications::class;
  protected $sustainabilityCertificationsDataType = '';
  protected $sustainableSourcingType = SustainableSourcing::class;
  protected $sustainableSourcingDataType = '';
  protected $wasteReductionType = WasteReduction::class;
  protected $wasteReductionDataType = '';
  protected $waterConservationType = WaterConservation::class;
  protected $waterConservationDataType = '';

  /**
   * @param EnergyEfficiency
   */
  public function setEnergyEfficiency(EnergyEfficiency $energyEfficiency)
  {
    $this->energyEfficiency = $energyEfficiency;
  }
  /**
   * @return EnergyEfficiency
   */
  public function getEnergyEfficiency()
  {
    return $this->energyEfficiency;
  }
  /**
   * @param SustainabilityCertifications
   */
  public function setSustainabilityCertifications(SustainabilityCertifications $sustainabilityCertifications)
  {
    $this->sustainabilityCertifications = $sustainabilityCertifications;
  }
  /**
   * @return SustainabilityCertifications
   */
  public function getSustainabilityCertifications()
  {
    return $this->sustainabilityCertifications;
  }
  /**
   * @param SustainableSourcing
   */
  public function setSustainableSourcing(SustainableSourcing $sustainableSourcing)
  {
    $this->sustainableSourcing = $sustainableSourcing;
  }
  /**
   * @return SustainableSourcing
   */
  public function getSustainableSourcing()
  {
    return $this->sustainableSourcing;
  }
  /**
   * @param WasteReduction
   */
  public function setWasteReduction(WasteReduction $wasteReduction)
  {
    $this->wasteReduction = $wasteReduction;
  }
  /**
   * @return WasteReduction
   */
  public function getWasteReduction()
  {
    return $this->wasteReduction;
  }
  /**
   * @param WaterConservation
   */
  public function setWaterConservation(WaterConservation $waterConservation)
  {
    $this->waterConservation = $waterConservation;
  }
  /**
   * @return WaterConservation
   */
  public function getWaterConservation()
  {
    return $this->waterConservation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Sustainability::class, 'Google_Service_MyBusinessLodging_Sustainability');
