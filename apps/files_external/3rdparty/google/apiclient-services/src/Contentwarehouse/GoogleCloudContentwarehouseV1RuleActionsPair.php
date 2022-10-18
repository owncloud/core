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

class GoogleCloudContentwarehouseV1RuleActionsPair extends \Google\Collection
{
  protected $collection_key = 'actionOutputs';
  protected $actionOutputsType = GoogleCloudContentwarehouseV1ActionOutput::class;
  protected $actionOutputsDataType = 'array';
  protected $ruleType = GoogleCloudContentwarehouseV1Rule::class;
  protected $ruleDataType = '';

  /**
   * @param GoogleCloudContentwarehouseV1ActionOutput[]
   */
  public function setActionOutputs($actionOutputs)
  {
    $this->actionOutputs = $actionOutputs;
  }
  /**
   * @return GoogleCloudContentwarehouseV1ActionOutput[]
   */
  public function getActionOutputs()
  {
    return $this->actionOutputs;
  }
  /**
   * @param GoogleCloudContentwarehouseV1Rule
   */
  public function setRule(GoogleCloudContentwarehouseV1Rule $rule)
  {
    $this->rule = $rule;
  }
  /**
   * @return GoogleCloudContentwarehouseV1Rule
   */
  public function getRule()
  {
    return $this->rule;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1RuleActionsPair::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1RuleActionsPair');
