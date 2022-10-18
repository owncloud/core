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

class RepositoryWebrefClusterProtoRelationRuleInstance extends \Google\Model
{
  /**
   * @var string
   */
  public $role;
  protected $ruleType = RepositoryWebrefClusterProtoRelationRule::class;
  protected $ruleDataType = '';
  protected $targetType = RepositoryWebrefWebrefEntityId::class;
  protected $targetDataType = '';

  /**
   * @param string
   */
  public function setRole($role)
  {
    $this->role = $role;
  }
  /**
   * @return string
   */
  public function getRole()
  {
    return $this->role;
  }
  /**
   * @param RepositoryWebrefClusterProtoRelationRule
   */
  public function setRule(RepositoryWebrefClusterProtoRelationRule $rule)
  {
    $this->rule = $rule;
  }
  /**
   * @return RepositoryWebrefClusterProtoRelationRule
   */
  public function getRule()
  {
    return $this->rule;
  }
  /**
   * @param RepositoryWebrefWebrefEntityId
   */
  public function setTarget(RepositoryWebrefWebrefEntityId $target)
  {
    $this->target = $target;
  }
  /**
   * @return RepositoryWebrefWebrefEntityId
   */
  public function getTarget()
  {
    return $this->target;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefClusterProtoRelationRuleInstance::class, 'Google_Service_Contentwarehouse_RepositoryWebrefClusterProtoRelationRuleInstance');
