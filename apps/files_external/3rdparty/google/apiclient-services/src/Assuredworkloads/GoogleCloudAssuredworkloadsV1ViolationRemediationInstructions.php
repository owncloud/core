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

class GoogleCloudAssuredworkloadsV1ViolationRemediationInstructions extends \Google\Model
{
  protected $consoleInstructionsType = GoogleCloudAssuredworkloadsV1ViolationRemediationInstructionsConsole::class;
  protected $consoleInstructionsDataType = '';
  protected $gcloudInstructionsType = GoogleCloudAssuredworkloadsV1ViolationRemediationInstructionsGcloud::class;
  protected $gcloudInstructionsDataType = '';

  /**
   * @param GoogleCloudAssuredworkloadsV1ViolationRemediationInstructionsConsole
   */
  public function setConsoleInstructions(GoogleCloudAssuredworkloadsV1ViolationRemediationInstructionsConsole $consoleInstructions)
  {
    $this->consoleInstructions = $consoleInstructions;
  }
  /**
   * @return GoogleCloudAssuredworkloadsV1ViolationRemediationInstructionsConsole
   */
  public function getConsoleInstructions()
  {
    return $this->consoleInstructions;
  }
  /**
   * @param GoogleCloudAssuredworkloadsV1ViolationRemediationInstructionsGcloud
   */
  public function setGcloudInstructions(GoogleCloudAssuredworkloadsV1ViolationRemediationInstructionsGcloud $gcloudInstructions)
  {
    $this->gcloudInstructions = $gcloudInstructions;
  }
  /**
   * @return GoogleCloudAssuredworkloadsV1ViolationRemediationInstructionsGcloud
   */
  public function getGcloudInstructions()
  {
    return $this->gcloudInstructions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudAssuredworkloadsV1ViolationRemediationInstructions::class, 'Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1ViolationRemediationInstructions');
