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

namespace Google\Service\PeopleService;

class PersonResponse extends \Google\Model
{
  /**
   * @var int
   */
  public $httpStatusCode;
  protected $personType = Person::class;
  protected $personDataType = '';
  /**
   * @var string
   */
  public $requestedResourceName;
  protected $statusType = Status::class;
  protected $statusDataType = '';

  /**
   * @param int
   */
  public function setHttpStatusCode($httpStatusCode)
  {
    $this->httpStatusCode = $httpStatusCode;
  }
  /**
   * @return int
   */
  public function getHttpStatusCode()
  {
    return $this->httpStatusCode;
  }
  /**
   * @param Person
   */
  public function setPerson(Person $person)
  {
    $this->person = $person;
  }
  /**
   * @return Person
   */
  public function getPerson()
  {
    return $this->person;
  }
  /**
   * @param string
   */
  public function setRequestedResourceName($requestedResourceName)
  {
    $this->requestedResourceName = $requestedResourceName;
  }
  /**
   * @return string
   */
  public function getRequestedResourceName()
  {
    return $this->requestedResourceName;
  }
  /**
   * @param Status
   */
  public function setStatus(Status $status)
  {
    $this->status = $status;
  }
  /**
   * @return Status
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PersonResponse::class, 'Google_Service_PeopleService_PersonResponse');
