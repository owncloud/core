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

class RepositoryWebrefExplainedRangeInfoExplainedRange extends \Google\Model
{
  protected $mentionType = RepositoryWebrefSegmentMention::class;
  protected $mentionDataType = '';

  /**
   * @param RepositoryWebrefSegmentMention
   */
  public function setMention(RepositoryWebrefSegmentMention $mention)
  {
    $this->mention = $mention;
  }
  /**
   * @return RepositoryWebrefSegmentMention
   */
  public function getMention()
  {
    return $this->mention;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefExplainedRangeInfoExplainedRange::class, 'Google_Service_Contentwarehouse_RepositoryWebrefExplainedRangeInfoExplainedRange');
