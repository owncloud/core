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

namespace Google\Service\YouTube\Resource;

use Google\Service\YouTube\Cuepoint;

/**
 * The "cuepoint" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google\Service\YouTube(...);
 *   $cuepoint = $youtubeService->cuepoint;
 *  </code>
 */
class YoutubeV3LiveBroadcastsCuepoint extends \Google\Service\Resource
{
  /**
   * Insert cuepoints in a broadcast (cuepoint.create)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string id Broadcast to insert ads to, or equivalently
   * `external_video_id` for internal use.
   * @opt_param string onBehalfOfContentOwner *Note:* This parameter is intended
   * exclusively for YouTube content partners. The *onBehalfOfContentOwner*
   * parameter indicates that the request's authorization credentials identify a
   * YouTube CMS user who is acting on behalf of the content owner specified in
   * the parameter value. This parameter is intended for YouTube content partners
   * that own and manage many different YouTube channels. It allows content owners
   * to authenticate once and get access to all their video and channel data,
   * without having to provide authentication credentials for each individual
   * channel. The CMS account that the user authenticates with must be linked to
   * the specified YouTube content owner.
   * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
   * used in a properly authorized request. *Note:* This parameter is intended
   * exclusively for YouTube content partners. The *onBehalfOfContentOwnerChannel*
   * parameter specifies the YouTube channel ID of the channel to which a video is
   * being added. This parameter is required when a request specifies a value for
   * the onBehalfOfContentOwner parameter, and it can only be used in conjunction
   * with that parameter. In addition, the request must be authorized using a CMS
   * account that is linked to the content owner that the onBehalfOfContentOwner
   * parameter specifies. Finally, the channel that the
   * onBehalfOfContentOwnerChannel parameter value specifies must be linked to the
   * content owner that the onBehalfOfContentOwner parameter specifies. This
   * parameter is intended for YouTube content partners that own and manage many
   * different YouTube channels. It allows content owners to authenticate once and
   * perform actions on behalf of the channel specified in the parameter value,
   * without having to provide authentication credentials for each separate
   * channel.
   * @opt_param string part The *part* parameter specifies a comma-separated list
   * of one or more liveBroadcast resource properties that the API response will
   * include. The part names that you can include in the parameter value are id,
   * snippet, contentDetails, and status.
   * @opt_param string resource.cueType
   * @opt_param string resource.durationSecs The duration of this cuepoint.
   * @opt_param string resource.id The identifier for cuepoint resource.
   * @opt_param string resource.insertionOffsetTimeMs The time when the cuepoint
   * should be inserted by offset to the broadcast actual start time.
   * @opt_param string resource.walltimeMs The wall clock time at which the
   * cuepoint should be inserted. Only one of insertion_offset_time_ms and
   * walltime_ms may be set at a time.
   * @return Cuepoint
   */
  public function create($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Cuepoint::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(YoutubeV3LiveBroadcastsCuepoint::class, 'Google_Service_YouTube_Resource_YoutubeV3LiveBroadcastsCuepoint');
