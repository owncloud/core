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

class ResearchScamTokenNamespace extends \Google\Collection
{
  protected $collection_key = 'uint64Tokens';
  /**
   * @var string
   */
  public $namespace;
  /**
   * @var string[]
   */
  public $stringBlacklistTokens;
  /**
   * @var string[]
   */
  public $stringTokens;
  /**
   * @var string[]
   */
  public $uint64BlacklistTokens;
  /**
   * @var string[]
   */
  public $uint64Tokens;

  /**
   * @param string
   */
  public function setNamespace($namespace)
  {
    $this->namespace = $namespace;
  }
  /**
   * @return string
   */
  public function getNamespace()
  {
    return $this->namespace;
  }
  /**
   * @param string[]
   */
  public function setStringBlacklistTokens($stringBlacklistTokens)
  {
    $this->stringBlacklistTokens = $stringBlacklistTokens;
  }
  /**
   * @return string[]
   */
  public function getStringBlacklistTokens()
  {
    return $this->stringBlacklistTokens;
  }
  /**
   * @param string[]
   */
  public function setStringTokens($stringTokens)
  {
    $this->stringTokens = $stringTokens;
  }
  /**
   * @return string[]
   */
  public function getStringTokens()
  {
    return $this->stringTokens;
  }
  /**
   * @param string[]
   */
  public function setUint64BlacklistTokens($uint64BlacklistTokens)
  {
    $this->uint64BlacklistTokens = $uint64BlacklistTokens;
  }
  /**
   * @return string[]
   */
  public function getUint64BlacklistTokens()
  {
    return $this->uint64BlacklistTokens;
  }
  /**
   * @param string[]
   */
  public function setUint64Tokens($uint64Tokens)
  {
    $this->uint64Tokens = $uint64Tokens;
  }
  /**
   * @return string[]
   */
  public function getUint64Tokens()
  {
    return $this->uint64Tokens;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScamTokenNamespace::class, 'Google_Service_Contentwarehouse_ResearchScamTokenNamespace');
