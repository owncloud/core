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

class Pets extends \Google\Model
{
  public $catsAllowed;
  public $catsAllowedException;
  public $dogsAllowed;
  public $dogsAllowedException;
  public $petsAllowed;
  public $petsAllowedException;
  public $petsAllowedFree;
  public $petsAllowedFreeException;

  public function setCatsAllowed($catsAllowed)
  {
    $this->catsAllowed = $catsAllowed;
  }
  public function getCatsAllowed()
  {
    return $this->catsAllowed;
  }
  public function setCatsAllowedException($catsAllowedException)
  {
    $this->catsAllowedException = $catsAllowedException;
  }
  public function getCatsAllowedException()
  {
    return $this->catsAllowedException;
  }
  public function setDogsAllowed($dogsAllowed)
  {
    $this->dogsAllowed = $dogsAllowed;
  }
  public function getDogsAllowed()
  {
    return $this->dogsAllowed;
  }
  public function setDogsAllowedException($dogsAllowedException)
  {
    $this->dogsAllowedException = $dogsAllowedException;
  }
  public function getDogsAllowedException()
  {
    return $this->dogsAllowedException;
  }
  public function setPetsAllowed($petsAllowed)
  {
    $this->petsAllowed = $petsAllowed;
  }
  public function getPetsAllowed()
  {
    return $this->petsAllowed;
  }
  public function setPetsAllowedException($petsAllowedException)
  {
    $this->petsAllowedException = $petsAllowedException;
  }
  public function getPetsAllowedException()
  {
    return $this->petsAllowedException;
  }
  public function setPetsAllowedFree($petsAllowedFree)
  {
    $this->petsAllowedFree = $petsAllowedFree;
  }
  public function getPetsAllowedFree()
  {
    return $this->petsAllowedFree;
  }
  public function setPetsAllowedFreeException($petsAllowedFreeException)
  {
    $this->petsAllowedFreeException = $petsAllowedFreeException;
  }
  public function getPetsAllowedFreeException()
  {
    return $this->petsAllowedFreeException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Pets::class, 'Google_Service_MyBusinessLodging_Pets');
