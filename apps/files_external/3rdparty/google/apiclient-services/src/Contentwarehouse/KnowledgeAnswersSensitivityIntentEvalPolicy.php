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

class KnowledgeAnswersSensitivityIntentEvalPolicy extends \Google\Model
{
  protected $allArgumentsType = KnowledgeAnswersSensitivityArgumentEvalPolicy::class;
  protected $allArgumentsDataType = '';
  /**
   * @var bool
   */
  public $enabled;
  /**
   * @var bool
   */
  public $nestedIntentOnly;
  /**
   * @var bool
   */
  public $scrubEntireIntent;

  /**
   * @param KnowledgeAnswersSensitivityArgumentEvalPolicy
   */
  public function setAllArguments(KnowledgeAnswersSensitivityArgumentEvalPolicy $allArguments)
  {
    $this->allArguments = $allArguments;
  }
  /**
   * @return KnowledgeAnswersSensitivityArgumentEvalPolicy
   */
  public function getAllArguments()
  {
    return $this->allArguments;
  }
  /**
   * @param bool
   */
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  /**
   * @return bool
   */
  public function getEnabled()
  {
    return $this->enabled;
  }
  /**
   * @param bool
   */
  public function setNestedIntentOnly($nestedIntentOnly)
  {
    $this->nestedIntentOnly = $nestedIntentOnly;
  }
  /**
   * @return bool
   */
  public function getNestedIntentOnly()
  {
    return $this->nestedIntentOnly;
  }
  /**
   * @param bool
   */
  public function setScrubEntireIntent($scrubEntireIntent)
  {
    $this->scrubEntireIntent = $scrubEntireIntent;
  }
  /**
   * @return bool
   */
  public function getScrubEntireIntent()
  {
    return $this->scrubEntireIntent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersSensitivityIntentEvalPolicy::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersSensitivityIntentEvalPolicy');
