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
  /**
   * @var string
   */
  public $breeamCertification;
  /**
   * @var string
   */
  public $breeamCertificationException;
  protected $ecoCertificationsType = EcoCertification::class;
  protected $ecoCertificationsDataType = 'array';
  /**
   * @var string
   */
  public $leedCertification;
  /**
   * @var string
   */
  public $leedCertificationException;

  /**
   * @param string
   */
  public function setBreeamCertification($breeamCertification)
  {
    $this->breeamCertification = $breeamCertification;
  }
  /**
   * @return string
   */
  public function getBreeamCertification()
  {
    return $this->breeamCertification;
  }
  /**
   * @param string
   */
  public function setBreeamCertificationException($breeamCertificationException)
  {
    $this->breeamCertificationException = $breeamCertificationException;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setLeedCertification($leedCertification)
  {
    $this->leedCertification = $leedCertification;
  }
  /**
   * @return string
   */
  public function getLeedCertification()
  {
    return $this->leedCertification;
  }
  /**
   * @param string
   */
  public function setLeedCertificationException($leedCertificationException)
  {
    $this->leedCertificationException = $leedCertificationException;
  }
  /**
   * @return string
   */
  public function getLeedCertificationException()
  {
    return $this->leedCertificationException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SustainabilityCertifications::class, 'Google_Service_MyBusinessLodging_SustainabilityCertifications');
