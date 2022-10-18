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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2Rule extends \Google\Model
{
  protected $boostActionType = GoogleCloudRetailV2RuleBoostAction::class;
  protected $boostActionDataType = '';
  protected $conditionType = GoogleCloudRetailV2Condition::class;
  protected $conditionDataType = '';
  protected $doNotAssociateActionType = GoogleCloudRetailV2RuleDoNotAssociateAction::class;
  protected $doNotAssociateActionDataType = '';
  protected $filterActionType = GoogleCloudRetailV2RuleFilterAction::class;
  protected $filterActionDataType = '';
  protected $ignoreActionType = GoogleCloudRetailV2RuleIgnoreAction::class;
  protected $ignoreActionDataType = '';
  protected $onewaySynonymsActionType = GoogleCloudRetailV2RuleOnewaySynonymsAction::class;
  protected $onewaySynonymsActionDataType = '';
  protected $redirectActionType = GoogleCloudRetailV2RuleRedirectAction::class;
  protected $redirectActionDataType = '';
  protected $replacementActionType = GoogleCloudRetailV2RuleReplacementAction::class;
  protected $replacementActionDataType = '';
  protected $twowaySynonymsActionType = GoogleCloudRetailV2RuleTwowaySynonymsAction::class;
  protected $twowaySynonymsActionDataType = '';

  /**
   * @param GoogleCloudRetailV2RuleBoostAction
   */
  public function setBoostAction(GoogleCloudRetailV2RuleBoostAction $boostAction)
  {
    $this->boostAction = $boostAction;
  }
  /**
   * @return GoogleCloudRetailV2RuleBoostAction
   */
  public function getBoostAction()
  {
    return $this->boostAction;
  }
  /**
   * @param GoogleCloudRetailV2Condition
   */
  public function setCondition(GoogleCloudRetailV2Condition $condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return GoogleCloudRetailV2Condition
   */
  public function getCondition()
  {
    return $this->condition;
  }
  /**
   * @param GoogleCloudRetailV2RuleDoNotAssociateAction
   */
  public function setDoNotAssociateAction(GoogleCloudRetailV2RuleDoNotAssociateAction $doNotAssociateAction)
  {
    $this->doNotAssociateAction = $doNotAssociateAction;
  }
  /**
   * @return GoogleCloudRetailV2RuleDoNotAssociateAction
   */
  public function getDoNotAssociateAction()
  {
    return $this->doNotAssociateAction;
  }
  /**
   * @param GoogleCloudRetailV2RuleFilterAction
   */
  public function setFilterAction(GoogleCloudRetailV2RuleFilterAction $filterAction)
  {
    $this->filterAction = $filterAction;
  }
  /**
   * @return GoogleCloudRetailV2RuleFilterAction
   */
  public function getFilterAction()
  {
    return $this->filterAction;
  }
  /**
   * @param GoogleCloudRetailV2RuleIgnoreAction
   */
  public function setIgnoreAction(GoogleCloudRetailV2RuleIgnoreAction $ignoreAction)
  {
    $this->ignoreAction = $ignoreAction;
  }
  /**
   * @return GoogleCloudRetailV2RuleIgnoreAction
   */
  public function getIgnoreAction()
  {
    return $this->ignoreAction;
  }
  /**
   * @param GoogleCloudRetailV2RuleOnewaySynonymsAction
   */
  public function setOnewaySynonymsAction(GoogleCloudRetailV2RuleOnewaySynonymsAction $onewaySynonymsAction)
  {
    $this->onewaySynonymsAction = $onewaySynonymsAction;
  }
  /**
   * @return GoogleCloudRetailV2RuleOnewaySynonymsAction
   */
  public function getOnewaySynonymsAction()
  {
    return $this->onewaySynonymsAction;
  }
  /**
   * @param GoogleCloudRetailV2RuleRedirectAction
   */
  public function setRedirectAction(GoogleCloudRetailV2RuleRedirectAction $redirectAction)
  {
    $this->redirectAction = $redirectAction;
  }
  /**
   * @return GoogleCloudRetailV2RuleRedirectAction
   */
  public function getRedirectAction()
  {
    return $this->redirectAction;
  }
  /**
   * @param GoogleCloudRetailV2RuleReplacementAction
   */
  public function setReplacementAction(GoogleCloudRetailV2RuleReplacementAction $replacementAction)
  {
    $this->replacementAction = $replacementAction;
  }
  /**
   * @return GoogleCloudRetailV2RuleReplacementAction
   */
  public function getReplacementAction()
  {
    return $this->replacementAction;
  }
  /**
   * @param GoogleCloudRetailV2RuleTwowaySynonymsAction
   */
  public function setTwowaySynonymsAction(GoogleCloudRetailV2RuleTwowaySynonymsAction $twowaySynonymsAction)
  {
    $this->twowaySynonymsAction = $twowaySynonymsAction;
  }
  /**
   * @return GoogleCloudRetailV2RuleTwowaySynonymsAction
   */
  public function getTwowaySynonymsAction()
  {
    return $this->twowaySynonymsAction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2Rule::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2Rule');
