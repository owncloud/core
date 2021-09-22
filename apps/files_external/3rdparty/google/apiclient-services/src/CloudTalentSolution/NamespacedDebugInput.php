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
  public $absolutelyForcedExpNames;
  public $absolutelyForcedExpTags;
  public $absolutelyForcedExps;
  public $conditionallyForcedExpNames;
  public $conditionallyForcedExpTags;
  public $conditionallyForcedExps;
  public $disableAutomaticEnrollmentSelection;
  public $disableExpNames;
  public $disableExpTags;
  public $disableExps;
  public $disableManualEnrollmentSelection;
  public $disableOrganicSelection;
  public $forcedFlags;
  public $forcedRollouts;

  public function setAbsolutelyForcedExpNames($absolutelyForcedExpNames)
  {
    $this->absolutelyForcedExpNames = $absolutelyForcedExpNames;
  }
  public function getAbsolutelyForcedExpNames()
  {
    return $this->absolutelyForcedExpNames;
  }
  public function setAbsolutelyForcedExpTags($absolutelyForcedExpTags)
  {
    $this->absolutelyForcedExpTags = $absolutelyForcedExpTags;
  }
  public function getAbsolutelyForcedExpTags()
  {
    return $this->absolutelyForcedExpTags;
  }
  public function setAbsolutelyForcedExps($absolutelyForcedExps)
  {
    $this->absolutelyForcedExps = $absolutelyForcedExps;
  }
  public function getAbsolutelyForcedExps()
  {
    return $this->absolutelyForcedExps;
  }
  public function setConditionallyForcedExpNames($conditionallyForcedExpNames)
  {
    $this->conditionallyForcedExpNames = $conditionallyForcedExpNames;
  }
  public function getConditionallyForcedExpNames()
  {
    return $this->conditionallyForcedExpNames;
  }
  public function setConditionallyForcedExpTags($conditionallyForcedExpTags)
  {
    $this->conditionallyForcedExpTags = $conditionallyForcedExpTags;
  }
  public function getConditionallyForcedExpTags()
  {
    return $this->conditionallyForcedExpTags;
  }
  public function setConditionallyForcedExps($conditionallyForcedExps)
  {
    $this->conditionallyForcedExps = $conditionallyForcedExps;
  }
  public function getConditionallyForcedExps()
  {
    return $this->conditionallyForcedExps;
  }
  public function setDisableAutomaticEnrollmentSelection($disableAutomaticEnrollmentSelection)
  {
    $this->disableAutomaticEnrollmentSelection = $disableAutomaticEnrollmentSelection;
  }
  public function getDisableAutomaticEnrollmentSelection()
  {
    return $this->disableAutomaticEnrollmentSelection;
  }
  public function setDisableExpNames($disableExpNames)
  {
    $this->disableExpNames = $disableExpNames;
  }
  public function getDisableExpNames()
  {
    return $this->disableExpNames;
  }
  public function setDisableExpTags($disableExpTags)
  {
    $this->disableExpTags = $disableExpTags;
  }
  public function getDisableExpTags()
  {
    return $this->disableExpTags;
  }
  public function setDisableExps($disableExps)
  {
    $this->disableExps = $disableExps;
  }
  public function getDisableExps()
  {
    return $this->disableExps;
  }
  public function setDisableManualEnrollmentSelection($disableManualEnrollmentSelection)
  {
    $this->disableManualEnrollmentSelection = $disableManualEnrollmentSelection;
  }
  public function getDisableManualEnrollmentSelection()
  {
    return $this->disableManualEnrollmentSelection;
  }
  public function setDisableOrganicSelection($disableOrganicSelection)
  {
    $this->disableOrganicSelection = $disableOrganicSelection;
  }
  public function getDisableOrganicSelection()
  {
    return $this->disableOrganicSelection;
  }
  public function setForcedFlags($forcedFlags)
  {
    $this->forcedFlags = $forcedFlags;
  }
  public function getForcedFlags()
  {
    return $this->forcedFlags;
  }
  public function setForcedRollouts($forcedRollouts)
  {
    $this->forcedRollouts = $forcedRollouts;
  }
  public function getForcedRollouts()
  {
    return $this->forcedRollouts;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NamespacedDebugInput::class, 'Google_Service_CloudTalentSolution_NamespacedDebugInput');
