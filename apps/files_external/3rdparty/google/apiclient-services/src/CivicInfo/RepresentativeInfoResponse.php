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

namespace Google\Service\CivicInfo;

class RepresentativeInfoResponse extends \Google\Collection
{
  protected $collection_key = 'officials';
  protected $divisionsType = GeographicDivision::class;
  protected $divisionsDataType = 'map';
  /**
   * @var string
   */
  public $kind;
  protected $normalizedInputType = SimpleAddressType::class;
  protected $normalizedInputDataType = '';
  protected $officesType = Office::class;
  protected $officesDataType = 'array';
  protected $officialsType = Official::class;
  protected $officialsDataType = 'array';

  /**
   * @param GeographicDivision[]
   */
  public function setDivisions($divisions)
  {
    $this->divisions = $divisions;
  }
  /**
   * @return GeographicDivision[]
   */
  public function getDivisions()
  {
    return $this->divisions;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param SimpleAddressType
   */
  public function setNormalizedInput(SimpleAddressType $normalizedInput)
  {
    $this->normalizedInput = $normalizedInput;
  }
  /**
   * @return SimpleAddressType
   */
  public function getNormalizedInput()
  {
    return $this->normalizedInput;
  }
  /**
   * @param Office[]
   */
  public function setOffices($offices)
  {
    $this->offices = $offices;
  }
  /**
   * @return Office[]
   */
  public function getOffices()
  {
    return $this->offices;
  }
  /**
   * @param Official[]
   */
  public function setOfficials($officials)
  {
    $this->officials = $officials;
  }
  /**
   * @return Official[]
   */
  public function getOfficials()
  {
    return $this->officials;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepresentativeInfoResponse::class, 'Google_Service_CivicInfo_RepresentativeInfoResponse');
