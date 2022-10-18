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

class KnowledgeAnswersSensitivityInstructionPreviousQuery extends \Google\Model
{
  protected $loggingType = KnowledgeAnswersSensitivityLoggingPolicy::class;
  protected $loggingDataType = '';
  protected $servingType = KnowledgeAnswersSensitivityServingPolicy::class;
  protected $servingDataType = '';
  protected $storageType = KnowledgeAnswersSensitivityStoragePolicy::class;
  protected $storageDataType = '';

  /**
   * @param KnowledgeAnswersSensitivityLoggingPolicy
   */
  public function setLogging(KnowledgeAnswersSensitivityLoggingPolicy $logging)
  {
    $this->logging = $logging;
  }
  /**
   * @return KnowledgeAnswersSensitivityLoggingPolicy
   */
  public function getLogging()
  {
    return $this->logging;
  }
  /**
   * @param KnowledgeAnswersSensitivityServingPolicy
   */
  public function setServing(KnowledgeAnswersSensitivityServingPolicy $serving)
  {
    $this->serving = $serving;
  }
  /**
   * @return KnowledgeAnswersSensitivityServingPolicy
   */
  public function getServing()
  {
    return $this->serving;
  }
  /**
   * @param KnowledgeAnswersSensitivityStoragePolicy
   */
  public function setStorage(KnowledgeAnswersSensitivityStoragePolicy $storage)
  {
    $this->storage = $storage;
  }
  /**
   * @return KnowledgeAnswersSensitivityStoragePolicy
   */
  public function getStorage()
  {
    return $this->storage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersSensitivityInstructionPreviousQuery::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersSensitivityInstructionPreviousQuery');
