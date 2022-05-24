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
  /**
   * @var bool
   */
  public $catsAllowed;
  /**
   * @var string
   */
  public $catsAllowedException;
  /**
   * @var bool
   */
  public $dogsAllowed;
  /**
   * @var string
   */
  public $dogsAllowedException;
  /**
   * @var bool
   */
  public $petsAllowed;
  /**
   * @var string
   */
  public $petsAllowedException;
  /**
   * @var bool
   */
  public $petsAllowedFree;
  /**
   * @var string
   */
  public $petsAllowedFreeException;

  /**
   * @param bool
   */
  public function setCatsAllowed($catsAllowed)
  {
    $this->catsAllowed = $catsAllowed;
  }
  /**
   * @return bool
   */
  public function getCatsAllowed()
  {
    return $this->catsAllowed;
  }
  /**
   * @param string
   */
  public function setCatsAllowedException($catsAllowedException)
  {
    $this->catsAllowedException = $catsAllowedException;
  }
  /**
   * @return string
   */
  public function getCatsAllowedException()
  {
    return $this->catsAllowedException;
  }
  /**
   * @param bool
   */
  public function setDogsAllowed($dogsAllowed)
  {
    $this->dogsAllowed = $dogsAllowed;
  }
  /**
   * @return bool
   */
  public function getDogsAllowed()
  {
    return $this->dogsAllowed;
  }
  /**
   * @param string
   */
  public function setDogsAllowedException($dogsAllowedException)
  {
    $this->dogsAllowedException = $dogsAllowedException;
  }
  /**
   * @return string
   */
  public function getDogsAllowedException()
  {
    return $this->dogsAllowedException;
  }
  /**
   * @param bool
   */
  public function setPetsAllowed($petsAllowed)
  {
    $this->petsAllowed = $petsAllowed;
  }
  /**
   * @return bool
   */
  public function getPetsAllowed()
  {
    return $this->petsAllowed;
  }
  /**
   * @param string
   */
  public function setPetsAllowedException($petsAllowedException)
  {
    $this->petsAllowedException = $petsAllowedException;
  }
  /**
   * @return string
   */
  public function getPetsAllowedException()
  {
    return $this->petsAllowedException;
  }
  /**
   * @param bool
   */
  public function setPetsAllowedFree($petsAllowedFree)
  {
    $this->petsAllowedFree = $petsAllowedFree;
  }
  /**
   * @return bool
   */
  public function getPetsAllowedFree()
  {
    return $this->petsAllowedFree;
  }
  /**
   * @param string
   */
  public function setPetsAllowedFreeException($petsAllowedFreeException)
  {
    $this->petsAllowedFreeException = $petsAllowedFreeException;
  }
  /**
   * @return string
   */
  public function getPetsAllowedFreeException()
  {
    return $this->petsAllowedFreeException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Pets::class, 'Google_Service_MyBusinessLodging_Pets');
