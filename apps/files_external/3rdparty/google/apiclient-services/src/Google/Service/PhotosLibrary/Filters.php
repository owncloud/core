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

class Google_Service_PhotosLibrary_Filters extends Google_Model
{
  protected $contentFilterType = 'Google_Service_PhotosLibrary_ContentFilter';
  protected $contentFilterDataType = '';
  protected $dateFilterType = 'Google_Service_PhotosLibrary_DateFilter';
  protected $dateFilterDataType = '';
  public $includeArchivedMedia;
  protected $mediaTypeFilterType = 'Google_Service_PhotosLibrary_MediaTypeFilter';
  protected $mediaTypeFilterDataType = '';

  /**
   * @param Google_Service_PhotosLibrary_ContentFilter
   */
  public function setContentFilter(Google_Service_PhotosLibrary_ContentFilter $contentFilter)
  {
    $this->contentFilter = $contentFilter;
  }
  /**
   * @return Google_Service_PhotosLibrary_ContentFilter
   */
  public function getContentFilter()
  {
    return $this->contentFilter;
  }
  /**
   * @param Google_Service_PhotosLibrary_DateFilter
   */
  public function setDateFilter(Google_Service_PhotosLibrary_DateFilter $dateFilter)
  {
    $this->dateFilter = $dateFilter;
  }
  /**
   * @return Google_Service_PhotosLibrary_DateFilter
   */
  public function getDateFilter()
  {
    return $this->dateFilter;
  }
  public function setIncludeArchivedMedia($includeArchivedMedia)
  {
    $this->includeArchivedMedia = $includeArchivedMedia;
  }
  public function getIncludeArchivedMedia()
  {
    return $this->includeArchivedMedia;
  }
  /**
   * @param Google_Service_PhotosLibrary_MediaTypeFilter
   */
  public function setMediaTypeFilter(Google_Service_PhotosLibrary_MediaTypeFilter $mediaTypeFilter)
  {
    $this->mediaTypeFilter = $mediaTypeFilter;
  }
  /**
   * @return Google_Service_PhotosLibrary_MediaTypeFilter
   */
  public function getMediaTypeFilter()
  {
    return $this->mediaTypeFilter;
  }
}
