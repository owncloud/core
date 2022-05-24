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

namespace Google\Service\DoubleClickBidManager;

class PathQueryOptions extends \Google\Collection
{
  protected $collection_key = 'pathFilters';
  protected $channelGroupingType = ChannelGrouping::class;
  protected $channelGroupingDataType = '';
  protected $pathFiltersType = PathFilter::class;
  protected $pathFiltersDataType = 'array';

  /**
   * @param ChannelGrouping
   */
  public function setChannelGrouping(ChannelGrouping $channelGrouping)
  {
    $this->channelGrouping = $channelGrouping;
  }
  /**
   * @return ChannelGrouping
   */
  public function getChannelGrouping()
  {
    return $this->channelGrouping;
  }
  /**
   * @param PathFilter[]
   */
  public function setPathFilters($pathFilters)
  {
    $this->pathFilters = $pathFilters;
  }
  /**
   * @return PathFilter[]
   */
  public function getPathFilters()
  {
    return $this->pathFilters;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PathQueryOptions::class, 'Google_Service_DoubleClickBidManager_PathQueryOptions');
