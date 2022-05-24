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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3ConversationTurn extends \Google\Model
{
  protected $userInputType = GoogleCloudDialogflowCxV3ConversationTurnUserInput::class;
  protected $userInputDataType = '';
  protected $virtualAgentOutputType = GoogleCloudDialogflowCxV3ConversationTurnVirtualAgentOutput::class;
  protected $virtualAgentOutputDataType = '';

  /**
   * @param GoogleCloudDialogflowCxV3ConversationTurnUserInput
   */
  public function setUserInput(GoogleCloudDialogflowCxV3ConversationTurnUserInput $userInput)
  {
    $this->userInput = $userInput;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ConversationTurnUserInput
   */
  public function getUserInput()
  {
    return $this->userInput;
  }
  /**
   * @param GoogleCloudDialogflowCxV3ConversationTurnVirtualAgentOutput
   */
  public function setVirtualAgentOutput(GoogleCloudDialogflowCxV3ConversationTurnVirtualAgentOutput $virtualAgentOutput)
  {
    $this->virtualAgentOutput = $virtualAgentOutput;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ConversationTurnVirtualAgentOutput
   */
  public function getVirtualAgentOutput()
  {
    return $this->virtualAgentOutput;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3ConversationTurn::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ConversationTurn');
