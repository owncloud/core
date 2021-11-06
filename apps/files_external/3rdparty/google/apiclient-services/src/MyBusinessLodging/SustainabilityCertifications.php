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

class SustainabilityCertifications extends \Google\Collection
{
  protected $collection_key = 'ecoCertifications';
  public $breeamCertification;
  public $breeamCertificationException;
  protected $ecoCertificationsType = EcoCertification::class;
  protected $ecoCertificationsDataType = 'array';
  public $leedCertification;
  public $leedCertificationException;

  public function setBreeamCertification($breeamCertification)
  {
    $this->breeamCertification = $breeamCertification;
  }
  public function getBreeamCertification()
  {
    return $this->breeamCertification;
  }
  public function setBreeamCertificationException($breeamCertificationException)
  {
    $this->breeamCertificationException = $breeamCertificationException;
  }
  public function getBreeamCertificationException()
  {
    return $this->breeamCertificationException;
  }
  /**
   * @param EcoCertification[]
   */
  public function setEcoCertifications($ecoCertifications)
  {
    $this->ecoCertifications = $ecoCertifications;
  }
  /**
   * @return EcoCertification[]
   */
  public function getEcoCertifications()
  {
    return $this->ecoCertifications;
  }
  public function setLeedCertification($leedCertification)
  {
    $this->leedCertification = $leedCertification;
  }
  public function getLeedCertification()
  {
    return $this->leedCertification;
  }
  public function setLeedCertificationException($leedCertificationException)
  {
    $this->leedCertificationException = $leedCertificationException;
  }
  public function getLeedCertificationException()
  {
    return $this->leedCertificationException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SustainabilityCertifications::class, 'Google_Service_MyBusinessLodging_SustainabilityCertifications');
