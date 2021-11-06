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
  public $balcony;
  public $balconyException;
  public $livingAreaSqMeters;
  public $livingAreaSqMetersException;
  public $loft;
  public $loftException;
  public $nonSmoking;
  public $nonSmokingException;
  public $patio;
  public $patioException;
  public $stairs;
  public $stairsException;

  public function setBalcony($balcony)
  {
    $this->balcony = $balcony;
  }
  public function getBalcony()
  {
    return $this->balcony;
  }
  public function setBalconyException($balconyException)
  {
    $this->balconyException = $balconyException;
  }
  public function getBalconyException()
  {
    return $this->balconyException;
  }
  public function setLivingAreaSqMeters($livingAreaSqMeters)
  {
    $this->livingAreaSqMeters = $livingAreaSqMeters;
  }
  public function getLivingAreaSqMeters()
  {
    return $this->livingAreaSqMeters;
  }
  public function setLivingAreaSqMetersException($livingAreaSqMetersException)
  {
    $this->livingAreaSqMetersException = $livingAreaSqMetersException;
  }
  public function getLivingAreaSqMetersException()
  {
    return $this->livingAreaSqMetersException;
  }
  public function setLoft($loft)
  {
    $this->loft = $loft;
  }
  public function getLoft()
  {
    return $this->loft;
  }
  public function setLoftException($loftException)
  {
    $this->loftException = $loftException;
  }
  public function getLoftException()
  {
    return $this->loftException;
  }
  public function setNonSmoking($nonSmoking)
  {
    $this->nonSmoking = $nonSmoking;
  }
  public function getNonSmoking()
  {
    return $this->nonSmoking;
  }
  public function setNonSmokingException($nonSmokingException)
  {
    $this->nonSmokingException = $nonSmokingException;
  }
  public function getNonSmokingException()
  {
    return $this->nonSmokingException;
  }
  public function setPatio($patio)
  {
    $this->patio = $patio;
  }
  public function getPatio()
  {
    return $this->patio;
  }
  public function setPatioException($patioException)
  {
    $this->patioException = $patioException;
  }
  public function getPatioException()
  {
    return $this->patioException;
  }
  public function setStairs($stairs)
  {
    $this->stairs = $stairs;
  }
  public function getStairs()
  {
    return $this->stairs;
  }
  public function setStairsException($stairsException)
  {
    $this->stairsException = $stairsException;
  }
  public function getStairsException()
  {
    return $this->stairsException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LivingAreaLayout::class, 'Google_Service_MyBusinessLodging_LivingAreaLayout');
