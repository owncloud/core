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

class RepositoryWebrefMentionCompoundMention extends \Google\Collection
{
  protected $collection_key = 'mrfIndex';
  protected $componentType = RepositoryWebrefMentionComponent::class;
  protected $componentDataType = 'array';
  /**
   * @var int[]
   */
  public $mrfIndex;

  /**
   * @param RepositoryWebrefMentionComponent[]
   */
  public function setComponent($component)
  {
    $this->component = $component;
  }
  /**
   * @return RepositoryWebrefMentionComponent[]
   */
  public function getComponent()
  {
    return $this->component;
  }
  /**
   * @param int[]
   */
  public function setMrfIndex($mrfIndex)
  {
    $this->mrfIndex = $mrfIndex;
  }
  /**
   * @return int[]
   */
  public function getMrfIndex()
  {
    return $this->mrfIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefMentionCompoundMention::class, 'Google_Service_Contentwarehouse_RepositoryWebrefMentionCompoundMention');
