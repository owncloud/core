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
use Google\Service\Classroom\ListTeachersResponse;
use Google\Service\Classroom\Teacher;

/**
 * The "teachers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google\Service\Classroom(...);
 *   $teachers = $classroomService->teachers;
 *  </code>
 */
class CoursesTeachers extends \Google\Service\Resource
{
  /**
   * Creates a teacher of a course. Domain administrators are permitted to
   * [directly add](https://developers.google.com/classroom/guides/manage-users)
   * users within their domain as teachers to courses within their domain. Non-
   * admin users should send an Invitation instead. This method returns the
   * following error codes: * `PERMISSION_DENIED` if the requesting user is not
   * permitted to create teachers in this course or for access errors. *
   * `NOT_FOUND` if the requested course ID does not exist. *
   * `FAILED_PRECONDITION` if the requested user's account is disabled, for the
   * following request errors: * CourseMemberLimitReached * CourseNotModifiable *
   * CourseTeacherLimitReached * UserGroupsMembershipLimitReached *
   * InactiveCourseOwner * `ALREADY_EXISTS` if the user is already a teacher or
   * student in the course. (teachers.create)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param Teacher $postBody
   * @param array $optParams Optional parameters.
   * @return Teacher
   */
  public function create($courseId, Teacher $postBody, $optParams = [])
  {
    $params = ['courseId' => $courseId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Teacher::class);
  }
  /**
   * Removes the specified teacher from the specified course. This method returns
   * the following error codes: * `PERMISSION_DENIED` if the requesting user is
   * not permitted to delete teachers of this course or for access errors. *
   * `NOT_FOUND` if no teacher of this course has the requested ID or if the
   * course does not exist. * `FAILED_PRECONDITION` if the requested ID belongs to
   * the primary teacher of this course. * `FAILED_PRECONDITION` if the requested
   * ID belongs to the owner of the course Drive folder. * `FAILED_PRECONDITION`
   * if the course no longer has an active owner. (teachers.delete)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $userId Identifier of the teacher to delete. The identifier can
   * be one of the following: * the numeric identifier for the user * the email
   * address of the user * the string literal `"me"`, indicating the requesting
   * user
   * @param array $optParams Optional parameters.
   * @return ClassroomEmpty
   */
  public function delete($courseId, $userId, $optParams = [])
  {
    $params = ['courseId' => $courseId, 'userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], ClassroomEmpty::class);
  }
  /**
   * Returns a teacher of a course. This method returns the following error codes:
   * * `PERMISSION_DENIED` if the requesting user is not permitted to view
   * teachers of this course or for access errors. * `NOT_FOUND` if no teacher of
   * this course has the requested ID or if the course does not exist.
   * (teachers.get)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $userId Identifier of the teacher to return. The identifier can
   * be one of the following: * the numeric identifier for the user * the email
   * address of the user * the string literal `"me"`, indicating the requesting
   * user
   * @param array $optParams Optional parameters.
   * @return Teacher
   */
  public function get($courseId, $userId, $optParams = [])
  {
    $params = ['courseId' => $courseId, 'userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Teacher::class);
  }
  /**
   * Returns a list of teachers of this course that the requester is permitted to
   * view. This method returns the following error codes: * `NOT_FOUND` if the
   * course does not exist. * `PERMISSION_DENIED` for access errors.
   * (teachers.listCoursesTeachers)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of items to return. The default is 30
   * if unspecified or `0`. The server may return fewer than the specified number
   * of results.
   * @opt_param string pageToken nextPageToken value returned from a previous list
   * call, indicating that the subsequent page of results should be returned. The
   * list request must be otherwise identical to the one that resulted in this
   * token.
   * @return ListTeachersResponse
   */
  public function listCoursesTeachers($courseId, $optParams = [])
  {
    $params = ['courseId' => $courseId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTeachersResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CoursesTeachers::class, 'Google_Service_Classroom_Resource_CoursesTeachers');
