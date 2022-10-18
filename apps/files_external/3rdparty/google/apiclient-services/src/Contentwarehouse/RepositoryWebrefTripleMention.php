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

class RepositoryWebrefTripleMention extends \Google\Model
{
  protected $predMentionType = RepositoryWebrefSegmentMention::class;
  protected $predMentionDataType = '';
  /**
   * @var int
   */
  public $scopeBegin;
  /**
   * @var int
   */
  public $scopeEnd;
  /**
   * @var string
   */
  public $scopeFprint;
  protected $stuffType = Proto2BridgeMessageSet::class;
  protected $stuffDataType = '';
  protected $subMentionType = RepositoryWebrefSegmentMention::class;
  protected $subMentionDataType = '';
  protected $valueMentionType = RepositoryWebrefSegmentMention::class;
  protected $valueMentionDataType = '';

  /**
   * @param RepositoryWebrefSegmentMention
   */
  public function setPredMention(RepositoryWebrefSegmentMention $predMention)
  {
    $this->predMention = $predMention;
  }
  /**
   * @return RepositoryWebrefSegmentMention
   */
  public function getPredMention()
  {
    return $this->predMention;
  }
  /**
   * @param int
   */
  public function setScopeBegin($scopeBegin)
  {
    $this->scopeBegin = $scopeBegin;
  }
  /**
   * @return int
   */
  public function getScopeBegin()
  {
    return $this->scopeBegin;
  }
  /**
   * @param int
   */
  public function setScopeEnd($scopeEnd)
  {
    $this->scopeEnd = $scopeEnd;
  }
  /**
   * @return int
   */
  public function getScopeEnd()
  {
    return $this->scopeEnd;
  }
  /**
   * @param string
   */
  public function setScopeFprint($scopeFprint)
  {
    $this->scopeFprint = $scopeFprint;
  }
  /**
   * @return string
   */
  public function getScopeFprint()
  {
    return $this->scopeFprint;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setStuff(Proto2BridgeMessageSet $stuff)
  {
    $this->stuff = $stuff;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getStuff()
  {
    return $this->stuff;
  }
  /**
   * @param RepositoryWebrefSegmentMention
   */
  public function setSubMention(RepositoryWebrefSegmentMention $subMention)
  {
    $this->subMention = $subMention;
  }
  /**
   * @return RepositoryWebrefSegmentMention
   */
  public function getSubMention()
  {
    return $this->subMention;
  }
  /**
   * @param RepositoryWebrefSegmentMention
   */
  public function setValueMention(RepositoryWebrefSegmentMention $valueMention)
  {
    $this->valueMention = $valueMention;
  }
  /**
   * @return RepositoryWebrefSegmentMention
   */
  public function getValueMention()
  {
    return $this->valueMention;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefTripleMention::class, 'Google_Service_Contentwarehouse_RepositoryWebrefTripleMention');
