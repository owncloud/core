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

class LivingAreaLayout extends \Google\Model
{
  /**
   * @var bool
   */
  public $balcony;
  /**
   * @var string
   */
  public $balconyException;
  /**
   * @var float
   */
  public $livingAreaSqMeters;
  /**
   * @var string
   */
  public $livingAreaSqMetersException;
  /**
   * @var bool
   */
  public $loft;
  /**
   * @var string
   */
  public $loftException;
  /**
   * @var bool
   */
  public $nonSmoking;
  /**
   * @var string
   */
  public $nonSmokingException;
  /**
   * @var bool
   */
  public $patio;
  /**
   * @var string
   */
  public $patioException;
  /**
   * @var bool
   */
  public $stairs;
  /**
   * @var string
   */
  public $stairsException;

  /**
   * @param bool
   */
  public function setBalcony($balcony)
  {
    $this->balcony = $balcony;
  }
  /**
   * @return bool
   */
  public function getBalcony()
  {
    return $this->balcony;
  }
  /**
   * @param string
   */
  public function setBalconyException($balconyException)
  {
    $this->balconyException = $balconyException;
  }
  /**
   * @return string
   */
  public function getBalconyException()
  {
    return $this->balconyException;
  }
  /**
   * @param float
   */
  public function setLivingAreaSqMeters($livingAreaSqMeters)
  {
    $this->livingAreaSqMeters = $livingAreaSqMeters;
  }
  /**
   * @return float
   */
  public function getLivingAreaSqMeters()
  {
    return $this->livingAreaSqMeters;
  }
  /**
   * @param string
   */
  public function setLivingAreaSqMetersException($livingAreaSqMetersException)
  {
    $this->livingAreaSqMetersException = $livingAreaSqMetersException;
  }
  /**
   * @return string
   */
  public function getLivingAreaSqMetersException()
  {
    return $this->livingAreaSqMetersException;
  }
  /**
   * @param bool
   */
  public function setLoft($loft)
  {
    $this->loft = $loft;
  }
  /**
   * @return bool
   */
  public function getLoft()
  {
    return $this->loft;
  }
  /**
   * @param string
   */
  public function setLoftException($loftException)
  {
    $this->loftException = $loftException;
  }
  /**
   * @return string
   */
  public function getLoftException()
  {
    return $this->loftException;
  }
  /**
   * @param bool
   */
  public function setNonSmoking($nonSmoking)
  {
    $this->nonSmoking = $nonSmoking;
  }
  /**
   * @return bool
   */
  public function getNonSmoking()
  {
    return $this->nonSmoking;
  }
  /**
   * @param string
   */
  public function setNonSmokingException($nonSmokingException)
  {
    $this->nonSmokingException = $nonSmokingException;
  }
  /**
   * @return string
   */
  public function getNonSmokingException()
  {
    return $this->nonSmokingException;
  }
  /**
   * @param bool
   */
  public function setPatio($patio)
  {
    $this->patio = $patio;
  }
  /**
   * @return bool
   */
  public function getPatio()
  {
    return $this->patio;
  }
  /**
   * @param string
   */
  public function setPatioException($patioException)
  {
    $this->patioException = $patioException;
  }
  /**
   * @return string
   */
  public function getPatioException()
  {
    return $this->patioException;
  }
  /**
   * @param bool
   */
  public function setStairs($stairs)
  {
    $this->stairs = $stairs;
  }
  /**
   * @return bool
   */
  public function getStairs()
  {
    return $this->stairs;
  }
  /**
   * @param string
   */
  public function setStairsException($stairsException)
  {
    $this->stairsException = $stairsException;
  }
  /**
   * @return string
   */
  public function getStairsException()
  {
    return $this->stairsException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LivingAreaLayout::class, 'Google_Service_MyBusinessLodging_LivingAreaLayout');
