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

class Google_Service_Pubsub_Subscription extends Google_Model
{
  public $ackDeadlineSeconds;
  protected $deadLetterPolicyType = 'Google_Service_Pubsub_DeadLetterPolicy';
  protected $deadLetterPolicyDataType = '';
  protected $expirationPolicyType = 'Google_Service_Pubsub_ExpirationPolicy';
  protected $expirationPolicyDataType = '';
  public $filter;
  public $labels;
  public $messageRetentionDuration;
  public $name;
  protected $pushConfigType = 'Google_Service_Pubsub_PushConfig';
  protected $pushConfigDataType = '';
  public $retainAckedMessages;
  public $topic;

  public function setAckDeadlineSeconds($ackDeadlineSeconds)
  {
    $this->ackDeadlineSeconds = $ackDeadlineSeconds;
  }
  public function getAckDeadlineSeconds()
  {
    return $this->ackDeadlineSeconds;
  }
  /**
   * @param Google_Service_Pubsub_DeadLetterPolicy
   */
  public function setDeadLetterPolicy(Google_Service_Pubsub_DeadLetterPolicy $deadLetterPolicy)
  {
    $this->deadLetterPolicy = $deadLetterPolicy;
  }
  /**
   * @return Google_Service_Pubsub_DeadLetterPolicy
   */
  public function getDeadLetterPolicy()
  {
    return $this->deadLetterPolicy;
  }
  /**
   * @param Google_Service_Pubsub_ExpirationPolicy
   */
  public function setExpirationPolicy(Google_Service_Pubsub_ExpirationPolicy $expirationPolicy)
  {
    $this->expirationPolicy = $expirationPolicy;
  }
  /**
   * @return Google_Service_Pubsub_ExpirationPolicy
   */
  public function getExpirationPolicy()
  {
    return $this->expirationPolicy;
  }
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  public function getFilter()
  {
    return $this->filter;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setMessageRetentionDuration($messageRetentionDuration)
  {
    $this->messageRetentionDuration = $messageRetentionDuration;
  }
  public function getMessageRetentionDuration()
  {
    return $this->messageRetentionDuration;
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
   * @param Google_Service_Pubsub_PushConfig
   */
  public function setPushConfig(Google_Service_Pubsub_PushConfig $pushConfig)
  {
    $this->pushConfig = $pushConfig;
  }
  /**
   * @return Google_Service_Pubsub_PushConfig
   */
  public function getPushConfig()
  {
    return $this->pushConfig;
  }
  public function setRetainAckedMessages($retainAckedMessages)
  {
    $this->retainAckedMessages = $retainAckedMessages;
  }
  public function getRetainAckedMessages()
  {
    return $this->retainAckedMessages;
  }
  public function setTopic($topic)
  {
    $this->topic = $topic;
  }
  public function getTopic()
  {
    return $this->topic;
  }
}
