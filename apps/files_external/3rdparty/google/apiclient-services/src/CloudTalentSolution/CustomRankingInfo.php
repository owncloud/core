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

class CustomRankingInfo extends \Google\Model
{
  public $importanceLevel;
  public $rankingExpression;

  public function setImportanceLevel($importanceLevel)
  {
    $this->importanceLevel = $importanceLevel;
  }
  public function getImportanceLevel()
  {
    return $this->importanceLevel;
  }
  public function setRankingExpression($rankingExpression)
  {
    $this->rankingExpression = $rankingExpression;
  }
  public function getRankingExpression()
  {
    return $this->rankingExpression;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomRankingInfo::class, 'Google_Service_CloudTalentSolution_CustomRankingInfo');
