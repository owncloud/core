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

class KnowledgeAnswersSensitivityStoragePolicy extends \Google\Model
{
  /**
   * @var bool
   */
  public $encryptArgumentValue;
  /**
   * @var bool
   */
  public $encryptQueryAnnotationData;
  /**
   * @var bool
   */
  public $scrubAuxiliaryFieldsInConversationSnapshot;

  /**
   * @param bool
   */
  public function setEncryptArgumentValue($encryptArgumentValue)
  {
    $this->encryptArgumentValue = $encryptArgumentValue;
  }
  /**
   * @return bool
   */
  public function getEncryptArgumentValue()
  {
    return $this->encryptArgumentValue;
  }
  /**
   * @param bool
   */
  public function setEncryptQueryAnnotationData($encryptQueryAnnotationData)
  {
    $this->encryptQueryAnnotationData = $encryptQueryAnnotationData;
  }
  /**
   * @return bool
   */
  public function getEncryptQueryAnnotationData()
  {
    return $this->encryptQueryAnnotationData;
  }
  /**
   * @param bool
   */
  public function setScrubAuxiliaryFieldsInConversationSnapshot($scrubAuxiliaryFieldsInConversationSnapshot)
  {
    $this->scrubAuxiliaryFieldsInConversationSnapshot = $scrubAuxiliaryFieldsInConversationSnapshot;
  }
  /**
   * @return bool
   */
  public function getScrubAuxiliaryFieldsInConversationSnapshot()
  {
    return $this->scrubAuxiliaryFieldsInConversationSnapshot;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersSensitivityStoragePolicy::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersSensitivityStoragePolicy');
