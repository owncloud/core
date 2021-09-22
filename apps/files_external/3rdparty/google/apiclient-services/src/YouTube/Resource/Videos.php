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

use Google\Service\YouTube\Video;
use Google\Service\YouTube\VideoAbuseReport;
use Google\Service\YouTube\VideoGetRatingResponse;
use Google\Service\YouTube\VideoListResponse;

/**
 * The "videos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google\Service\YouTube(...);
 *   $videos = $youtubeService->videos;
 *  </code>
 */
class Videos extends \Google\Service\Resource
{
  /**
   * Deletes a resource. (videos.delete)
   *
   * @param string $id
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner *Note:* This parameter is intended
   * exclusively for YouTube content partners. The *onBehalfOfContentOwner*
   * parameter indicates that the request's authorization credentials identify a
   * YouTube CMS user who is acting on behalf of the content owner specified in
   * the parameter value. This parameter is intended for YouTube content partners
   * that own and manage many different YouTube channels. It allows content owners
   * to authenticate once and get access to all their video and channel data,
   * without having to provide authentication credentials for each individual
   * channel. The actual CMS account that the user authenticates with must be
   * linked to the specified YouTube content owner.
   */
  public function delete($id, $optParams = [])
  {
    $params = ['id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves the ratings that the authorized user gave to a list of specified
   * videos. (videos.getRating)
   *
   * @param string|array $id
   * @param array $optParams Optional parameters.
   *
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
   * @return VideoGetRatingResponse
   */
  public function getRating($id, $optParams = [])
  {
    $params = ['id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('getRating', [$params], VideoGetRatingResponse::class);
  }
  /**
   * Inserts a new resource into this collection. (videos.insert)
   *
   * @param string|array $part The *part* parameter serves two purposes in this
   * operation. It identifies the properties that the write operation will set as
   * well as the properties that the API response will include. Note that not all
   * parts contain properties that can be set when inserting or updating a video.
   * For example, the statistics object encapsulates statistics that YouTube
   * calculates for a video and does not contain values that you can set or
   * modify. If the parameter value specifies a part that does not contain mutable
   * values, that part will still be included in the API response.
   * @param Video $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool autoLevels Should auto-levels be applied to the upload.
   * @opt_param bool notifySubscribers Notify the channel subscribers about the
   * new video. As default, the notification is enabled.
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
   * @opt_param bool stabilize Should stabilize be applied to the upload.
   * @return Video
   */
  public function insert($part, Video $postBody, $optParams = [])
  {
    $params = ['part' => $part, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Video::class);
  }
  /**
   * Retrieves a list of resources, possibly filtered. (videos.listVideos)
   *
   * @param string|array $part The *part* parameter specifies a comma-separated
   * list of one or more video resource properties that the API response will
   * include. If the parameter identifies a property that contains child
   * properties, the child properties will be included in the response. For
   * example, in a video resource, the snippet property contains the channelId,
   * title, description, tags, and categoryId properties. As such, if you set
   * *part=snippet*, the API response will contain all of those properties.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string chart Return the videos that are in the specified chart.
   * @opt_param string hl Stands for "host language". Specifies the localization
   * language of the metadata to be filled into snippet.localized. The field is
   * filled with the default metadata if there is no localization in the specified
   * language. The parameter value must be a language code included in the list
   * returned by the i18nLanguages.list method (e.g. en_US, es_MX).
   * @opt_param string id Return videos with the given ids.
   * @opt_param string locale
   * @opt_param int maxHeight
   * @opt_param string maxResults The *maxResults* parameter specifies the maximum
   * number of items that should be returned in the result set. *Note:* This
   * parameter is supported for use in conjunction with the myRating and chart
   * parameters, but it is not supported for use in conjunction with the id
   * parameter.
   * @opt_param int maxWidth Return the player with maximum height specified in
   * @opt_param string myRating Return videos liked/disliked by the authenticated
   * user. Does not support RateType.RATED_TYPE_NONE.
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
   * @opt_param string pageToken The *pageToken* parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken and prevPageToken properties identify other pages that could be
   * retrieved. *Note:* This parameter is supported for use in conjunction with
   * the myRating and chart parameters, but it is not supported for use in
   * conjunction with the id parameter.
   * @opt_param string regionCode Use a chart that is specific to the specified
   * region
   * @opt_param string videoCategoryId Use chart that is specific to the specified
   * video category
   * @return VideoListResponse
   */
  public function listVideos($part, $optParams = [])
  {
    $params = ['part' => $part];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], VideoListResponse::class);
  }
  /**
   * Adds a like or dislike rating to a video or removes a rating from a video.
   * (videos.rate)
   *
   * @param string $id
   * @param string $rating
   * @param array $optParams Optional parameters.
   */
  public function rate($id, $rating, $optParams = [])
  {
    $params = ['id' => $id, 'rating' => $rating];
    $params = array_merge($params, $optParams);
    return $this->call('rate', [$params]);
  }
  /**
   * Report abuse for a video. (videos.reportAbuse)
   *
   * @param VideoAbuseReport $postBody
   * @param array $optParams Optional parameters.
   *
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
   */
  public function reportAbuse(VideoAbuseReport $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reportAbuse', [$params]);
  }
  /**
   * Updates an existing resource. (videos.update)
   *
   * @param string|array $part The *part* parameter serves two purposes in this
   * operation. It identifies the properties that the write operation will set as
   * well as the properties that the API response will include. Note that this
   * method will override the existing values for all of the mutable properties
   * that are contained in any parts that the parameter value specifies. For
   * example, a video's privacy setting is contained in the status part. As such,
   * if your request is updating a private video, and the request's part parameter
   * value includes the status part, the video's privacy setting will be updated
   * to whatever value the request body specifies. If the request body does not
   * specify a value, the existing privacy setting will be removed and the video
   * will revert to the default privacy setting. In addition, not all parts
   * contain properties that can be set when inserting or updating a video. For
   * example, the statistics object encapsulates statistics that YouTube
   * calculates for a video and does not contain values that you can set or
   * modify. If the parameter value specifies a part that does not contain mutable
   * values, that part will still be included in the API response.
   * @param Video $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner *Note:* This parameter is intended
   * exclusively for YouTube content partners. The *onBehalfOfContentOwner*
   * parameter indicates that the request's authorization credentials identify a
   * YouTube CMS user who is acting on behalf of the content owner specified in
   * the parameter value. This parameter is intended for YouTube content partners
   * that own and manage many different YouTube channels. It allows content owners
   * to authenticate once and get access to all their video and channel data,
   * without having to provide authentication credentials for each individual
   * channel. The actual CMS account that the user authenticates with must be
   * linked to the specified YouTube content owner.
   * @return Video
   */
  public function update($part, Video $postBody, $optParams = [])
  {
    $params = ['part' => $part, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Video::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Videos::class, 'Google_Service_YouTube_Resource_Videos');
