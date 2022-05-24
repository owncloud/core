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

class GoogleCloudDialogflowV2Intent extends \Google\Collection
{
  protected $collection_key = 'trainingPhrases';
  /**
   * @var string
   */
  public $action;
  /**
   * @var string[]
   */
  public $defaultResponsePlatforms;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var bool
   */
  public $endInteraction;
  /**
   * @var string[]
   */
  public $events;
  protected $followupIntentInfoType = GoogleCloudDialogflowV2IntentFollowupIntentInfo::class;
  protected $followupIntentInfoDataType = 'array';
  /**
   * @var string[]
   */
  public $inputContextNames;
  /**
   * @var bool
   */
  public $isFallback;
  /**
   * @var bool
   */
  public $liveAgentHandoff;
  protected $messagesType = GoogleCloudDialogflowV2IntentMessage::class;
  protected $messagesDataType = 'array';
  /**
   * @var bool
   */
  public $mlDisabled;
  /**
   * @var string
   */
  public $name;
  protected $outputContextsType = GoogleCloudDialogflowV2Context::class;
  protected $outputContextsDataType = 'array';
  protected $parametersType = GoogleCloudDialogflowV2IntentParameter::class;
  protected $parametersDataType = 'array';
  /**
   * @var string
   */
  public $parentFollowupIntentName;
  /**
   * @var int
   */
  public $priority;
  /**
   * @var bool
   */
  public $resetContexts;
  /**
   * @var string
   */
  public $rootFollowupIntentName;
  protected $trainingPhrasesType = GoogleCloudDialogflowV2IntentTrainingPhrase::class;
  protected $trainingPhrasesDataType = 'array';
  /**
   * @var string
   */
  public $webhookState;

  /**
   * @param string
   */
  public function setAction($action)
  {
    $this->action = $action;
  }
  /**
   * @return string
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param string[]
   */
  public function setDefaultResponsePlatforms($defaultResponsePlatforms)
  {
    $this->defaultResponsePlatforms = $defaultResponsePlatforms;
  }
  /**
   * @return string[]
   */
  public function getDefaultResponsePlatforms()
  {
    return $this->defaultResponsePlatforms;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param bool
   */
  public function setEndInteraction($endInteraction)
  {
    $this->endInteraction = $endInteraction;
  }
  /**
   * @return bool
   */
  public function getEndInteraction()
  {
    return $this->endInteraction;
  }
  /**
   * @param string[]
   */
  public function setEvents($events)
  {
    $this->events = $events;
  }
  /**
   * @return string[]
   */
  public function getEvents()
  {
    return $this->events;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentFollowupIntentInfo[]
   */
  public function setFollowupIntentInfo($followupIntentInfo)
  {
    $this->followupIntentInfo = $followupIntentInfo;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentFollowupIntentInfo[]
   */
  public function getFollowupIntentInfo()
  {
    return $this->followupIntentInfo;
  }
  /**
   * @param string[]
   */
  public function setInputContextNames($inputContextNames)
  {
    $this->inputContextNames = $inputContextNames;
  }
  /**
   * @return string[]
   */
  public function getInputContextNames()
  {
    return $this->inputContextNames;
  }
  /**
   * @param bool
   */
  public function setIsFallback($isFallback)
  {
    $this->isFallback = $isFallback;
  }
  /**
   * @return bool
   */
  public function getIsFallback()
  {
    return $this->isFallback;
  }
  /**
   * @param bool
   */
  public function setLiveAgentHandoff($liveAgentHandoff)
  {
    $this->liveAgentHandoff = $liveAgentHandoff;
  }
  /**
   * @return bool
   */
  public function getLiveAgentHandoff()
  {
    return $this->liveAgentHandoff;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessage[]
   */
  public function setMessages($messages)
  {
    $this->messages = $messages;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessage[]
   */
  public function getMessages()
  {
    return $this->messages;
  }
  /**
   * @param bool
   */
  public function setMlDisabled($mlDisabled)
  {
    $this->mlDisabled = $mlDisabled;
  }
  /**
   * @return bool
   */
  public function getMlDisabled()
  {
    return $this->mlDisabled;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleCloudDialogflowV2Context[]
   */
  public function setOutputContexts($outputContexts)
  {
    $this->outputContexts = $outputContexts;
  }
  /**
   * @return GoogleCloudDialogflowV2Context[]
   */
  public function getOutputContexts()
  {
    return $this->outputContexts;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentParameter[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentParameter[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param string
   */
  public function setParentFollowupIntentName($parentFollowupIntentName)
  {
    $this->parentFollowupIntentName = $parentFollowupIntentName;
  }
  /**
   * @return string
   */
  public function getParentFollowupIntentName()
  {
    return $this->parentFollowupIntentName;
  }
  /**
   * @param int
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return int
   */
  public function getPriority()
  {
    return $this->priority;
  }
  /**
   * @param bool
   */
  public function setResetContexts($resetContexts)
  {
    $this->resetContexts = $resetContexts;
  }
  /**
   * @return bool
   */
  public function getResetContexts()
  {
    return $this->resetContexts;
  }
  /**
   * @param string
   */
  public function setRootFollowupIntentName($rootFollowupIntentName)
  {
    $this->rootFollowupIntentName = $rootFollowupIntentName;
  }
  /**
   * @return string
   */
  public function getRootFollowupIntentName()
  {
    return $this->rootFollowupIntentName;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentTrainingPhrase[]
   */
  public function setTrainingPhrases($trainingPhrases)
  {
    $this->trainingPhrases = $trainingPhrases;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentTrainingPhrase[]
   */
  public function getTrainingPhrases()
  {
    return $this->trainingPhrases;
  }
  /**
   * @param string
   */
  public function setWebhookState($webhookState)
  {
    $this->webhookState = $webhookState;
  }
  /**
   * @return string
   */
  public function getWebhookState()
  {
    return $this->webhookState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2Intent::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2Intent');
