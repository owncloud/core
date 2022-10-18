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

class KnowledgeAnswersIntentQueryGroundingSignals extends \Google\Model
{
  /**
   * @var bool
   */
  public $addedByGrounding;
  public $groundabilityScore;
  public $numConstraints;
  public $numConstraintsSatisfied;
  public $numGroundableArgs;
  public $numGroundedArgs;
  public $numVariables;
  public $numVariablesGrounded;
  /**
   * @var string
   */
  public $pgrpOutputFormat;
  /**
   * @var bool
   */
  public $usesGroundingBox;

  /**
   * @param bool
   */
  public function setAddedByGrounding($addedByGrounding)
  {
    $this->addedByGrounding = $addedByGrounding;
  }
  /**
   * @return bool
   */
  public function getAddedByGrounding()
  {
    return $this->addedByGrounding;
  }
  public function setGroundabilityScore($groundabilityScore)
  {
    $this->groundabilityScore = $groundabilityScore;
  }
  public function getGroundabilityScore()
  {
    return $this->groundabilityScore;
  }
  public function setNumConstraints($numConstraints)
  {
    $this->numConstraints = $numConstraints;
  }
  public function getNumConstraints()
  {
    return $this->numConstraints;
  }
  public function setNumConstraintsSatisfied($numConstraintsSatisfied)
  {
    $this->numConstraintsSatisfied = $numConstraintsSatisfied;
  }
  public function getNumConstraintsSatisfied()
  {
    return $this->numConstraintsSatisfied;
  }
  public function setNumGroundableArgs($numGroundableArgs)
  {
    $this->numGroundableArgs = $numGroundableArgs;
  }
  public function getNumGroundableArgs()
  {
    return $this->numGroundableArgs;
  }
  public function setNumGroundedArgs($numGroundedArgs)
  {
    $this->numGroundedArgs = $numGroundedArgs;
  }
  public function getNumGroundedArgs()
  {
    return $this->numGroundedArgs;
  }
  public function setNumVariables($numVariables)
  {
    $this->numVariables = $numVariables;
  }
  public function getNumVariables()
  {
    return $this->numVariables;
  }
  public function setNumVariablesGrounded($numVariablesGrounded)
  {
    $this->numVariablesGrounded = $numVariablesGrounded;
  }
  public function getNumVariablesGrounded()
  {
    return $this->numVariablesGrounded;
  }
  /**
   * @param string
   */
  public function setPgrpOutputFormat($pgrpOutputFormat)
  {
    $this->pgrpOutputFormat = $pgrpOutputFormat;
  }
  /**
   * @return string
   */
  public function getPgrpOutputFormat()
  {
    return $this->pgrpOutputFormat;
  }
  /**
   * @param bool
   */
  public function setUsesGroundingBox($usesGroundingBox)
  {
    $this->usesGroundingBox = $usesGroundingBox;
  }
  /**
   * @return bool
   */
  public function getUsesGroundingBox()
  {
    return $this->usesGroundingBox;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryGroundingSignals::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryGroundingSignals');
