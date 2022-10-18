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

class GoogleCloudRetailV2RuleDoNotAssociateAction extends \Google\Collection
{
  protected $collection_key = 'terms';
  /**
   * @var string[]
   */
  public $doNotAssociateTerms;
  /**
   * @var string[]
   */
  public $queryTerms;
  /**
   * @var string[]
   */
  public $terms;

  /**
   * @param string[]
   */
  public function setDoNotAssociateTerms($doNotAssociateTerms)
  {
    $this->doNotAssociateTerms = $doNotAssociateTerms;
  }
  /**
   * @return string[]
   */
  public function getDoNotAssociateTerms()
  {
    return $this->doNotAssociateTerms;
  }
  /**
   * @param string[]
   */
  public function setQueryTerms($queryTerms)
  {
    $this->queryTerms = $queryTerms;
  }
  /**
   * @return string[]
   */
  public function getQueryTerms()
  {
    return $this->queryTerms;
  }
  /**
   * @param string[]
   */
  public function setTerms($terms)
  {
    $this->terms = $terms;
  }
  /**
   * @return string[]
   */
  public function getTerms()
  {
    return $this->terms;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2RuleDoNotAssociateAction::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2RuleDoNotAssociateAction');
