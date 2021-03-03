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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ConversationTurn extends Google_Model
{
  protected $userInputType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ConversationTurnUserInput';
  protected $userInputDataType = '';
  protected $virtualAgentOutputType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ConversationTurnVirtualAgentOutput';
  protected $virtualAgentOutputDataType = '';

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ConversationTurnUserInput
   */
  public function setUserInput(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ConversationTurnUserInput $userInput)
  {
    $this->userInput = $userInput;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ConversationTurnUserInput
   */
  public function getUserInput()
  {
    return $this->userInput;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ConversationTurnVirtualAgentOutput
   */
  public function setVirtualAgentOutput(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ConversationTurnVirtualAgentOutput $virtualAgentOutput)
  {
    $this->virtualAgentOutput = $virtualAgentOutput;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ConversationTurnVirtualAgentOutput
   */
  public function getVirtualAgentOutput()
  {
    return $this->virtualAgentOutput;
  }
}
