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

namespace Google\Service\Pubsub;

class Subscription extends \Google\Model
{
  public $ackDeadlineSeconds;
  protected $deadLetterPolicyType = DeadLetterPolicy::class;
  protected $deadLetterPolicyDataType = '';
  public $detached;
  public $enableMessageOrdering;
  protected $expirationPolicyType = ExpirationPolicy::class;
  protected $expirationPolicyDataType = '';
  public $filter;
  public $labels;
  public $messageRetentionDuration;
  public $name;
  protected $pushConfigType = PushConfig::class;
  protected $pushConfigDataType = '';
  public $retainAckedMessages;
  protected $retryPolicyType = RetryPolicy::class;
  protected $retryPolicyDataType = '';
  public $topic;
  public $topicMessageRetentionDuration;

  public function setAckDeadlineSeconds($ackDeadlineSeconds)
  {
    $this->ackDeadlineSeconds = $ackDeadlineSeconds;
  }
  public function getAckDeadlineSeconds()
  {
    return $this->ackDeadlineSeconds;
  }
  /**
   * @param DeadLetterPolicy
   */
  public function setDeadLetterPolicy(DeadLetterPolicy $deadLetterPolicy)
  {
    $this->deadLetterPolicy = $deadLetterPolicy;
  }
  /**
   * @return DeadLetterPolicy
   */
  public function getDeadLetterPolicy()
  {
    return $this->deadLetterPolicy;
  }
  public function setDetached($detached)
  {
    $this->detached = $detached;
  }
  public function getDetached()
  {
    return $this->detached;
  }
  public function setEnableMessageOrdering($enableMessageOrdering)
  {
    $this->enableMessageOrdering = $enableMessageOrdering;
  }
  public function getEnableMessageOrdering()
  {
    return $this->enableMessageOrdering;
  }
  /**
   * @param ExpirationPolicy
   */
  public function setExpirationPolicy(ExpirationPolicy $expirationPolicy)
  {
    $this->expirationPolicy = $expirationPolicy;
  }
  /**
   * @return ExpirationPolicy
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
   * @param PushConfig
   */
  public function setPushConfig(PushConfig $pushConfig)
  {
    $this->pushConfig = $pushConfig;
  }
  /**
   * @return PushConfig
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
  /**
   * @param RetryPolicy
   */
  public function setRetryPolicy(RetryPolicy $retryPolicy)
  {
    $this->retryPolicy = $retryPolicy;
  }
  /**
   * @return RetryPolicy
   */
  public function getRetryPolicy()
  {
    return $this->retryPolicy;
  }
  public function setTopic($topic)
  {
    $this->topic = $topic;
  }
  public function getTopic()
  {
    return $this->topic;
  }
  public function setTopicMessageRetentionDuration($topicMessageRetentionDuration)
  {
    $this->topicMessageRetentionDuration = $topicMessageRetentionDuration;
  }
  public function getTopicMessageRetentionDuration()
  {
    return $this->topicMessageRetentionDuration;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Subscription::class, 'Google_Service_Pubsub_Subscription');
