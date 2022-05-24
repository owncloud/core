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

namespace Google\Service\Sasportal;

class SasPortalInstallationParams extends \Google\Model
{
  /**
   * @var int
   */
  public $antennaAzimuth;
  /**
   * @var int
   */
  public $antennaBeamwidth;
  /**
   * @var int
   */
  public $antennaDowntilt;
  /**
   * @var int
   */
  public $antennaGain;
  /**
   * @var string
   */
  public $antennaModel;
  /**
   * @var bool
   */
  public $cpeCbsdIndication;
  /**
   * @var int
   */
  public $eirpCapability;
  public $height;
  /**
   * @var string
   */
  public $heightType;
  public $horizontalAccuracy;
  /**
   * @var bool
   */
  public $indoorDeployment;
  public $latitude;
  public $longitude;
  public $verticalAccuracy;

  /**
   * @param int
   */
  public function setAntennaAzimuth($antennaAzimuth)
  {
    $this->antennaAzimuth = $antennaAzimuth;
  }
  /**
   * @return int
   */
  public function getAntennaAzimuth()
  {
    return $this->antennaAzimuth;
  }
  /**
   * @param int
   */
  public function setAntennaBeamwidth($antennaBeamwidth)
  {
    $this->antennaBeamwidth = $antennaBeamwidth;
  }
  /**
   * @return int
   */
  public function getAntennaBeamwidth()
  {
    return $this->antennaBeamwidth;
  }
  /**
   * @param int
   */
  public function setAntennaDowntilt($antennaDowntilt)
  {
    $this->antennaDowntilt = $antennaDowntilt;
  }
  /**
   * @return int
   */
  public function getAntennaDowntilt()
  {
    return $this->antennaDowntilt;
  }
  /**
   * @param int
   */
  public function setAntennaGain($antennaGain)
  {
    $this->antennaGain = $antennaGain;
  }
  /**
   * @return int
   */
  public function getAntennaGain()
  {
    return $this->antennaGain;
  }
  /**
   * @param string
   */
  public function setAntennaModel($antennaModel)
  {
    $this->antennaModel = $antennaModel;
  }
  /**
   * @return string
   */
  public function getAntennaModel()
  {
    return $this->antennaModel;
  }
  /**
   * @param bool
   */
  public function setCpeCbsdIndication($cpeCbsdIndication)
  {
    $this->cpeCbsdIndication = $cpeCbsdIndication;
  }
  /**
   * @return bool
   */
  public function getCpeCbsdIndication()
  {
    return $this->cpeCbsdIndication;
  }
  /**
   * @param int
   */
  public function setEirpCapability($eirpCapability)
  {
    $this->eirpCapability = $eirpCapability;
  }
  /**
   * @return int
   */
  public function getEirpCapability()
  {
    return $this->eirpCapability;
  }
  public function setHeight($height)
  {
    $this->height = $height;
  }
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param string
   */
  public function setHeightType($heightType)
  {
    $this->heightType = $heightType;
  }
  /**
   * @return string
   */
  public function getHeightType()
  {
    return $this->heightType;
  }
  public function setHorizontalAccuracy($horizontalAccuracy)
  {
    $this->horizontalAccuracy = $horizontalAccuracy;
  }
  public function getHorizontalAccuracy()
  {
    return $this->horizontalAccuracy;
  }
  /**
   * @param bool
   */
  public function setIndoorDeployment($indoorDeployment)
  {
    $this->indoorDeployment = $indoorDeployment;
  }
  /**
   * @return bool
   */
  public function getIndoorDeployment()
  {
    return $this->indoorDeployment;
  }
  public function setLatitude($latitude)
  {
    $this->latitude = $latitude;
  }
  public function getLatitude()
  {
    return $this->latitude;
  }
  public function setLongitude($longitude)
  {
    $this->longitude = $longitude;
  }
  public function getLongitude()
  {
    return $this->longitude;
  }
  public function setVerticalAccuracy($verticalAccuracy)
  {
    $this->verticalAccuracy = $verticalAccuracy;
  }
  public function getVerticalAccuracy()
  {
    return $this->verticalAccuracy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SasPortalInstallationParams::class, 'Google_Service_Sasportal_SasPortalInstallationParams');
