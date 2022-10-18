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

class ResearchScienceSearchDataDownload extends \Google\Model
{
  /**
   * @var string
   */
  public $contentSize;
  /**
   * @var string
   */
  public $downloadUrl;
  /**
   * @var string
   */
  public $fileFormat;
  /**
   * @var string
   */
  public $fileFormatClass;
  protected $parsedContentSizeType = ResearchScienceSearchDataSize::class;
  protected $parsedContentSizeDataType = '';

  /**
   * @param string
   */
  public function setContentSize($contentSize)
  {
    $this->contentSize = $contentSize;
  }
  /**
   * @return string
   */
  public function getContentSize()
  {
    return $this->contentSize;
  }
  /**
   * @param string
   */
  public function setDownloadUrl($downloadUrl)
  {
    $this->downloadUrl = $downloadUrl;
  }
  /**
   * @return string
   */
  public function getDownloadUrl()
  {
    return $this->downloadUrl;
  }
  /**
   * @param string
   */
  public function setFileFormat($fileFormat)
  {
    $this->fileFormat = $fileFormat;
  }
  /**
   * @return string
   */
  public function getFileFormat()
  {
    return $this->fileFormat;
  }
  /**
   * @param string
   */
  public function setFileFormatClass($fileFormatClass)
  {
    $this->fileFormatClass = $fileFormatClass;
  }
  /**
   * @return string
   */
  public function getFileFormatClass()
  {
    return $this->fileFormatClass;
  }
  /**
   * @param ResearchScienceSearchDataSize
   */
  public function setParsedContentSize(ResearchScienceSearchDataSize $parsedContentSize)
  {
    $this->parsedContentSize = $parsedContentSize;
  }
  /**
   * @return ResearchScienceSearchDataSize
   */
  public function getParsedContentSize()
  {
    return $this->parsedContentSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScienceSearchDataDownload::class, 'Google_Service_Contentwarehouse_ResearchScienceSearchDataDownload');
