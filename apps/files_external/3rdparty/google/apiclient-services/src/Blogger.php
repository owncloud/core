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

namespace Google\Service;

use Google\Client;

/**
 * Service definition for Blogger (v3).
 *
 * <p>
 * The Blogger API provides access to posts, comments and pages of a Blogger
 * blog.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/blogger/docs/3.0/getting_started" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Blogger extends \Google\Service
{
  /** Manage your Blogger account. */
  const BLOGGER =
      "https://www.googleapis.com/auth/blogger";
  /** View your Blogger account. */
  const BLOGGER_READONLY =
      "https://www.googleapis.com/auth/blogger.readonly";

  public $blogUserInfos;
  public $blogs;
  public $comments;
  public $pageViews;
  public $pages;
  public $postUserInfos;
  public $posts;
  public $users;

  /**
   * Constructs the internal representation of the Blogger service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://blogger.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v3';
    $this->serviceName = 'blogger';

    $this->blogUserInfos = new Blogger\Resource\BlogUserInfos(
        $this,
        $this->serviceName,
        'blogUserInfos',
        [
          'methods' => [
            'get' => [
              'path' => 'v3/users/{userId}/blogs/{blogId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxPosts' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->blogs = new Blogger\Resource\Blogs(
        $this,
        $this->serviceName,
        'blogs',
        [
          'methods' => [
            'get' => [
              'path' => 'v3/blogs/{blogId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxPosts' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getByUrl' => [
              'path' => 'v3/blogs/byurl',
              'httpMethod' => 'GET',
              'parameters' => [
                'url' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'listByUser' => [
              'path' => 'v3/users/{userId}/blogs',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fetchUserInfo' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'role' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'status' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->comments = new Blogger\Resource\Comments(
        $this,
        $this->serviceName,
        'comments',
        [
          'methods' => [
            'approve' => [
              'path' => 'v3/blogs/{blogId}/posts/{postId}/comments/{commentId}/approve',
              'httpMethod' => 'POST',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'postId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'commentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v3/blogs/{blogId}/posts/{postId}/comments/{commentId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'postId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'commentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v3/blogs/{blogId}/posts/{postId}/comments/{commentId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'postId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'commentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v3/blogs/{blogId}/posts/{postId}/comments',
              'httpMethod' => 'GET',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'postId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'endDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'fetchBodies' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'status' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'listByBlog' => [
              'path' => 'v3/blogs/{blogId}/comments',
              'httpMethod' => 'GET',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'endDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'fetchBodies' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'status' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'markAsSpam' => [
              'path' => 'v3/blogs/{blogId}/posts/{postId}/comments/{commentId}/spam',
              'httpMethod' => 'POST',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'postId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'commentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'removeContent' => [
              'path' => 'v3/blogs/{blogId}/posts/{postId}/comments/{commentId}/removecontent',
              'httpMethod' => 'POST',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'postId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'commentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->pageViews = new Blogger\Resource\PageViews(
        $this,
        $this->serviceName,
        'pageViews',
        [
          'methods' => [
            'get' => [
              'path' => 'v3/blogs/{blogId}/pageviews',
              'httpMethod' => 'GET',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'range' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->pages = new Blogger\Resource\Pages(
        $this,
        $this->serviceName,
        'pages',
        [
          'methods' => [
            'delete' => [
              'path' => 'v3/blogs/{blogId}/pages/{pageId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v3/blogs/{blogId}/pages/{pageId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'insert' => [
              'path' => 'v3/blogs/{blogId}/pages',
              'httpMethod' => 'POST',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'isDraft' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'v3/blogs/{blogId}/pages',
              'httpMethod' => 'GET',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fetchBodies' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'status' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v3/blogs/{blogId}/pages/{pageId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'publish' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'revert' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'publish' => [
              'path' => 'v3/blogs/{blogId}/pages/{pageId}/publish',
              'httpMethod' => 'POST',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'revert' => [
              'path' => 'v3/blogs/{blogId}/pages/{pageId}/revert',
              'httpMethod' => 'POST',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v3/blogs/{blogId}/pages/{pageId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'publish' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'revert' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->postUserInfos = new Blogger\Resource\PostUserInfos(
        $this,
        $this->serviceName,
        'postUserInfos',
        [
          'methods' => [
            'get' => [
              'path' => 'v3/users/{userId}/blogs/{blogId}/posts/{postId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'postId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxComments' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'list' => [
              'path' => 'v3/users/{userId}/blogs/{blogId}/posts',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'endDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'fetchBodies' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'labels' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'status' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->posts = new Blogger\Resource\Posts(
        $this,
        $this->serviceName,
        'posts',
        [
          'methods' => [
            'delete' => [
              'path' => 'v3/blogs/{blogId}/posts/{postId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'postId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v3/blogs/{blogId}/posts/{postId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'postId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fetchBody' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'fetchImages' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxComments' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getByPath' => [
              'path' => 'v3/blogs/{blogId}/posts/bypath',
              'httpMethod' => 'GET',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'path' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxComments' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'insert' => [
              'path' => 'v3/blogs/{blogId}/posts',
              'httpMethod' => 'POST',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fetchBody' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'fetchImages' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'isDraft' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'v3/blogs/{blogId}/posts',
              'httpMethod' => 'GET',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'endDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'fetchBodies' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'fetchImages' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'labels' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'status' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v3/blogs/{blogId}/posts/{postId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'postId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fetchBody' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'fetchImages' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxComments' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'publish' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'revert' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'publish' => [
              'path' => 'v3/blogs/{blogId}/posts/{postId}/publish',
              'httpMethod' => 'POST',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'postId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'publishDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'revert' => [
              'path' => 'v3/blogs/{blogId}/posts/{postId}/revert',
              'httpMethod' => 'POST',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'postId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'search' => [
              'path' => 'v3/blogs/{blogId}/posts/search',
              'httpMethod' => 'GET',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'q' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'fetchBodies' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'v3/blogs/{blogId}/posts/{postId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'blogId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'postId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fetchBody' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'fetchImages' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxComments' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'publish' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'revert' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->users = new Blogger\Resource\Users(
        $this,
        $this->serviceName,
        'users',
        [
          'methods' => [
            'get' => [
              'path' => 'v3/users/{userId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Blogger::class, 'Google_Service_Blogger');
