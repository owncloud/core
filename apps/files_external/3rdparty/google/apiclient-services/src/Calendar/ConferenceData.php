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

namespace Google\Service\Calendar;

class ConferenceData extends \Google\Collection
{
  protected $collection_key = 'entryPoints';
  public $conferenceId;
  protected $conferenceSolutionType = ConferenceSolution::class;
  protected $conferenceSolutionDataType = '';
  protected $createRequestType = CreateConferenceRequest::class;
  protected $createRequestDataType = '';
  protected $entryPointsType = EntryPoint::class;
  protected $entryPointsDataType = 'array';
  public $notes;
  protected $parametersType = ConferenceParameters::class;
  protected $parametersDataType = '';
  public $signature;

  public function setConferenceId($conferenceId)
  {
    $this->conferenceId = $conferenceId;
  }
  public function getConferenceId()
  {
    return $this->conferenceId;
  }
  /**
   * @param ConferenceSolution
   */
  public function setConferenceSolution(ConferenceSolution $conferenceSolution)
  {
    $this->conferenceSolution = $conferenceSolution;
  }
  /**
   * @return ConferenceSolution
   */
  public function getConferenceSolution()
  {
    return $this->conferenceSolution;
  }
  /**
   * @param CreateConferenceRequest
   */
  public function setCreateRequest(CreateConferenceRequest $createRequest)
  {
    $this->createRequest = $createRequest;
  }
  /**
   * @return CreateConferenceRequest
   */
  public function getCreateRequest()
  {
    return $this->createRequest;
  }
  /**
   * @param EntryPoint[]
   */
  public function setEntryPoints($entryPoints)
  {
    $this->entryPoints = $entryPoints;
  }
  /**
   * @return EntryPoint[]
   */
  public function getEntryPoints()
  {
    return $this->entryPoints;
  }
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  public function getNotes()
  {
    return $this->notes;
  }
  /**
   * @param ConferenceParameters
   */
  public function setParameters(ConferenceParameters $parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return ConferenceParameters
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  public function setSignature($signature)
  {
    $this->signature = $signature;
  }
  public function getSignature()
  {
    return $this->signature;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConferenceData::class, 'Google_Service_Calendar_ConferenceData');
