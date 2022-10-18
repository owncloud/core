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

class NlpSaftRelationMention extends \Google\Collection
{
  protected $collection_key = 'sourceInfo';
  protected $infoType = Proto2BridgeMessageSet::class;
  protected $infoDataType = '';
  protected $phraseType = NlpSaftPhrase::class;
  protected $phraseDataType = '';
  /**
   * @var int
   */
  public $source;
  /**
   * @var string[]
   */
  public $sourceInfo;
  /**
   * @var int
   */
  public $target;

  /**
   * @param Proto2BridgeMessageSet
   */
  public function setInfo(Proto2BridgeMessageSet $info)
  {
    $this->info = $info;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param NlpSaftPhrase
   */
  public function setPhrase(NlpSaftPhrase $phrase)
  {
    $this->phrase = $phrase;
  }
  /**
   * @return NlpSaftPhrase
   */
  public function getPhrase()
  {
    return $this->phrase;
  }
  /**
   * @param int
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return int
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param string[]
   */
  public function setSourceInfo($sourceInfo)
  {
    $this->sourceInfo = $sourceInfo;
  }
  /**
   * @return string[]
   */
  public function getSourceInfo()
  {
    return $this->sourceInfo;
  }
  /**
   * @param int
   */
  public function setTarget($target)
  {
    $this->target = $target;
  }
  /**
   * @return int
   */
  public function getTarget()
  {
    return $this->target;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSaftRelationMention::class, 'Google_Service_Contentwarehouse_NlpSaftRelationMention');
