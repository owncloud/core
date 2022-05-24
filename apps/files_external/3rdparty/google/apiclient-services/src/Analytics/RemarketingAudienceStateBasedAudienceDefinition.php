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

namespace Google\Service\Analytics;

class RemarketingAudienceStateBasedAudienceDefinition extends \Google\Model
{
  protected $excludeConditionsType = RemarketingAudienceStateBasedAudienceDefinitionExcludeConditions::class;
  protected $excludeConditionsDataType = '';
  protected $includeConditionsType = IncludeConditions::class;
  protected $includeConditionsDataType = '';

  /**
   * @param RemarketingAudienceStateBasedAudienceDefinitionExcludeConditions
   */
  public function setExcludeConditions(RemarketingAudienceStateBasedAudienceDefinitionExcludeConditions $excludeConditions)
  {
    $this->excludeConditions = $excludeConditions;
  }
  /**
   * @return RemarketingAudienceStateBasedAudienceDefinitionExcludeConditions
   */
  public function getExcludeConditions()
  {
    return $this->excludeConditions;
  }
  /**
   * @param IncludeConditions
   */
  public function setIncludeConditions(IncludeConditions $includeConditions)
  {
    $this->includeConditions = $includeConditions;
  }
  /**
   * @return IncludeConditions
   */
  public function getIncludeConditions()
  {
    return $this->includeConditions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RemarketingAudienceStateBasedAudienceDefinition::class, 'Google_Service_Analytics_RemarketingAudienceStateBasedAudienceDefinition');
