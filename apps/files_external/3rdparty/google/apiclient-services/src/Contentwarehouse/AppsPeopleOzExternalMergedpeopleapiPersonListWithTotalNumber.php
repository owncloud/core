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

namespace Google\Service\Contentwarehouse;

class AppsPeopleOzExternalMergedpeopleapiPersonListWithTotalNumber extends \Google\Collection
{
  protected $collection_key = 'people';
  protected $peopleType = AppsPeopleOzExternalMergedpeopleapiPerson::class;
  protected $peopleDataType = 'array';
  /**
   * @var int
   */
  public $totalNumber;

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPerson[]
   */
  public function setPeople($people)
  {
    $this->people = $people;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPerson[]
   */
  public function getPeople()
  {
    return $this->people;
  }
  /**
   * @param int
   */
  public function setTotalNumber($totalNumber)
  {
    $this->totalNumber = $totalNumber;
  }
  /**
   * @return int
   */
  public function getTotalNumber()
  {
    return $this->totalNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiPersonListWithTotalNumber::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiPersonListWithTotalNumber');
