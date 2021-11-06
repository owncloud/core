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
  public $antennaAzimuth;
  public $antennaBeamwidth;
  public $antennaDowntilt;
  public $antennaGain;
  public $antennaModel;
  public $cpeCbsdIndication;
  public $eirpCapability;
  public $height;
  public $heightType;
  public $horizontalAccuracy;
  public $indoorDeployment;
  public $latitude;
  public $longitude;
  public $verticalAccuracy;

  public function setAntennaAzimuth($antennaAzimuth)
  {
    $this->antennaAzimuth = $antennaAzimuth;
  }
  public function getAntennaAzimuth()
  {
    return $this->antennaAzimuth;
  }
  public function setAntennaBeamwidth($antennaBeamwidth)
  {
    $this->antennaBeamwidth = $antennaBeamwidth;
  }
  public function getAntennaBeamwidth()
  {
    return $this->antennaBeamwidth;
  }
  public function setAntennaDowntilt($antennaDowntilt)
  {
    $this->antennaDowntilt = $antennaDowntilt;
  }
  public function getAntennaDowntilt()
  {
    return $this->antennaDowntilt;
  }
  public function setAntennaGain($antennaGain)
  {
    $this->antennaGain = $antennaGain;
  }
  public function getAntennaGain()
  {
    return $this->antennaGain;
  }
  public function setAntennaModel($antennaModel)
  {
    $this->antennaModel = $antennaModel;
  }
  public function getAntennaModel()
  {
    return $this->antennaModel;
  }
  public function setCpeCbsdIndication($cpeCbsdIndication)
  {
    $this->cpeCbsdIndication = $cpeCbsdIndication;
  }
  public function getCpeCbsdIndication()
  {
    return $this->cpeCbsdIndication;
  }
  public function setEirpCapability($eirpCapability)
  {
    $this->eirpCapability = $eirpCapability;
  }
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
  public function setHeightType($heightType)
  {
    $this->heightType = $heightType;
  }
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
  public function setIndoorDeployment($indoorDeployment)
  {
    $this->indoorDeployment = $indoorDeployment;
  }
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
