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

namespace Google\Service\YouTube;

class ChannelBrandingSettings extends \Google\Collection
{
  protected $collection_key = 'hints';
  protected $channelType = ChannelSettings::class;
  protected $channelDataType = '';
  protected $hintsType = PropertyValue::class;
  protected $hintsDataType = 'array';
  protected $imageType = ImageSettings::class;
  protected $imageDataType = '';
  protected $watchType = WatchSettings::class;
  protected $watchDataType = '';

  /**
   * @param ChannelSettings
   */
  public function setChannel(ChannelSettings $channel)
  {
    $this->channel = $channel;
  }
  /**
   * @return ChannelSettings
   */
  public function getChannel()
  {
    return $this->channel;
  }
  /**
   * @param PropertyValue[]
   */
  public function setHints($hints)
  {
    $this->hints = $hints;
  }
  /**
   * @return PropertyValue[]
   */
  public function getHints()
  {
    return $this->hints;
  }
  /**
   * @param ImageSettings
   */
  public function setImage(ImageSettings $image)
  {
    $this->image = $image;
  }
  /**
   * @return ImageSettings
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param WatchSettings
   */
  public function setWatch(WatchSettings $watch)
  {
    $this->watch = $watch;
  }
  /**
   * @return WatchSettings
   */
  public function getWatch()
  {
    return $this->watch;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChannelBrandingSettings::class, 'Google_Service_YouTube_ChannelBrandingSettings');
