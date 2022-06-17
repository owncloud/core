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

namespace Google\Service\CloudTalentSolution;

class NamespacedDebugInput extends \Google\Collection
{
  protected $collection_key = 'disableExps';
  /**
   * @var string[]
   */
  public $absolutelyForcedExpNames;
  /**
   * @var string[]
   */
  public $absolutelyForcedExpTags;
  /**
   * @var int[]
   */
  public $absolutelyForcedExps;
  /**
   * @var string[]
   */
  public $conditionallyForcedExpNames;
  /**
   * @var string[]
   */
  public $conditionallyForcedExpTags;
  /**
   * @var int[]
   */
  public $conditionallyForcedExps;
  /**
   * @var bool
   */
  public $disableAutomaticEnrollmentSelection;
  /**
   * @var string[]
   */
  public $disableExpNames;
  /**
   * @var string[]
   */
  public $disableExpTags;
  /**
   * @var int[]
   */
  public $disableExps;
  /**
   * @var bool
   */
  public $disableManualEnrollmentSelection;
  /**
   * @var bool
   */
  public $disableOrganicSelection;
  /**
   * @var string[]
   */
  public $forcedFlags;
  /**
   * @var bool[]
   */
  public $forcedRollouts;
  /**
   * @var string
   */
  public $testingMode;

  /**
   * @param string[]
   */
  public function setAbsolutelyForcedExpNames($absolutelyForcedExpNames)
  {
    $this->absolutelyForcedExpNames = $absolutelyForcedExpNames;
  }
  /**
   * @return string[]
   */
  public function getAbsolutelyForcedExpNames()
  {
    return $this->absolutelyForcedExpNames;
  }
  /**
   * @param string[]
   */
  public function setAbsolutelyForcedExpTags($absolutelyForcedExpTags)
  {
    $this->absolutelyForcedExpTags = $absolutelyForcedExpTags;
  }
  /**
   * @return string[]
   */
  public function getAbsolutelyForcedExpTags()
  {
    return $this->absolutelyForcedExpTags;
  }
  /**
   * @param int[]
   */
  public function setAbsolutelyForcedExps($absolutelyForcedExps)
  {
    $this->absolutelyForcedExps = $absolutelyForcedExps;
  }
  /**
   * @return int[]
   */
  public function getAbsolutelyForcedExps()
  {
    return $this->absolutelyForcedExps;
  }
  /**
   * @param string[]
   */
  public function setConditionallyForcedExpNames($conditionallyForcedExpNames)
  {
    $this->conditionallyForcedExpNames = $conditionallyForcedExpNames;
  }
  /**
   * @return string[]
   */
  public function getConditionallyForcedExpNames()
  {
    return $this->conditionallyForcedExpNames;
  }
  /**
   * @param string[]
   */
  public function setConditionallyForcedExpTags($conditionallyForcedExpTags)
  {
    $this->conditionallyForcedExpTags = $conditionallyForcedExpTags;
  }
  /**
   * @return string[]
   */
  public function getConditionallyForcedExpTags()
  {
    return $this->conditionallyForcedExpTags;
  }
  /**
   * @param int[]
   */
  public function setConditionallyForcedExps($conditionallyForcedExps)
  {
    $this->conditionallyForcedExps = $conditionallyForcedExps;
  }
  /**
   * @return int[]
   */
  public function getConditionallyForcedExps()
  {
    return $this->conditionallyForcedExps;
  }
  /**
   * @param bool
   */
  public function setDisableAutomaticEnrollmentSelection($disableAutomaticEnrollmentSelection)
  {
    $this->disableAutomaticEnrollmentSelection = $disableAutomaticEnrollmentSelection;
  }
  /**
   * @return bool
   */
  public function getDisableAutomaticEnrollmentSelection()
  {
    return $this->disableAutomaticEnrollmentSelection;
  }
  /**
   * @param string[]
   */
  public function setDisableExpNames($disableExpNames)
  {
    $this->disableExpNames = $disableExpNames;
  }
  /**
   * @return string[]
   */
  public function getDisableExpNames()
  {
    return $this->disableExpNames;
  }
  /**
   * @param string[]
   */
  public function setDisableExpTags($disableExpTags)
  {
    $this->disableExpTags = $disableExpTags;
  }
  /**
   * @return string[]
   */
  public function getDisableExpTags()
  {
    return $this->disableExpTags;
  }
  /**
   * @param int[]
   */
  public function setDisableExps($disableExps)
  {
    $this->disableExps = $disableExps;
  }
  /**
   * @return int[]
   */
  public function getDisableExps()
  {
    return $this->disableExps;
  }
  /**
   * @param bool
   */
  public function setDisableManualEnrollmentSelection($disableManualEnrollmentSelection)
  {
    $this->disableManualEnrollmentSelection = $disableManualEnrollmentSelection;
  }
  /**
   * @return bool
   */
  public function getDisableManualEnrollmentSelection()
  {
    return $this->disableManualEnrollmentSelection;
  }
  /**
   * @param bool
   */
  public function setDisableOrganicSelection($disableOrganicSelection)
  {
    $this->disableOrganicSelection = $disableOrganicSelection;
  }
  /**
   * @return bool
   */
  public function getDisableOrganicSelection()
  {
    return $this->disableOrganicSelection;
  }
  /**
   * @param string[]
   */
  public function setForcedFlags($forcedFlags)
  {
    $this->forcedFlags = $forcedFlags;
  }
  /**
   * @return string[]
   */
  public function getForcedFlags()
  {
    return $this->forcedFlags;
  }
  /**
   * @param bool[]
   */
  public function setForcedRollouts($forcedRollouts)
  {
    $this->forcedRollouts = $forcedRollouts;
  }
  /**
   * @return bool[]
   */
  public function getForcedRollouts()
  {
    return $this->forcedRollouts;
  }
  /**
   * @param string
   */
  public function setTestingMode($testingMode)
  {
    $this->testingMode = $testingMode;
  }
  /**
   * @return string
   */
  public function getTestingMode()
  {
    return $this->testingMode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NamespacedDebugInput::class, 'Google_Service_CloudTalentSolution_NamespacedDebugInput');
