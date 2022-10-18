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

class SearchPolicyRankableSensitivityQueryUnderstanding extends \Google\Model
{
  /**
   * @var bool
   */
  public $intentOnlyNoPii;
  /**
   * @var string
   */
  public $rewrittenQuery;

  /**
   * @param bool
   */
  public function setIntentOnlyNoPii($intentOnlyNoPii)
  {
    $this->intentOnlyNoPii = $intentOnlyNoPii;
  }
  /**
   * @return bool
   */
  public function getIntentOnlyNoPii()
  {
    return $this->intentOnlyNoPii;
  }
  /**
   * @param string
   */
  public function setRewrittenQuery($rewrittenQuery)
  {
    $this->rewrittenQuery = $rewrittenQuery;
  }
  /**
   * @return string
   */
  public function getRewrittenQuery()
  {
    return $this->rewrittenQuery;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchPolicyRankableSensitivityQueryUnderstanding::class, 'Google_Service_Contentwarehouse_SearchPolicyRankableSensitivityQueryUnderstanding');
