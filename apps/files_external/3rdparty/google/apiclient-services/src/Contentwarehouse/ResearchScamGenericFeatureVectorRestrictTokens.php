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

class ResearchScamGenericFeatureVectorRestrictTokens extends \Google\Collection
{
  protected $collection_key = 'whitelistToken';
  /**
   * @var string[]
   */
  public $blacklistToken;
  protected $definitionType = ResearchScamCoscamRestrictDefinition::class;
  protected $definitionDataType = '';
  protected $easyDefinitionType = ResearchScamCoscamEasyRestrictDefinition::class;
  protected $easyDefinitionDataType = '';
  /**
   * @var string[]
   */
  public $tokenMembership;
  protected $tokensType = ResearchScamCoscamRestrictTokensV2::class;
  protected $tokensDataType = '';
  protected $v3Type = ResearchScamV3Restrict::class;
  protected $v3DataType = '';
  /**
   * @var string
   */
  public $v3CompatibleNamespace;
  /**
   * @var string[]
   */
  public $whitelistToken;

  /**
   * @param string[]
   */
  public function setBlacklistToken($blacklistToken)
  {
    $this->blacklistToken = $blacklistToken;
  }
  /**
   * @return string[]
   */
  public function getBlacklistToken()
  {
    return $this->blacklistToken;
  }
  /**
   * @param ResearchScamCoscamRestrictDefinition
   */
  public function setDefinition(ResearchScamCoscamRestrictDefinition $definition)
  {
    $this->definition = $definition;
  }
  /**
   * @return ResearchScamCoscamRestrictDefinition
   */
  public function getDefinition()
  {
    return $this->definition;
  }
  /**
   * @param ResearchScamCoscamEasyRestrictDefinition
   */
  public function setEasyDefinition(ResearchScamCoscamEasyRestrictDefinition $easyDefinition)
  {
    $this->easyDefinition = $easyDefinition;
  }
  /**
   * @return ResearchScamCoscamEasyRestrictDefinition
   */
  public function getEasyDefinition()
  {
    return $this->easyDefinition;
  }
  /**
   * @param string[]
   */
  public function setTokenMembership($tokenMembership)
  {
    $this->tokenMembership = $tokenMembership;
  }
  /**
   * @return string[]
   */
  public function getTokenMembership()
  {
    return $this->tokenMembership;
  }
  /**
   * @param ResearchScamCoscamRestrictTokensV2
   */
  public function setTokens(ResearchScamCoscamRestrictTokensV2 $tokens)
  {
    $this->tokens = $tokens;
  }
  /**
   * @return ResearchScamCoscamRestrictTokensV2
   */
  public function getTokens()
  {
    return $this->tokens;
  }
  /**
   * @param ResearchScamV3Restrict
   */
  public function setV3(ResearchScamV3Restrict $v3)
  {
    $this->v3 = $v3;
  }
  /**
   * @return ResearchScamV3Restrict
   */
  public function getV3()
  {
    return $this->v3;
  }
  /**
   * @param string
   */
  public function setV3CompatibleNamespace($v3CompatibleNamespace)
  {
    $this->v3CompatibleNamespace = $v3CompatibleNamespace;
  }
  /**
   * @return string
   */
  public function getV3CompatibleNamespace()
  {
    return $this->v3CompatibleNamespace;
  }
  /**
   * @param string[]
   */
  public function setWhitelistToken($whitelistToken)
  {
    $this->whitelistToken = $whitelistToken;
  }
  /**
   * @return string[]
   */
  public function getWhitelistToken()
  {
    return $this->whitelistToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScamGenericFeatureVectorRestrictTokens::class, 'Google_Service_Contentwarehouse_ResearchScamGenericFeatureVectorRestrictTokens');
