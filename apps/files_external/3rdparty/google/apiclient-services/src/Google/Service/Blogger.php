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

/**
 * Service definition for Blogger (v3).
 *
 * <p>
 * The Blogger API provides access to posts, comments and pages of a     Blogger
 * blog.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/blogger/docs/3.0/getting_started" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Blogger extends Google_Service
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
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://blogger.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v3';
    $this->serviceName = 'blogger';

    $this->blogUserInfos = new Google_Service_Blogger_Resource_BlogUserInfos(
        $this,
        $this->serviceName,
        'blogUserInfos',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v3/users/{userId}/blogs/{blogId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxPosts' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->blogs = new Google_Service_Blogger_Resource_Blogs(
        $this,
        $this->serviceName,
        'blogs',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v3/blogs/{blogId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxPosts' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'getByUrl' => array(
              'path' => 'v3/blogs/byurl',
              'httpMethod' => 'GET',
              'parameters' => array(
                'url' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'listByUser' => array(
              'path' => 'v3/users/{userId}/blogs',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fetchUserInfo' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'role' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'status' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->comments = new Google_Service_Blogger_Resource_Comments(
        $this,
        $this->serviceName,
        'comments',
        array(
          'methods' => array(
            'approve' => array(
              'path' => 'v3/blogs/{blogId}/posts/{postId}/comments/{commentId}/approve',
              'httpMethod' => 'POST',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'postId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'commentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v3/blogs/{blogId}/posts/{postId}/comments/{commentId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'postId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'commentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v3/blogs/{blogId}/posts/{postId}/comments/{commentId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'postId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'commentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v3/blogs/{blogId}/posts/{postId}/comments',
              'httpMethod' => 'GET',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'postId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'fetchBodies' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'status' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'listByBlog' => array(
              'path' => 'v3/blogs/{blogId}/comments',
              'httpMethod' => 'GET',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'status' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'endDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fetchBodies' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'startDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'markAsSpam' => array(
              'path' => 'v3/blogs/{blogId}/posts/{postId}/comments/{commentId}/spam',
              'httpMethod' => 'POST',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'postId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'commentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'removeContent' => array(
              'path' => 'v3/blogs/{blogId}/posts/{postId}/comments/{commentId}/removecontent',
              'httpMethod' => 'POST',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'postId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'commentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->pageViews = new Google_Service_Blogger_Resource_PageViews(
        $this,
        $this->serviceName,
        'pageViews',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v3/blogs/{blogId}/pageviews',
              'httpMethod' => 'GET',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'range' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->pages = new Google_Service_Blogger_Resource_Pages(
        $this,
        $this->serviceName,
        'pages',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'v3/blogs/{blogId}/pages/{pageId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v3/blogs/{blogId}/pages/{pageId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'v3/blogs/{blogId}/pages',
              'httpMethod' => 'POST',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'isDraft' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'v3/blogs/{blogId}/pages',
              'httpMethod' => 'GET',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'status' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fetchBodies' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'v3/blogs/{blogId}/pages/{pageId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'revert' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'publish' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'publish' => array(
              'path' => 'v3/blogs/{blogId}/pages/{pageId}/publish',
              'httpMethod' => 'POST',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'revert' => array(
              'path' => 'v3/blogs/{blogId}/pages/{pageId}/revert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'v3/blogs/{blogId}/pages/{pageId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'revert' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'publish' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->postUserInfos = new Google_Service_Blogger_Resource_PostUserInfos(
        $this,
        $this->serviceName,
        'postUserInfos',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v3/users/{userId}/blogs/{blogId}/posts/{postId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'postId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxComments' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'list' => array(
              'path' => 'v3/users/{userId}/blogs/{blogId}/posts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'endDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'labels' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'status' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'fetchBodies' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'startDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->posts = new Google_Service_Blogger_Resource_Posts(
        $this,
        $this->serviceName,
        'posts',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'v3/blogs/{blogId}/posts/{postId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'postId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v3/blogs/{blogId}/posts/{postId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'postId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxComments' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fetchBody' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'fetchImages' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'getByPath' => array(
              'path' => 'v3/blogs/{blogId}/posts/bypath',
              'httpMethod' => 'GET',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'path' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxComments' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'insert' => array(
              'path' => 'v3/blogs/{blogId}/posts',
              'httpMethod' => 'POST',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fetchBody' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'isDraft' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'fetchImages' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'v3/blogs/{blogId}/posts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'labels' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fetchImages' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'status' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'endDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'fetchBodies' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'v3/blogs/{blogId}/posts/{postId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'postId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fetchBody' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'publish' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'fetchImages' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxComments' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'revert' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'publish' => array(
              'path' => 'v3/blogs/{blogId}/posts/{postId}/publish',
              'httpMethod' => 'POST',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'postId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'publishDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'revert' => array(
              'path' => 'v3/blogs/{blogId}/posts/{postId}/revert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'postId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'search' => array(
              'path' => 'v3/blogs/{blogId}/posts/search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'q' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'fetchBodies' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'v3/blogs/{blogId}/posts/{postId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'blogId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'postId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'revert' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxComments' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'publish' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'fetchImages' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'fetchBody' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->users = new Google_Service_Blogger_Resource_Users(
        $this,
        $this->serviceName,
        'users',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v3/users/{userId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
