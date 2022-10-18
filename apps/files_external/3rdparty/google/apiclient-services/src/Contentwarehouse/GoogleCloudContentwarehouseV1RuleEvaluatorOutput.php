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

class GoogleCloudContentwarehouseV1RuleEvaluatorOutput extends \Google\Collection
{
  protected $collection_key = 'triggeredRules';
  protected $invalidRulesType = GoogleCloudContentwarehouseV1InvalidRule::class;
  protected $invalidRulesDataType = 'array';
  protected $matchedRulesType = GoogleCloudContentwarehouseV1Rule::class;
  protected $matchedRulesDataType = 'array';
  protected $triggeredRulesType = GoogleCloudContentwarehouseV1Rule::class;
  protected $triggeredRulesDataType = 'array';

  /**
   * @param GoogleCloudContentwarehouseV1InvalidRule[]
   */
  public function setInvalidRules($invalidRules)
  {
    $this->invalidRules = $invalidRules;
  }
  /**
   * @return GoogleCloudContentwarehouseV1InvalidRule[]
   */
  public function getInvalidRules()
  {
    return $this->invalidRules;
  }
  /**
   * @param GoogleCloudContentwarehouseV1Rule[]
   */
  public function setMatchedRules($matchedRules)
  {
    $this->matchedRules = $matchedRules;
  }
  /**
   * @return GoogleCloudContentwarehouseV1Rule[]
   */
  public function getMatchedRules()
  {
    return $this->matchedRules;
  }
  /**
   * @param GoogleCloudContentwarehouseV1Rule[]
   */
  public function setTriggeredRules($triggeredRules)
  {
    $this->triggeredRules = $triggeredRules;
  }
  /**
   * @return GoogleCloudContentwarehouseV1Rule[]
   */
  public function getTriggeredRules()
  {
    return $this->triggeredRules;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1RuleEvaluatorOutput::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1RuleEvaluatorOutput');
