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

class AdministrationRegion extends \Google\Collection
{
  protected $collection_key = 'sources';
  protected $internal_gapi_mappings = [
        "localJurisdiction" => "local_jurisdiction",
  ];
  protected $electionAdministrationBodyType = AdministrativeBody::class;
  protected $electionAdministrationBodyDataType = '';
  protected $localJurisdictionType = AdministrationRegion::class;
  protected $localJurisdictionDataType = '';
  public $name;
  protected $sourcesType = Source::class;
  protected $sourcesDataType = 'array';

  /**
   * @param AdministrativeBody
   */
  public function setElectionAdministrationBody(AdministrativeBody $electionAdministrationBody)
  {
    $this->electionAdministrationBody = $electionAdministrationBody;
  }
  /**
   * @return AdministrativeBody
   */
  public function getElectionAdministrationBody()
  {
    return $this->electionAdministrationBody;
  }
  /**
   * @param AdministrationRegion
   */
  public function setLocalJurisdiction(AdministrationRegion $localJurisdiction)
  {
    $this->localJurisdiction = $localJurisdiction;
  }
  /**
   * @return AdministrationRegion
   */
  public function getLocalJurisdiction()
  {
    return $this->localJurisdiction;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Source[]
   */
  public function setSources($sources)
  {
    $this->sources = $sources;
  }
  /**
   * @return Source[]
   */
  public function getSources()
  {
    return $this->sources;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdministrationRegion::class, 'Google_Service_CivicInfo_AdministrationRegion');
