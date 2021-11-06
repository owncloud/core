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

class Wellness extends \Google\Model
{
  public $doctorOnCall;
  public $doctorOnCallException;
  public $ellipticalMachine;
  public $ellipticalMachineException;
  public $fitnessCenter;
  public $fitnessCenterException;
  public $freeFitnessCenter;
  public $freeFitnessCenterException;
  public $freeWeights;
  public $freeWeightsException;
  public $massage;
  public $massageException;
  public $salon;
  public $salonException;
  public $sauna;
  public $saunaException;
  public $spa;
  public $spaException;
  public $treadmill;
  public $treadmillException;
  public $weightMachine;
  public $weightMachineException;

  public function setDoctorOnCall($doctorOnCall)
  {
    $this->doctorOnCall = $doctorOnCall;
  }
  public function getDoctorOnCall()
  {
    return $this->doctorOnCall;
  }
  public function setDoctorOnCallException($doctorOnCallException)
  {
    $this->doctorOnCallException = $doctorOnCallException;
  }
  public function getDoctorOnCallException()
  {
    return $this->doctorOnCallException;
  }
  public function setEllipticalMachine($ellipticalMachine)
  {
    $this->ellipticalMachine = $ellipticalMachine;
  }
  public function getEllipticalMachine()
  {
    return $this->ellipticalMachine;
  }
  public function setEllipticalMachineException($ellipticalMachineException)
  {
    $this->ellipticalMachineException = $ellipticalMachineException;
  }
  public function getEllipticalMachineException()
  {
    return $this->ellipticalMachineException;
  }
  public function setFitnessCenter($fitnessCenter)
  {
    $this->fitnessCenter = $fitnessCenter;
  }
  public function getFitnessCenter()
  {
    return $this->fitnessCenter;
  }
  public function setFitnessCenterException($fitnessCenterException)
  {
    $this->fitnessCenterException = $fitnessCenterException;
  }
  public function getFitnessCenterException()
  {
    return $this->fitnessCenterException;
  }
  public function setFreeFitnessCenter($freeFitnessCenter)
  {
    $this->freeFitnessCenter = $freeFitnessCenter;
  }
  public function getFreeFitnessCenter()
  {
    return $this->freeFitnessCenter;
  }
  public function setFreeFitnessCenterException($freeFitnessCenterException)
  {
    $this->freeFitnessCenterException = $freeFitnessCenterException;
  }
  public function getFreeFitnessCenterException()
  {
    return $this->freeFitnessCenterException;
  }
  public function setFreeWeights($freeWeights)
  {
    $this->freeWeights = $freeWeights;
  }
  public function getFreeWeights()
  {
    return $this->freeWeights;
  }
  public function setFreeWeightsException($freeWeightsException)
  {
    $this->freeWeightsException = $freeWeightsException;
  }
  public function getFreeWeightsException()
  {
    return $this->freeWeightsException;
  }
  public function setMassage($massage)
  {
    $this->massage = $massage;
  }
  public function getMassage()
  {
    return $this->massage;
  }
  public function setMassageException($massageException)
  {
    $this->massageException = $massageException;
  }
  public function getMassageException()
  {
    return $this->massageException;
  }
  public function setSalon($salon)
  {
    $this->salon = $salon;
  }
  public function getSalon()
  {
    return $this->salon;
  }
  public function setSalonException($salonException)
  {
    $this->salonException = $salonException;
  }
  public function getSalonException()
  {
    return $this->salonException;
  }
  public function setSauna($sauna)
  {
    $this->sauna = $sauna;
  }
  public function getSauna()
  {
    return $this->sauna;
  }
  public function setSaunaException($saunaException)
  {
    $this->saunaException = $saunaException;
  }
  public function getSaunaException()
  {
    return $this->saunaException;
  }
  public function setSpa($spa)
  {
    $this->spa = $spa;
  }
  public function getSpa()
  {
    return $this->spa;
  }
  public function setSpaException($spaException)
  {
    $this->spaException = $spaException;
  }
  public function getSpaException()
  {
    return $this->spaException;
  }
  public function setTreadmill($treadmill)
  {
    $this->treadmill = $treadmill;
  }
  public function getTreadmill()
  {
    return $this->treadmill;
  }
  public function setTreadmillException($treadmillException)
  {
    $this->treadmillException = $treadmillException;
  }
  public function getTreadmillException()
  {
    return $this->treadmillException;
  }
  public function setWeightMachine($weightMachine)
  {
    $this->weightMachine = $weightMachine;
  }
  public function getWeightMachine()
  {
    return $this->weightMachine;
  }
  public function setWeightMachineException($weightMachineException)
  {
    $this->weightMachineException = $weightMachineException;
  }
  public function getWeightMachineException()
  {
    return $this->weightMachineException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Wellness::class, 'Google_Service_MyBusinessLodging_Wellness');
