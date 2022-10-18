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

namespace Google\Service\Assuredworkloads;

class GoogleCloudAssuredworkloadsV1ViolationRemediation extends \Google\Collection
{
  protected $collection_key = 'compliantValues';
  /**
   * @var string[]
   */
  public $compliantValues;
  protected $instructionsType = GoogleCloudAssuredworkloadsV1ViolationRemediationInstructions::class;
  protected $instructionsDataType = '';
  /**
   * @var string
   */
  public $remediationType;

  /**
   * @param string[]
   */
  public function setCompliantValues($compliantValues)
  {
    $this->compliantValues = $compliantValues;
  }
  /**
   * @return string[]
   */
  public function getCompliantValues()
  {
    return $this->compliantValues;
  }
  /**
   * @param GoogleCloudAssuredworkloadsV1ViolationRemediationInstructions
   */
  public function setInstructions(GoogleCloudAssuredworkloadsV1ViolationRemediationInstructions $instructions)
  {
    $this->instructions = $instructions;
  }
  /**
   * @return GoogleCloudAssuredworkloadsV1ViolationRemediationInstructions
   */
  public function getInstructions()
  {
    return $this->instructions;
  }
  /**
   * @param string
   */
  public function setRemediationType($remediationType)
  {
    $this->remediationType = $remediationType;
  }
  /**
   * @return string
   */
  public function getRemediationType()
  {
    return $this->remediationType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudAssuredworkloadsV1ViolationRemediation::class, 'Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1ViolationRemediation');
