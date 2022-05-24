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

namespace Google\Service\Classroom\Resource;

use Google\Service\Classroom\ClassroomEmpty;
use Google\Service\Classroom\ListTopicResponse;
use Google\Service\Classroom\Topic;

/**
 * The "topics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google\Service\Classroom(...);
 *   $topics = $classroomService->topics;
 *  </code>
 */
class CoursesTopics extends \Google\Service\Resource
{
  /**
   * Creates a topic. This method returns the following error codes: *
   * `PERMISSION_DENIED` if the requesting user is not permitted to access the
   * requested course, create a topic in the requested course, or for access
   * errors. * `INVALID_ARGUMENT` if the request is malformed. * `NOT_FOUND` if
   * the requested course does not exist. (topics.create)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param Topic $postBody
   * @param array $optParams Optional parameters.
   * @return Topic
   */
  public function create($courseId, Topic $postBody, $optParams = [])
  {
    $params = ['courseId' => $courseId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Topic::class);
  }
  /**
   * Deletes a topic. This method returns the following error codes: *
   * `PERMISSION_DENIED` if the requesting user is not allowed to delete the
   * requested topic or for access errors. * `FAILED_PRECONDITION` if the
   * requested topic has already been deleted. * `NOT_FOUND` if no course or topic
   * exists with the requested ID. (topics.delete)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $id Identifier of the topic to delete.
   * @param array $optParams Optional parameters.
   * @return ClassroomEmpty
   */
  public function delete($courseId, $id, $optParams = [])
  {
    $params = ['courseId' => $courseId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], ClassroomEmpty::class);
  }
  /**
   * Returns a topic. This method returns the following error codes: *
   * `PERMISSION_DENIED` if the requesting user is not permitted to access the
   * requested course or topic, or for access errors. * `INVALID_ARGUMENT` if the
   * request is malformed. * `NOT_FOUND` if the requested course or topic does not
   * exist. (topics.get)
   *
   * @param string $courseId Identifier of the course.
   * @param string $id Identifier of the topic.
   * @param array $optParams Optional parameters.
   * @return Topic
   */
  public function get($courseId, $id, $optParams = [])
  {
    $params = ['courseId' => $courseId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Topic::class);
  }
  /**
   * Returns the list of topics that the requester is permitted to view. This
   * method returns the following error codes: * `PERMISSION_DENIED` if the
   * requesting user is not permitted to access the requested course or for access
   * errors. * `INVALID_ARGUMENT` if the request is malformed. * `NOT_FOUND` if
   * the requested course does not exist. (topics.listCoursesTopics)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of items to return. Zero or
   * unspecified indicates that the server may assign a maximum. The server may
   * return fewer than the specified number of results.
   * @opt_param string pageToken nextPageToken value returned from a previous list
   * call, indicating that the subsequent page of results should be returned. The
   * list request must be otherwise identical to the one that resulted in this
   * token.
   * @return ListTopicResponse
   */
  public function listCoursesTopics($courseId, $optParams = [])
  {
    $params = ['courseId' => $courseId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTopicResponse::class);
  }
  /**
   * Updates one or more fields of a topic. This method returns the following
   * error codes: * `PERMISSION_DENIED` if the requesting developer project did
   * not create the corresponding topic or for access errors. * `INVALID_ARGUMENT`
   * if the request is malformed. * `NOT_FOUND` if the requested course or topic
   * does not exist (topics.patch)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $id Identifier of the topic.
   * @param Topic $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Mask that identifies which fields on the topic
   * to update. This field is required to do an update. The update fails if
   * invalid fields are specified. If a field supports empty values, it can be
   * cleared by specifying it in the update mask and not in the Topic object. If a
   * field that does not support empty values is included in the update mask and
   * not set in the Topic object, an `INVALID_ARGUMENT` error is returned. The
   * following fields may be specified: * `name`
   * @return Topic
   */
  public function patch($courseId, $id, Topic $postBody, $optParams = [])
  {
    $params = ['courseId' => $courseId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Topic::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CoursesTopics::class, 'Google_Service_Classroom_Resource_CoursesTopics');
