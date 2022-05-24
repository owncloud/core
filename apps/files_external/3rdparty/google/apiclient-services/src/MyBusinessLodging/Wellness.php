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
  /**
   * @var bool
   */
  public $doctorOnCall;
  /**
   * @var string
   */
  public $doctorOnCallException;
  /**
   * @var bool
   */
  public $ellipticalMachine;
  /**
   * @var string
   */
  public $ellipticalMachineException;
  /**
   * @var bool
   */
  public $fitnessCenter;
  /**
   * @var string
   */
  public $fitnessCenterException;
  /**
   * @var bool
   */
  public $freeFitnessCenter;
  /**
   * @var string
   */
  public $freeFitnessCenterException;
  /**
   * @var bool
   */
  public $freeWeights;
  /**
   * @var string
   */
  public $freeWeightsException;
  /**
   * @var bool
   */
  public $massage;
  /**
   * @var string
   */
  public $massageException;
  /**
   * @var bool
   */
  public $salon;
  /**
   * @var string
   */
  public $salonException;
  /**
   * @var bool
   */
  public $sauna;
  /**
   * @var string
   */
  public $saunaException;
  /**
   * @var bool
   */
  public $spa;
  /**
   * @var string
   */
  public $spaException;
  /**
   * @var bool
   */
  public $treadmill;
  /**
   * @var string
   */
  public $treadmillException;
  /**
   * @var bool
   */
  public $weightMachine;
  /**
   * @var string
   */
  public $weightMachineException;

  /**
   * @param bool
   */
  public function setDoctorOnCall($doctorOnCall)
  {
    $this->doctorOnCall = $doctorOnCall;
  }
  /**
   * @return bool
   */
  public function getDoctorOnCall()
  {
    return $this->doctorOnCall;
  }
  /**
   * @param string
   */
  public function setDoctorOnCallException($doctorOnCallException)
  {
    $this->doctorOnCallException = $doctorOnCallException;
  }
  /**
   * @return string
   */
  public function getDoctorOnCallException()
  {
    return $this->doctorOnCallException;
  }
  /**
   * @param bool
   */
  public function setEllipticalMachine($ellipticalMachine)
  {
    $this->ellipticalMachine = $ellipticalMachine;
  }
  /**
   * @return bool
   */
  public function getEllipticalMachine()
  {
    return $this->ellipticalMachine;
  }
  /**
   * @param string
   */
  public function setEllipticalMachineException($ellipticalMachineException)
  {
    $this->ellipticalMachineException = $ellipticalMachineException;
  }
  /**
   * @return string
   */
  public function getEllipticalMachineException()
  {
    return $this->ellipticalMachineException;
  }
  /**
   * @param bool
   */
  public function setFitnessCenter($fitnessCenter)
  {
    $this->fitnessCenter = $fitnessCenter;
  }
  /**
   * @return bool
   */
  public function getFitnessCenter()
  {
    return $this->fitnessCenter;
  }
  /**
   * @param string
   */
  public function setFitnessCenterException($fitnessCenterException)
  {
    $this->fitnessCenterException = $fitnessCenterException;
  }
  /**
   * @return string
   */
  public function getFitnessCenterException()
  {
    return $this->fitnessCenterException;
  }
  /**
   * @param bool
   */
  public function setFreeFitnessCenter($freeFitnessCenter)
  {
    $this->freeFitnessCenter = $freeFitnessCenter;
  }
  /**
   * @return bool
   */
  public function getFreeFitnessCenter()
  {
    return $this->freeFitnessCenter;
  }
  /**
   * @param string
   */
  public function setFreeFitnessCenterException($freeFitnessCenterException)
  {
    $this->freeFitnessCenterException = $freeFitnessCenterException;
  }
  /**
   * @return string
   */
  public function getFreeFitnessCenterException()
  {
    return $this->freeFitnessCenterException;
  }
  /**
   * @param bool
   */
  public function setFreeWeights($freeWeights)
  {
    $this->freeWeights = $freeWeights;
  }
  /**
   * @return bool
   */
  public function getFreeWeights()
  {
    return $this->freeWeights;
  }
  /**
   * @param string
   */
  public function setFreeWeightsException($freeWeightsException)
  {
    $this->freeWeightsException = $freeWeightsException;
  }
  /**
   * @return string
   */
  public function getFreeWeightsException()
  {
    return $this->freeWeightsException;
  }
  /**
   * @param bool
   */
  public function setMassage($massage)
  {
    $this->massage = $massage;
  }
  /**
   * @return bool
   */
  public function getMassage()
  {
    return $this->massage;
  }
  /**
   * @param string
   */
  public function setMassageException($massageException)
  {
    $this->massageException = $massageException;
  }
  /**
   * @return string
   */
  public function getMassageException()
  {
    return $this->massageException;
  }
  /**
   * @param bool
   */
  public function setSalon($salon)
  {
    $this->salon = $salon;
  }
  /**
   * @return bool
   */
  public function getSalon()
  {
    return $this->salon;
  }
  /**
   * @param string
   */
  public function setSalonException($salonException)
  {
    $this->salonException = $salonException;
  }
  /**
   * @return string
   */
  public function getSalonException()
  {
    return $this->salonException;
  }
  /**
   * @param bool
   */
  public function setSauna($sauna)
  {
    $this->sauna = $sauna;
  }
  /**
   * @return bool
   */
  public function getSauna()
  {
    return $this->sauna;
  }
  /**
   * @param string
   */
  public function setSaunaException($saunaException)
  {
    $this->saunaException = $saunaException;
  }
  /**
   * @return string
   */
  public function getSaunaException()
  {
    return $this->saunaException;
  }
  /**
   * @param bool
   */
  public function setSpa($spa)
  {
    $this->spa = $spa;
  }
  /**
   * @return bool
   */
  public function getSpa()
  {
    return $this->spa;
  }
  /**
   * @param string
   */
  public function setSpaException($spaException)
  {
    $this->spaException = $spaException;
  }
  /**
   * @return string
   */
  public function getSpaException()
  {
    return $this->spaException;
  }
  /**
   * @param bool
   */
  public function setTreadmill($treadmill)
  {
    $this->treadmill = $treadmill;
  }
  /**
   * @return bool
   */
  public function getTreadmill()
  {
    return $this->treadmill;
  }
  /**
   * @param string
   */
  public function setTreadmillException($treadmillException)
  {
    $this->treadmillException = $treadmillException;
  }
  /**
   * @return string
   */
  public function getTreadmillException()
  {
    return $this->treadmillException;
  }
  /**
   * @param bool
   */
  public function setWeightMachine($weightMachine)
  {
    $this->weightMachine = $weightMachine;
  }
  /**
   * @return bool
   */
  public function getWeightMachine()
  {
    return $this->weightMachine;
  }
  /**
   * @param string
   */
  public function setWeightMachineException($weightMachineException)
  {
    $this->weightMachineException = $weightMachineException;
  }
  /**
   * @return string
   */
  public function getWeightMachineException()
  {
    return $this->weightMachineException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Wellness::class, 'Google_Service_MyBusinessLodging_Wellness');
