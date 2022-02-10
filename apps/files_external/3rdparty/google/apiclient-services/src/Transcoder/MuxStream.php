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

namespace Google\Service\Transcoder;

class MuxStream extends \Google\Collection
{
  protected $collection_key = 'elementaryStreams';
  /**
   * @var string
   */
  public $container;
  /**
   * @var string[]
   */
  public $elementaryStreams;
  /**
   * @var string
   */
  public $fileName;
  /**
   * @var string
   */
  public $key;
  protected $segmentSettingsType = SegmentSettings::class;
  protected $segmentSettingsDataType = '';

  /**
   * @param string
   */
  public function setContainer($container)
  {
    $this->container = $container;
  }
  /**
   * @return string
   */
  public function getContainer()
  {
    return $this->container;
  }
  /**
   * @param string[]
   */
  public function setElementaryStreams($elementaryStreams)
  {
    $this->elementaryStreams = $elementaryStreams;
  }
  /**
   * @return string[]
   */
  public function getElementaryStreams()
  {
    return $this->elementaryStreams;
  }
  /**
   * @param string
   */
  public function setFileName($fileName)
  {
    $this->fileName = $fileName;
  }
  /**
   * @return string
   */
  public function getFileName()
  {
    return $this->fileName;
  }
  /**
   * @param string
   */
  public function setKey($key)
  {
    $this->key = $key;
  }
  /**
   * @return string
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param SegmentSettings
   */
  public function setSegmentSettings(SegmentSettings $segmentSettings)
  {
    $this->segmentSettings = $segmentSettings;
  }
  /**
   * @return SegmentSettings
   */
  public function getSegmentSettings()
  {
    return $this->segmentSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MuxStream::class, 'Google_Service_Transcoder_MuxStream');
