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

class AudioAtom extends \Google\Collection
{
  protected $collection_key = 'channels';
  protected $channelsType = AudioChannel::class;
  protected $channelsDataType = 'array';
  public $key;

  /**
   * @param AudioChannel[]
   */
  public function setChannels($channels)
  {
    $this->channels = $channels;
  }
  /**
   * @return AudioChannel[]
   */
  public function getChannels()
  {
    return $this->channels;
  }
  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AudioAtom::class, 'Google_Service_Transcoder_AudioAtom');
